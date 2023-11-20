<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use App\Models\Cliente;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdemController extends Controller
{

    public function exibir ()
    {
        $ordem = Ordem::all();
        return view('loja.ordens', compact('ordem'));
    }
    /**
     * Display a listing of the resource.
     */
    public function cadastroordens()
    {
        $cliente = Cliente::all();
        return view ('loja/cadastroordens');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function procurarcliente(Request $request)
    {
        //Se nome for vazio, retornar a pagina com mensagem de erro
        if($request->name == null){
            return redirect(Route('loja.cadastroordens'))->with('erro', 'Campo "Cliente" não pode estar vázio'); //Se usuário e/ou senha não forem iguais aos do banco de dados, exibir mensagem
        }
        //Se nome for preenchido, pesquisar no banco de dados os registros daquele nome e exibir na tela.
        elseif($request->name != null){
            $cliente = Cliente::where('name', 'like', '%'.$request->name.'%')->get();
            return view ('loja.cadastroordens', compact('cliente'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
     public function cadastroordens_id(Request $request)
     {
            $clienteselecionado = Cliente::where('id', '=', $request->id)->get();
            return view ('loja.cadastroordens', compact('clienteselecionado'));
     }

     public function procurarservico(Request $request)
    {
        //Se nome for vazio, retornar a pagina com mensagem de erro
        if($request->servico == null){
            return redirect()->back()->with('erro', 'Campo "Servico" não pode estar vázio'); //Se usuário e/ou senha não forem iguais aos do banco de dados, exibir mensagem
        }
        //Se nome for preenchido, pesquisar no banco de dados os registros daquele nome e exibir na tela.
        elseif($request->servico != null){
            $servico = Servico::where('name', 'like', '%'.$request->servico.'%')->get();
            return redirect()->back()->with( ['servico' => $servico] );
        }
    }

    public function cadastroordens_id_servico(Request $request)
    {
           $clienteselecionado = Cliente::where('id', '=', $request->id)->get();
           $servicoselecionado = Servico::where('id', '=', $request->servico)->get();
           return view ('loja.cadastroordens_proximo', compact('clienteselecionado', 'servicoselecionado'));
    }

    public function inserirordens(Request $request)
    {
        if(empty($request->name)  or empty($request->tipo) or empty($request->equipamento) or empty($request->servico)
        or empty($request->descricao) or empty($request->valor) or empty($request->prazo) or empty($request->status) ){
            return redirect()->back()->with('erro', "Todos os campos devem ser preenchidos");
        }
        Ordem::create([
            'name'=>$request->name,
            'tipo'=>$request->tipo,
            'equipamento'=>$request->equipamento,
            'servico'=>$request->servico,
            'descricao'=>$request->descricao,
            'valor'=>$request->valor,
            'prazo'=>$request->prazo,
            'status'=>$request->status,
            'responsavel'=>Auth::user()->name,
        ]);
        return redirect()->back()->with('erro', "Serviço cadastrado com sucesso");
    }

    public function ordemselecionada(request $request)
    {
        $ordem = Ordem::where('id', '=', $request->id)->get();
        return view('loja.verealterar.ordem', compact('ordem'));
    }

    public function atualizarordem(request $request)
    {
            $ordem = Ordem::where('id', '=', $request->id)->update
            ([
                'name'=>$request->name,
                'tipo'=>$request->tipo,
                'equipamento'=>$request->equipamento,
                'servico'=>$request->servico,
                'descricao'=>$request->descricao,
                'valor'=>$request->valor,
                'prazo'=>$request->prazo,
                'status'=>$request->status,
                'responsavel'=>Auth::user()->name,
            ]);
            $ordem = Ordem::all();
            return view ('loja.ordens', compact('ordem'));
    }
}
