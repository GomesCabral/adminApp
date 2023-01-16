<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar() {
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request) {
        $msgSuccess = '';
        if($request->input('_token') != ''){
            // validation
            // print_r($request->all());
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchida',
                'nome.min' => 'nome deve ter no minimo 3 caracteres',
                'nome.max' => 'nome deve ter no maximo 40 caracteres',
                'uf.min' => 'uf deve ter no minimo 2 caracteres',
                'uf.max' => 'uf deve ter no maximo 2 caracteres',
                // 'email.email' => 'email não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msgSuccess = 'Registo Realizado com sucesso';
        }
        return view('app.fornecedor.adicionar', ['msgSuccess' => $msgSuccess]);
    }
}
