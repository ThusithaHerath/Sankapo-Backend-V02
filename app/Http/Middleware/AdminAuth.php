<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {

        // dd(session()->all());
        $results  = Admin::find(Session::get('id'));

        if($results){
            if ($results->token == '1' && $results->id == Session::get('id')) {
                return $next($request);
            } else {
                return redirect(RouteServiceProvider::HOME);
            }
    
        }else{
            return redirect(RouteServiceProvider::HOME);
        }

       
        // return view('welcome',compact('admin'));
    }
}