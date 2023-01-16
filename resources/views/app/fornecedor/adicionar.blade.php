@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="color: green";>
                {{$msgSuccess}}
            </div>
            {{-- {{$msgSuccess}} --}}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{route('app.fornecedor.adicionar')}}" method="post">
                    @csrf
                    <input type="text" name="nome" class="borda-preta" placeholder="Nome" value="{{old('nome')}}">
                    <div style="color: red";>
                        {{$errors->has('nome') ? $errors->first() : ''}}
                    </div>
                    <input type="text" name="site" class="borda-preta" placeholder="Site" value="{{old('site')}}">
                    <div style="color: red";>
                        {{$errors->has('site') ? $errors->first() : ''}}
                    </div>
                    <input type="text" name="uf" class="borda-preta" placeholder="UF" value="{{old('uf')}}">
                    <div style="color: red";>
                        {{$errors->has('uf') ? $errors->first() : ''}}
                    </div>
                    <input type="text" name="email" class="borda-preta" placeholder="Email" value="{{old('email')}}">
                    <div style="color: red";>
                        {{$errors->has('email') ? $errors->first() : ''}}
                    </div>
                    <button type="submit" class="borda-preta">Registar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
