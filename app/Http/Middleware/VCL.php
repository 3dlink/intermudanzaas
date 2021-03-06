<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class VCL
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * CHECK IF USER IS ADMINISTRATOR
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('app/auth/login');
            }
        } else {
            if ($this->auth->user()->hasRole('administrador') || $this->auth->user()->hasRole('ventas') || $this->auth->user()->hasRole('coordinacion') || $this->auth->user()->hasRole('logistica')) {
                return $next($request);
            } else {
                return redirect()->guest('home');
            }
        }
    }
}