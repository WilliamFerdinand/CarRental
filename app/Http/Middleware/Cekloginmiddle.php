<?php
namespace App\Http\Middleware;
Use Closure;

class Cekloginmiddle

{



public function handle($request, Closure $next)
{
    $value= session('value');
    if($value != 'logged')
    {
        return redirect('/');
    }
return($next($request));
}

}