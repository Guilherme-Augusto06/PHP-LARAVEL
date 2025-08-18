@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">

                {{-- Exibir mensagem de sucesso --}}
                @if(session('success'))
                    <div
                        style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb; border-radius: 4px;">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Exibir erros de validação --}}
                @if($errors->any())
                    <div
                        style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border: 1px solid #f5c6cb; border-radius: 4px;">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                    <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta">
                    <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
                    <input type="text" name="preco" value="{{ $produto->preco ?? old('preco') }}" placeholder="Preço" class="borda-preta">
                    <input type="text" name="estoque_minimo" value="{{ $produto->estoque_minimo ?? old('estoque_minimo') }}" placeholder="Estoque mínimo" class="borda-preta">
                    <input type="text" name="estoque_maximo" value="{{ $produto->estoque_maximo ?? old('estoque_maximo') }}" placeholder="Estoque máximo" class="borda-preta">
                    <select name="unidade_id" id="">
                        <option value="1">
                            Selecione a unidade de medida
                        </option>
                        @foreach($unidades as $unidade)
                            <option value="{{ $unidade->id }}">
                                {{ $unidade->descricao }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
