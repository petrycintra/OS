@extends('layout')                           <!-- Importar configurações do Framework Front-End Materialize.Css -->
@section('title', 'LOGIN CINTRA OS') <!-- Titulo da Página -->
@section('conteudo')                         <!-- Inicia a sessão d conteúdo da página -->
@auth

<nav class="blue">
    <div class="nav-wrapper container">
      <a class="brand-logo center">TELA DE SERVIÇOS</a>
      <ul id="nav-mobile" class="left">
        <li><a href="{{ Route('admin.painel')}}">Home</a></li>
        <li><a href="{{ Route('admin.clientes')}}">Clientes</a></li>
        <li><a href="{{ Route('admin.servicos')}}">Serviços</a></li>
      </ul>
      <ul id="nav-mobile" class="right">
        <li>Bem-Vindo(a), {{ Auth::user()->name }}</li>
        <li><a href="/deslog" class="btn red">Sair</a></li>
      </ul>
    </div>
  </nav>

  <br><br>
    <div class="row container">
        <table class="striped">
            <thead>
                <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Prazo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servico as $dados)
                <tr>
                    <td> {{ $dados->name }} </td>
                    <td> {{ $dados->descricao }} </td>
                    <td> R$: {{ $dados->valor }} </td>
                    <td> {{ $dados->prazo }} Dias </td>
                    <td><a href="{{ Route('admin.verealterar.servicoselecionado')}}/{{$dados->id}}"   name="btn-editar" class="btn orange" > Editar</a></td>
                    <td><a href="{{ Route('admin.verealterar.inativarservico')}}/{{$dados->id}}" name="btn-deletar" class="btn red" disabled> Inativar </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
@else
{{ $redirecionamento = route('login.form') }}
@php header("location: $redirecionamento"); @endphp 
@endauth