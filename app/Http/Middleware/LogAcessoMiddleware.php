<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Inicia a sessão caso não tenha sido iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica se usuário não está logado
        if (!isset($_SESSION['usuario'])) {
            return redirect()->route('site.login')
                ->withErrors(['acesso' => 'Você precisa estar logado para acessar essa página.']);
        }

        // Continua a requisição se estiver logado
        return $next($request);
    }
}
