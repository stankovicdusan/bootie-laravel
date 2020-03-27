<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if(!$request->session()->has("user")){
            \Log::critical("Someone with ip adress: " . $request->ip() . " is trying to login with wrong parameters");
            return redirect()->route("home");
        }

        $user = $request->session()->get("user");

        if($user->name != "admin")
            return redirect()->route("home");

        return $next($request);
    }
}
