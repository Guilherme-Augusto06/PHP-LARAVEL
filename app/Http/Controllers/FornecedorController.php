<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome'))
            ->where('site', 'like', '%' . $request->input('site'))
            ->where('uf', 'like', '%' . $request->input('uf'))
            ->where('email', 'like', '%' . $request->input('email'))
            ->where('regiao', 'like', '%' . $request->input('regiao'))
            ->paginate(2);

        return view('app.fornecedor.listar', [
            'fornecedores' => $fornecedores,
            'request' => $request->all()
        ]);
    }

    public function adicionar(Request $request)
    {
        if ($request->input('_token') != '' && $request->input('id') == '') {
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required|min:3|max:100',
                'uf' => 'required|min:2|max:2',
                'email' => 'required|email',
                'regiao' => 'required|min:3|max:50'
            ];
            $feedback = [
                'required' => 'O campo :attribute é obrigatório',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'site.min' => 'O campo site deve ter no mínimo 3 caracteres',
                'site.max' => 'O campo site deve ter no máximo 100 caracteres',
                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no máximo 2 caracteres',
                'email.email' => 'O campo email deve ser um email válido',
                'regiao.min' => 'O campo região deve ter no mínimo 3 caracteres',
                'regiao.max' => 'O campo região deve ter no máximo 50 caracteres'
            ];

            $request->validate($regras, $feedback);

            Fornecedor::create($request->all());

            return redirect()->route('app.fornecedor.adicionar')
                ->with('success', 'Fornecedor adicionado com sucesso!');
        }

        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                return redirect()->route('app.fornecedor.adicionar')
                    ->with('success', 'Fornecedor atualizado com sucesso!');
            } else {
                return redirect()->back()
                    ->with('error', 'Erro ao atualizar fornecedor.');
            }
        }

        return view('app.fornecedor.adicionar', ['fornecedor' => null]);
    }
    public function editar($id) {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', [
            'fornecedor' => $fornecedor,
        ]);



    }
}
