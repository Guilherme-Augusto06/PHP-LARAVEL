@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;" >

                {{-- Exibir mensagem de sucesso --}}
                @if(session('success'))
                    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb; border-radius: 4px;">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Exibir erros de validação --}}
                @if($errors->any())
                    <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border: 1px solid #f5c6cb; border-radius: 4px;">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                    @csrf
                    <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome" class="borda-preta">
                    <input type="text" name="site" value="{{ old('site') }}" placeholder="Site" class="borda-preta">
                    <input type="text" name="uf" value="{{ old('uf') }}" placeholder="UF" class="borda-preta">
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="E-mail" class="borda-preta">
                    <input type="text" name="regiao" value="{{ old('regiao') }}" placeholder="Região" class="borda-preta">
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
