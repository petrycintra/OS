<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cadastro()
    {
        return view ('admin/cadastroclientes');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cadastropf(Request $request)
    {
        //Se campo "Nome" ou "Telefone" estiverem vázios, retorna mensagem de erro
        if(empty($request->name) || empty($request->telefone))
        {
        return redirect()->back()->with('erro', "Campos \"Nome\" e \"Telefone\" são Obrigatorios.");
        //Se campo "Nome" e "Telefone" forem preenchidos, grava as informações no banco de Dados
        }else
        {
            $tipo = "PF";
            Cliente::create([
                'name'=>$request->name,
                'cpf'=>$request->cpf,
                'email'=>$request->email,
                'telefone'=>$request->telefone,
                'cep'=>$request->cep,
                'ruaav'=>$request->ruaav,
                'complemento'=>$request->complemento,
                'cidade'=>$request->cidade,
                'estado'=>$request->estado,
                'tipo'=>$tipo,
            ]);
            return redirect()->back()->with('erro', "Cliente cadastrado com sucesso");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cadastroempresas()
    {
        return view ('admin/cadastroempresas');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cadastropj(Request $request)
    {
        //Se campo "Nome" ou "Telefone" estiverem vázios, retorna mensagem de erro
        if(empty($request->name) || empty($request->telefone))
        {
        return redirect()->back()->with('erro', "Campos \"Nome\" e \"Telefone\" são Obrigatorios.");
        //Se campo "Nome" e "Telefone" forem preenchidos, grava as informações no banco de Dados
        }else
        {
            $tipo = "PJ";
            Cliente::create([
                'name'=>$request->name,
                'cnpj'=>$request->cnpj,
                'email'=>$request->email,
                'telefone'=>$request->telefone,
                'cep'=>$request->cep,
                'ruaav'=>$request->ruaav,
                'complemento'=>$request->complemento,
                'cidade'=>$request->cidade,
                'estado'=>$request->estado,
                'tipo'=>$tipo,
            ]);
            return redirect()->back()->with('erro', "Cliente cadastrado com sucesso");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function clientesmenu()
    {
        return view ('admin/clientes');
    }

    public function vercliente()
    {
        $cliente = Cliente::all();
        return view ('admin/verealterar/cliente', compact('cliente'));
    }

    public function verempresa()
    {
        $empresa = Cliente::all();
        return view ('admin/verealterar/empresa', compact('empresa'));
    }

    public function empresaselecionada(request $request)
    {
        $empresas = Cliente::where('id', '=', $request->id)->get();
        return view('admin.verealterar.empresaselecionada', compact('empresas'));
    }

    public function atualizarempresa(request $request)
    {
            $empresas = Cliente::where('id', '=', $request->id)->update
            ([
            'name'=>$request->name,
            'cnpj'=>$request->cnpj,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
            'cep'=>$request->cep,
            'ruaav'=>$request->ruaav,
            'complemento'=>$request->complemento,
            'cidade'=>$request->cidade,
            'estado'=>$request->estado,
            ]);
            $empresa = Cliente::all();
            return view ('admin/verealterar/empresa', compact('empresa'));
    }

    public function clienteselecionado(request $request)
    {
        $cliente = Cliente::where('id', '=', $request->id)->get();
        return view('admin.verealterar.clienteselecionado', compact('cliente'));
    }

    public function atualizarcliente(request $request)
    {
            $cliente = Cliente::where('id', '=', $request->id)->update
            ([
            'name'=>$request->name,
            'cpf'=>$request->cpf,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
            'cep'=>$request->cep,
            'ruaav'=>$request->ruaav,
            'complemento'=>$request->complemento,
            'cidade'=>$request->cidade,
            'estado'=>$request->estado,
            ]);
            $cliente = Cliente::all();
            return view ('admin/verealterar/cliente', compact('cliente'));
    }
}
