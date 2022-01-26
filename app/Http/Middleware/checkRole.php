<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::has('shopowner_role')){ // get 
            $role = Session::get('shopowner_role');
            
            if($role == 'Shop'){
                
                // return redirect()->route('product.ownerList');
                return redirect()->route('product.indexYjr');
            }else{
                echo "user";
                return redirect()->route('product.userList');

            }
        }else{
            return redirect()->route('login.index');
        }
        return $next($request);
    }
}
