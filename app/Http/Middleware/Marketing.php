<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Marketing
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
            $rollId = auth()->user()->roll_id;
            
            if($rollId != 1 && $rollId != 3){
                return redirect('home');
            }
            return $next($request);
        }else{
            return redirect($request);            
        }

    }
}
