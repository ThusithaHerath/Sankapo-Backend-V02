<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($admin_id)
    {
        $admin = $admin_id;
        $token = Admin::where('id', '=', $admin)->first();
        
        if($token->token = '1'){
            return $next($request);
        }
        else{
          return redirect(RouteServiceProvider::HOME);
        }
    
        // return view('welcome',compact('admin'));
    }
}
