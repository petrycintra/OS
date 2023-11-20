<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function index()
    {
        return view ('index');
    }

    /**
     * Recebe os dados de login inseridos pelo usuário.
     */
    public function auth(Request $request)
    {
        $credenciais = $request->validate([   //Associa os dados inseridos à variável $credenciais
            'email' => ['required', 'email'], //Verifica se o email foi inserido e se é válido em formato de email - Ex: alguem@gmail.com
            'password' => ['required'],       //Verifica se a senha foi inserida
        ], [
            'email.required' => 'Inserir o email é obrigatório.',  //Se email não inserido, exibir mensagem
            'email.email' => 'O email inserido é inválido.',       //Se email inserido for em formato inválido, exibir mensagem
            'password.required' => "O campo senha é obrigatório.", //Se senha não inserida, exibir mensagem
        ]);

        if(auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/painel'); //Se confirmado, redireciona para o painel principal do sistema
        } else {
            return redirect()->back()->with('erro', 'Usuário ou senha não conferem.'); //Se usuário e/ou senha não forem iguais aos do banco de dados, exibir mensagem
        }
    }

    public function deslog(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(Route('login.form'));
    }

    public function painel()
    {
        return view ('admin.painel');
    }
}
