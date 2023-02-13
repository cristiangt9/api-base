<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponseTrait;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\UnauthorizedException;

class CheckAccess
{
    use ApiResponseTrait;
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // $parametros= $this->formatoAcceso("acceso_referencia",explode("|",$parametros));
        $function = $this->getFunction($request);
        if( $this->auth->user() == null || !$this->auth->user()->hasAccess($function)){
                throw new UnauthorizedException("No Access",403);
        }

        return $next($request);

    }

    /**
     * Obtiene la funcion que se desea acceder y la retorna
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    private function getFunction($request)
    {
        $function = "";
        dd($request->getRequestUri());
        return $function;
    }
}
