<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){

        $erro = ($request->get('erro'));
        
        // if($request->get('erro') == 1){
        //     echo 'usuario e senha não existem';
        // };

        // if($request->get('erro') == 2){
        //     echo 'faça login';
        // };

        return view('site.login', ['titulo' => 'login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
        // REGRAS DE VALIDAÇÃO
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O usuario email é obrgatorio',
            'senha.required' => 'A senha é obrgatorio'
        ];

        $request->validate($regras, $feedback);

        // print_r($request->all());

        $email = $request->get('usuario');
        $password = $request->get('senha');

        // echo "User: $email | Password: $password";

        // INICIAR O Models
        $user = new User();

        // $usuario = $user->where('email', '=', $email)->where('password', '=', $password)->get()->first();
        // OU
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            // dd($_SESSION);
            return redirect()->route('app.home');
        }else{
            // PASSAR O ERRO NA ROTA
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
