<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where("id", $id)->get();

        $isCompanyClient = false;

        foreach ($user as $key => $value) {
            // if($value->rif != "" || $value->razonSocial != "" || $value->companyAddress != "" || $value->companyPhone != "" || $value->companyLogo != ""){
            //     $isCompanyClient = true;
            // }
            $isCompanyClient = ($user[0]->is_client == 1);

            if($value->avatar == ""){
                $value->avatar = "no_image.png";
            }

            if($value->companyLogo == ""){
                $value->companyLogo = "no_image.png";
            }
        }
        $user = $user[0];
        return view("user.edit", compact("user", "isCompanyClient"));
        
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
            
            $isClient = request()->chkClient;

            $isCompanyClient = $isClient;
            
            $avatar = request()->file('avatar');
            $companyLogo = request()->file('companyLogo');
            
            $user = User::where("id", $id)->first();
            
            if($isClient == "on"){
                
                $this->validator_full(request()->all())->validate();
    
                $user->name = $request->input('name');
                $user->lastName = $request->input('lastName');
                $user->phone = $request->input('clientPhone');
                $user->address = $request->input('clientAddress');;
                $user->rif = $request->input('rif');
                $user->razonSocial = $request->input('rsocial');
                $user->companyAddress = $request->input('companyAddress');
                $user->companyPhone = $request->input('companyPhone');
                $user->is_client = true;
            }else{
                $this->validator_basic(request()->all())->validate();
    
                $user->name = $request->input('name');
                $user->lastName = $request->input('lastName');
                $user->phone = $request->input('clientPhone');
                $user->address = $request->input('clientAddress');
                $user->rif = "";
                $user->razonSocial = "";
                $user->companyAddress = "";
                $user->companyPhone = "";
                $user->is_client = false;
            }

            // Seccion de las imagenes
            if($isClient == "on"){

                if($avatar != null){
                    $userAvatar = $user->avatar;
                    if($userAvatar != ""){
                        $crrImg = "avatars/" . $userAvatar;
                        Storage::disk('customerLogo')->delete($crrImg);
                    }
        
                    $fileName = $user->id."_". $avatar->getClientOriginalName();
                    $avatar->storeAs('avatars', $fileName, 'customerLogo');
                    
                    $user->avatar = $fileName;
                }
                
                if($companyLogo != null){
                    $userCompanyLogo = $user->companyLogo;
                    if($userCompanyLogo != ""){
                        $crrImg = "companyLogo/" . $userCompanyLogo;
                        Storage::disk('customerLogo')->delete($crrImg);
                    }
        
                    $fileName = $user->id."_". $companyLogo->getClientOriginalName();
                    $companyLogo->storeAs('companyLogo', $fileName, 'customerLogo');
                    
                    $user->companyLogo = $fileName;
                }

            }else{
                if($avatar != null){
                    $fileName = $user->id."_". $avatar->getClientOriginalName();
                    $userAvatar = $user->avatar;
                    if($userAvatar != ""){
                        $crrImg = "avatars/" . $userAvatar;
                        Storage::disk('customerLogo')->delete($crrImg);
                    }
                    $avatar->storeAs('avatars', $fileName, 'customerLogo');
                    $user->avatar = $fileName;
                }
                
                $userCompanyLogo = $user->companyLogo;
                if($userCompanyLogo != ""){
                    $crrImg = "companyLogo/" . $userCompanyLogo;
                    Storage::disk('customerLogo')->delete($crrImg);
                    $user->companyLogo = "";
                }
            }
    
            $user->save();

            $msg = "La actualización de los datos se llevaron a cabo satisfactoriamente";
            return view("user.edit", compact("user", "isCompanyClient", "msg"));

        } catch (\Throwable $th) {
            $msg = "La actualización de los datos no se pudo realizar.";
            return view("user.edit", compact("user", "isCompanyClient", "msg"));
        }
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

    protected function validator_basic(array $data)
    {
        $messages = [
            'numeric' => 'El campo debe ser numerico.',
            'required' => 'El campo es requerido'
        ];

        return Validator::make($data, [
            'name' => 'required|string',
            'lastName' => 'required|string',
            
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
            'rif' => 'required|string',
            'rsocial' => 'required|string',
            'companyAddress' => 'required|string'
            
        ], $messages);
    }
}
