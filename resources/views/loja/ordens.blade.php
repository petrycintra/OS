@extends('layout')                           <!-- Importar configurações do Framework Front-End Materialize.Css -->
@section('title', 'LOGIN CONTROLE DE PONTO') <!-- Titulo da Página -->
@section('conteudo')                         <!-- Inicia a sessão d conteúdo da página -->
@auth


<nav class="blue">
  <div class="nav-wrapper container">
    <a class="brand-logo center">CENTRAL DE ORDENS DE SERVIÇO</a>
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

<div class="row container">

  <br><br>
    @foreach ($ordem as $exibir)
    <div clas="col s12 m3">
      <div class="col s12 m4">
        <div class="card">
          <div class="card-content">
            <span class="card-title center"> {{ $exibir->name }}<hr></span>
            <span class="card-title"> {{ $exibir->equipamento }}</span>
            <span class="card-title"> {{ $exibir->servico }}<hr></span>
            <span class="card-title center"> {{ $exibir->status }}</span>
          </div>
          <div class="card-action blue darken-2 center">
            <a href="{{ Route('loja.verealterar.ordemselecionada')}}/{{$exibir->id}}">Editar Ordem</a>
          </div>
        </div>
      </div>
    </div>
  
    @endforeach
</div>

@endsection
@else
{{ $redirecionamento = route('login.form') }}
@php header("location: $redirecionamento"); @endphp 
@endauth