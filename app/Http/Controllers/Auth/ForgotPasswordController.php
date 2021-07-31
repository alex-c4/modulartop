<?php

namespace App\Http\Controllers\Auth;
use Closure;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;


use Mail;


use App\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    protected $users;
    protected $tokens;

    use SendsPasswordResetEmails;

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        // $response = $this->sendResetLink(
        //     $this->credentials($request)
        // );
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        
        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }

    public function sendResetLink(array $credentials)
    {
        // First we will check to see if we found a user at the given credentials and
        // if we did not we will redirect back to this current URI with a piece of
        // "flash" data in the session to indicate to the developers the errors.
        $user = $this->getUser($credentials);
        
        if (is_null($user)) {
            return Password::INVALID_USER;
        }
        
        // $newPassw = $this->generateRandomString();
        // $newPasswCryp = bcrypt($newPassw);

        // $user->password = $newPasswCryp;
        // $user->save();
        
        // Once we have the reset token, we are ready to send the message out to this
        // user with a link to reset their password. We will then redirect back to
        // the current URI having nothing set in the session to indicate errors.

        // dd($user);
        // $this->sendPasswordResetNotification(
        //     $user,
        //     $newPassw
        // );
        $user->sendPasswordResetNotification(
            $this->tokens->create($user)
        );

        return Password::RESET_LINK_SENT;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification_bk(User $user, $newPassw)
    {
        $req = array(
            "correo" => env('EMAIL_ADMIN')
        );
        
        $subject = "Notificación de restablecimiento de contraseña";

        $userInfo = array(
            'newPassword' => $newPassw
        );
        
        Mail::send('emails.resetpassworduser', $userInfo, function($message) use($req, $user, $subject){
            $message->from($req["correo"], 'Web Modular Top');
            $message->to($user->email)->subject($subject);
        });
    }



    /**
     * Get the user for the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\CanResetPassword|null
     *
     * @throws \UnexpectedValueException
     */
    public function getUser(array $credentials)
    {

        $_user = User::where("email", $credentials['email'])->first();
        
        return $_user;
    }

    public function generateRandomString($length = 8) { 
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    }

}
