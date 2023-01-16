<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\LogAcesso;
use Illuminate\Http\Request;

class LogAcessoMiddleware
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
        // return $next($request);
        // dd($request);

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->server->get('REQUEST_URI');
        // $rota = $request->getRequestUri;
        LogAcesso::create(['log' => "O ip $ip requisitou acesso a rota $rota"]);

        return Response('middleware a funcionar');

        // return $next($request);
    }
}
