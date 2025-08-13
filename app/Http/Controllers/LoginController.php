<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request) {
        // Regras de validação
        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required'
        ];

        // Mensagens de erro
        $mensagens = [
            'usuario.required' => 'O campo usuário é obrigatório',
            'usuario.email' => 'O campo usuário precisa ser um email válido',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        // Validação dos dados
        $request->validate($regras, $mensagens);

        // Recuperação dos dados do formulário
        $email = $request->get('usuario');
        $senha = $request->get('senha');

        // Usar Laravel Auth para autenticação
        $credentials = [
            'email' => $email,
            'password' => $senha
        ];

        if (auth()->attempt($credentials)) {
            // Login bem-sucedido
            return redirect()->route('app.clientes');
        } else {
            // Login falhou
            return redirect()->route('site.login')
                ->withErrors(['login' => 'Email ou senha incorretos'])
                ->withInput($request->only('usuario'));
        }
    }
}
