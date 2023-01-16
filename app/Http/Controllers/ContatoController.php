<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';

        // echo $request->input('email');
        $motivo_contato = MotivoContato::all();
        
        return view('site.contato', ['motivo_contato'=>$motivo_contato]);

        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        // print_r($contato->getAttributes());
        $contato->save();


    }

    public function salvar(Request $request){
        //VALIDATIONS
        $validated = $request->validate([
            'nome' =>'required|min:3|max:40|unique:site_contatos',
            'telefone' =>'required',
            'email' =>'email',
            'motivo_contatos_id' =>'required',
            'mensagem' =>'required',
        ],
        [
            // PERSONALIZAR AS MENSAGENS DE ERRO
            'nome.required' => 'The name is required.',
            'nome.min' => 'nome precisa de pelo menos 3 caracteres.',
            'email.required' => 'email is required.',

            'required' => 'O :attribute deve ser preenchido',
        ]
    );

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }

}
