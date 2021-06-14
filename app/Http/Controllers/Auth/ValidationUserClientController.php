<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use App\User;
use Utils;
use DB;
use Mail;

class ValidationUserClientController extends Controller
{
    public function __construct(){
        // $this->middleware(['auth', 'admin']);
        $this->middleware('auth');
        $this->middleware('administrative');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // roll_id = 2 (Guest)
        $usersToValidate = Utils::getUsersToValidate();
        return view("auth.validationByAdmin", compact('usersToValidate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table("roles")->get();

        $company_types = DB::table("company_types")->get();

        return view("auth.create", compact("roles", "company_types"));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $isClient = request()->chkClient;
        $password = Str::random(15);

        if($isClient == "on"){
            $this->validator_full(request()->all())->validate();

            $user_created = User::create([
                'name' => request()->name,
                'lastName' => request()->lastName,
                'email' => request()->email,
                'password' => bcrypt($password),
                'phone' => request()->clientPhone,
                'roll_id' => request()->rolId,
                'address' => request()->clientAddress,
                'rif' => request()->rif,
                'razonSocial' => request()->rsocial,
                'companyAddress' => request()->companyAddress,
                'companyPhone' => request()->companyPhone,
                'company_type_id' => request()->company_type,
                'confirmed' => true,
                'validationByAdmin' => true,
                'email_verified_at' => Carbon::now(),
                'is_client' => true
            ]);

        }else{
            $this->validator_basic(request()->all())->validate();

            $user_created = User::create([
                'name' => request()->name,
                'lastName' => request()->lastName,
                'email' => request()->email,
                'password' => bcrypt($password),
                'phone' => request()->clientPhone,
                'roll_id' => request()->rolId,
                'addres' => request()->clientAddress,
                'confirmed' => true,
                'validationByAdmin' => true,
                'email_verified_at' => Carbon::now(),
                'is_client' => false
            ]);
        }

        $req = array(
            "correo" => env('EMAIL_ADMIN')
        );
        
        $subject = "Bienvenido a Modular Top";

        
        $userInfo = array(
            'name' => $user_created->name,
            'lastName' => $user_created->lastName,
            'pass' => $password
        );

        Mail::send('emails.registerclientuser', $userInfo, function($message) use($req, $user_created, $subject){
            $message->from($req["correo"], 'Web Modular Top');
            $message->to($user_created->email)->subject($subject);
        });


        $user_created->save();

        $msg = "Usuario creado satisfactoriamente";

        $roles = DB::table("roles")->get();

        $company_types = DB::table("company_types")->get();

        return view("auth.create", compact("roles", "company_types", "msg"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
        $user = User::where("id", $id)->get();

        $isCompanyClient = false;

        foreach ($user as $key => $value) {
            if($value->rif != "" || $value->razonSocial != "" || $value->companyAddress != "" || $value->companyPhone != "" || $value->companyLogo != ""){
                $isCompanyClient = true;
            }

            if($value->avatar == ""){
                $value->avatar = "no_image.png";
            }

            if($value->companyLogo == ""){
                $value->companyLogo = "no_image.png";
            }
        }
        $user = $user[0];
        
        return view("auth.read", compact("user", "isCompanyClient"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $action = $request->input("hOption"); // 1=validado, 0=rechazado
    
            $user = User::where("id", $id)->first();
    
            switch ($action) {
                case 1:
                    $user->validationByAdmin = 1;
                    $user->roll_id = 4; // Rol_id = 4 es usuario tipo cliente
                    break;
                case 0:
                    $user->validationByAdmin = 0;
                    $user->is_client = 0;
                    break;
            }
    
            $msgPost = "El usario ". $user->name . " " . $user->lastName ." ha sido actualizado correctamente.";
        } catch (\Throwable $th) {
            $msgPost = "Hubo un problema en la actualización, por favor contacte al personal de sistemas.";
        }
        $user->save();

        $usersToValidate = Utils::getUsersToValidate();
        return view("auth.validationByAdmin", compact('usersToValidate', 'msgPost'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Consultar los usuarios registrados en el sistema
     */
    public function showUser(){
        $users_admin = DB::table("users")
            ->select(
                "users.id",
                "users.name",
                "users.lastName",
                "users.email",
                "users.is_deleted",
                "users.created_at",
                "roles.nombre as rolName"
            )
            ->join("roles", "users.roll_id", "=", "roles.id", "inner", false)
            ->where("roll_id", "1")
            ->where("confirmed", "1")
            ->orWhere("roll_id", "3")
            ->orWhere("roll_id", "5")
            ->get();

        $users = DB::table("users")
            ->select(
                "users.id",
                "users.name",
                "users.lastName",
                "users.email",
                "users.is_deleted",
                "users.created_at",
                "roles.nombre as rolName",
                "company_types.name as typeClientName"
            )
            ->join("roles", "users.roll_id", "=", "roles.id", "inner", false)
            ->join("company_types", "users.company_type_id", "=", "company_types.id", "left", false)
            ->where("roll_id", "2")
            ->where("confirmed", "1")
            ->orWhere("roll_id", "4")
            ->get();
        
        return view("auth.showuser", compact('users_admin', 'users'));
        
    }

    public function inactive_form($id){
        $user = User::find($id);

        return view("auth.inactiveForm", compact("user"));
    }

    public function inactive(){
        $this->validator_inactive(request()->all())->validate();
        
        $crrUser = auth()->user()->id;
        $idUser = request()->input('hIdUser');
        $cause = request()->input('cause');

        $user = User::where("id", $idUser)->first();
        
        $user->is_deleted = 1;
        $user->save();

        DB::table('user_inactive')->insert([
            "id_user" => $idUser,
            "cause" => $cause,
            "created_by" => $crrUser,
            "created_at" => Carbon::now()
        ]);

        $users = User::where("confirmed", "1")->get();
        
        return view("auth.showuser", compact('users'));

    }

    protected function validator_basic(array $data)
    {
        $messages = [
            'numeric' => 'El campo debe ser numerico.',
            'required' => 'El campo es requerido'
        ];

        return Validator::make($data, [
            'name' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|string|email|max:40|unique:users',
            'clientPhone' => 'required',
            'rolId' => 'required',
        ], $messages);
    }

    protected function validator_full(array $data)
    {
        $messages = [
            'numeric' => 'El campo debe ser numerico.',
            'required' => 'El campo es requerido'
        ];

        return Validator::make($data, [
            'name' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|string|email|max:40|unique:users',
            'clientPhone' => 'required',
            'rolId' => 'required',
            'rif' => 'required|string',
            'rsocial' => 'required|string',
            'companyAddress' => 'required|string',
            'companyPhone' => 'required',
            'company_type' => 'required'

        ], $messages);
    }

    protected function validatorUser(array $data)
    {
        $messages = [
            'required' => 'El campo es requerido',
            'unique' => 'El correo ya existe',
            'email' => 'Debe escribir un correo válido'
        ];

        return Validator::make($data, [
            'email' => 'required|email|max:40|unique:users',
            
        ], $messages);
    }

    protected function validator_inactive(array $data){
        $messages = [
            'required' => 'El campo es requerido'
        ];

        return Validator::make($data, [
            'cause' => 'required|string'
        ], $messages);
    }
}
