<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfPostOwner
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
        if(Auth::check()){
            if( $request->post->author_id == auth()->user()->id){
                return $next($request);
            }else{
                abort(403);
            }
        }else{
            return redirect(route('login'));
        }
    }
}
