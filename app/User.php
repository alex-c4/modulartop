<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

use Mail;
use DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    public $user_created;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'lastName', 
        'email', 
        'password', 
        'confirmed', 
        'confirmation_code', 
        'avatar',
        'phone',
        'address',
        'rif',
        'razonSocial',
        'companyAddress',
        'companyPhone',
        'companyLogo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function hasRoles($roleName){
        $crrRollID = $this->getRoleID($roleName);
        $userRollID = auth()->user()->roll_id;
        return $crrRollID === $userRollID;
    }
    
    private function getRoleID($rollName){
        $rol = DB::table('roles')->where('name', $rollName)->first();
        return $rol->id;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $subject = "Confirmación de correo electrónico";

        $req = array(
            "correo" => env('EMAIL_ADMIN')
        );
        $_user = $this->user_created->user();

        $userInfo = array(
            'name' => $_user->name,
            'lastName' => $_user->lastName,
            'email' => $_user->email,
            'confirmation_code' => $_user->confirmation_code
        );

        Mail::send('emails.registeruser', $userInfo, function($message) use($req, $_user, $subject){
            $message->from($req["correo"], 'Web Modular Top');
            $message->to($_user->email)->subject($subject);
        });

    }


}
