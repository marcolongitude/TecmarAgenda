<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $admin;

    public function __construct(Guard $admin)
    {
        $this->admin = $admin;
    }

    public function handle($request, Closure $next)
    {
        $user = $request->user();

        //dd($user);
        if($user && $user->tipo == 'admin'){
            return $next($request);
        }

        if(!$user) {
            //dd('teste');
            return view('auth.unathorized');
        }

        return view('auth.unathorized');
    }
}
