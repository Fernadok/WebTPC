<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Admin
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        //Validar si es admin

        if($this->auth->user()->admin())
        {
            return $next($request);
        }
        else
        {
            abort(401);
        }

    }
}
