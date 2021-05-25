<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

use Mail;

class RegisterController extends Controller
{

    public $DIRECTORY_IMG = "customers_logo";

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:6', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
        // return view('auth.login');
    }
    
    protected function validator_basic(array $data)
    {
        $messages = [
            'numeric' => 'El campo debe ser numerico.',
            'required' => 'El campo es requerido',
            'captcha' => 'Debe realizar la selección del captcha'
        ];

        return Validator::make($data, [
            'g-recaptcha-response' => 'captcha',
            'name' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|string|email|max:40|unique:users',
            'password' => 'required|string|min:4|confirmed',
            
        ], $messages);
    }
    
    protected function validator_full(array $data)
    {
        $messages = [
            'numeric' => 'El campo debe ser numerico.',
            'required' => 'El campo es requerido',
            'captcha' => 'Debe realizar la selección del captcha'
        ];

        return Validator::make($data, [
            'g-recaptcha-response' => 'captcha',
            'name' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|string|email|max:40|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'rif' => 'required|string',
            'rsocial' => 'required|string',
            'companyAddress' => 'required|string',
            
        ], $messages);
    }

    public function register()
    {
        
        // return view('layouts.layoutMessage', $data);

        $isClient = request()->chkClient;
        $conf_code = Str::random(15);

        $avatar = request()->file('avatar');
        $companyLogo = request()->file('companyLogo');
        
        if($isClient == "on"){
            $this->validator_full(request()->all())->validate();
            
            $user_created = User::create([
                'name' => request()->name,
                'lastName' => request()->lastName,
                'email' => request()->email,
                'password' => bcrypt(request()->password),
                'confirmation_code' => $conf_code,
                'confirmed' => false,
                'avatar' => '',
                'phone' => request()->clientPhone,
                'address' => request()->clientAddress,
                'rif' => request()->rif,
                'razonSocial' => request()->rsocial,
                'companyAddress' => request()->companyAddress,
                'companyPhone' => request()->companyPhone,
                'is_client' => true
            ]);
        }else{
            $this->validator_basic(request()->all())->validate();
            
            $user_created = User::create([
                'name' => request()->name,
                'lastName' => request()->lastName,
                'email' => request()->email,
                'password' => bcrypt(request()->password),
                'confirmation_code' => $conf_code,
                'confirmed' => false,
                'avatar' => request()->clientImage,
                'phone' => request()->clientPhone,
                'address' => request()->clientAddress,
                'is_client' => false
            ]);
        }

        if($avatar != null){
            $fileName = $user_created->id."_". $avatar->getClientOriginalName();
            
            $avatar->storeAs('avatars', $fileName, 'customerLogo');

            $user_created->avatar = $fileName;
            
            $user_created->save();
        }

        if($companyLogo != null){
            $fileName = $user_created->id."_". $companyLogo->getClientOriginalName();
            
            $companyLogo->storeAs('companyLogo', $fileName, 'customerLogo');

            $user_created->companyLogo = $fileName;
            
            $user_created->save();
        }
        
        $req = array(
            "correo" => env('EMAIL_ADMIN')
        );
        
        $subject = "Confirmación de correo electrónico";

        
        $userInfo = array(
            'name' => $user_created->name,
            'lastName' => $user_created->lastName,
            'email' => $user_created->email,
            'confirmation_code' => $conf_code
        );

        Mail::send('emails.registeruser', $userInfo, function($message) use($req, $user_created, $subject){
            $message->from($req["correo"], 'Web Modular Top');
            $message->to($user_created->email)->subject($subject);
        });

        $data = [
            'title' => 'Información',
            'img' => asset('images/mail.png'),
            'content' => 'Su registro fue llevado a cabo de manera satisfactoria, le hemos enviado un correo electrónico para la confirmación. <br>Recuerde tambien revisar en los correos de spam.'
        ];

        return view("layouts.layoutMessage", $data);
    }   

    protected function getUrl($user_created)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => $user_created->id,
                'hash' => $user_created->remember_token,
            ]
        );
    }

    public function vermensaje(){
        return view('layouts.layoutMessage');
    }
}

