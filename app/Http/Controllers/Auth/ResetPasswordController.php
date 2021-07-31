<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }

    public function showFormResetPassw(){
        return view("auth.passwords.resetForm");
    }

    public function passwordUpdateFromSession(Request $request){

        // dd($request);
        $this->validatePassword(request()->all())->validate();
        
        if(Hash::check(request()->currentPassword, auth()->user()->password)){
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $user->password = bcrypt(request()->password);
            $user->save();
            
            return redirect('password/showFormResetPassw')->with('message', 'Clave actualizada exitosamente');
        }else{
            return redirect('password/showFormResetPassw')->with('error', 'La clave actual no coincide');
        }
    }

    public function validatePassword(array $data){
        $messages = [
            'required' => 'El campo es requerido.',
            'confirmed' => 'El campo no coincide',
            'min' => 'La clave debe ser minimo de 6 caracteres'
        ];

        return Validator::make($data, [
            'currentPassword' => 'required|string',
            'password' => 'required|confirmed|min:6'
        ], $messages);
    }

    


    
}
