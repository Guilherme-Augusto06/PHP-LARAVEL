<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        return view('site.contato', ['titulo' => 'Contato (teste)']);
    }
    public function salvar(Request $request) {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ]);

        // Salvando no banco de dados
        SiteContato::create([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email'),
            'motivo_contato' => $request->input('motivo_contato'),
            'mensagem' => $request->input('mensagem')
        ]);

        // Retornando uma resposta adequada
        return redirect()->route('site.index');
    }
}
