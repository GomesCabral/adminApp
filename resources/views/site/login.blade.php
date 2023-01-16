@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <div class="informacao-pagina">
                <form action={{ route('site.login') }} method="post">
                        @csrf
                        <input name="usuario" type="text" placeholder="usuario" value="{{old('usuario')}}" class="borda-preta">
                        <p style="color: red">
                            {{$errors->has('usuario') ? $errors->first('usuario') : ''}}
                        </p>

                        <input name="senha" type="password" placeholder="senha" value="{{old('senha')}}" class="borda-preta">
                        <p style="color: red">
                            {{$errors->has('senha') ? $errors->first('senha') : ''}}
                        </p>

                        <button type="submit" class="borda-preta">Acessar</button>
                </form>

                <p style="color: red">
                    {{isset($erro) && $erro == 1 ? 'usuario ou senha não existem' : ''}}
                </p>

                <p style="color: red">
                    {{isset($erro) && $erro == 2 ? 'faça login' : ''}}
                </p>

            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
