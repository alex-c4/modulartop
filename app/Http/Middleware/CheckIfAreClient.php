<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckIfAreClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            $isClient = auth()->user()->is_client;
            $validationByAdmin = auth()->user()->validationByAdmin;

            if(($isClient == 1 && $validationByAdmin == 1) || auth()->user()->roll_id == 1 || auth()->user()->roll_id == 5){
                return $next($request);
            }else{
                return redirect('home');
            }
        }
    }
}
