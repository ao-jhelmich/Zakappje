<?php namespace App\Http\Middleware;

use Closure;

class AdminMiddleware {

    public function handle($request, Closure $next)
    {
        if ($request->user()->accountRole < 2)
        {
        	$request->session()->flash('alert-danger', 'Toegang verboden');
            return redirect('/');
        }

        return $next($request);
    }

}