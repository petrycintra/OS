<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cadastroservicos()
    {
        return view ('admin/cadastroservicos');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function inserirservicos(Request $request)
    {
        //Se algum campo estiver vázio, retorna mensagem de erro
        if(empty($request->name) || empty($request->descricao) || empty($request->valor) || empty($request->prazo))
        {
        return redirect()->back()->with('erro', "Todos os campos são Obrigatorios.");
        //Se todos os campos forem preenchidos, grava as informações no banco de Dados
        }else
        {
            Servico::create([
                'name'=>$request->name,
                'descricao'=>$request->descricao,
                'valor'=>$request->valor,
                'prazo'=>$request->prazo,
            ]);
            return redirect()->back()->with('erro', "Serviço cadastrado com sucesso");
        }
    }

        /**
     * Show the form for creating a new resource.
     */
    public function servicosmenu()
    {
        return view ('admin/servicos');
    }

    public function verservico()
    {
        $servico = Servico::all();
        return view ('admin/verealterar/servico', compact('servico'));
    }

    public function servicoselecionado(request $request)
    {
        $servico = Servico::where('id', '=', $request->id)->get();
        return view('admin.verealterar.servicoselecionado', compact('servico'));
    }

    public function atualizarservico(request $request)
    {
        if(empty("$request->descricao"))
        {
            $servico = Servico::where('id', '=', $request->id)->update
            ([
            'name'=>$request->name,
            'valor'=>$request->valor,
            'prazo'=>$request->prazo,
            ]);
            $servico = Servico::all();
            return view ('admin/verealterar/servico', compact('servico'));
        }else{
            $servico = Servico::where('id', '=', $request->id)->update
            ([
            'name'=>$request->name,
            'descricao'=>$request->descricao,
            'valor'=>$request->valor,
            'prazo'=>$request->prazo,
            ]);
            $servico = Servico::all();
            return view ('admin/verealterar/servico', compact('servico'));
        }
    }
}
