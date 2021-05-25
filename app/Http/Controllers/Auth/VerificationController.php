<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\User;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        // $this->middleware('auth');
        // $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {
        
        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }
        
        $request->user()->user_created = $request;
        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }

    public function verify($code){
        
        $user = User::where('confirmation_code', $code)->first();

        if(!$user){
            $data = [
                'title' => 'Información',
                'img' => asset('images/mail.png'),
                'content' => 'Código no válido'
            ];

            return view("layouts.layoutMessage", $data);
        }

        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->email_verified_at = Carbon::now();
        $user->save();

        $data = [
            'title' => 'Información',
            'img' => asset('images/mail.png'),
            'content' => 'Su correo electrónico fue validado correctamente, por favor haga click en el siguiente enlace para continuar con el ingreso al sistema <a href="' . url('login') . '">continuar</a>'
        ];

        return view("layouts.layoutMessage", $data);
    }



}
