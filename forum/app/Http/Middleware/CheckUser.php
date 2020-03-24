<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckUser
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
        if($request->user()->type_id === 2){
            return $next($request);
        }else{
            return redirect()
                ->route('post.index')
                ->with('route-forbidden','Seu usuário não tem acesso a esta funcionalidade...');
        }        
    }
}
