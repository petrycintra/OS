@extends('layout')                           <!-- Importar configurações do Framework Front-End Materialize.Css -->
@section('title', 'LOGIN CINTRA OS') <!-- Titulo da Página -->
@section('conteudo')                         <!-- Inicia a sessão d conteúdo da página -->
@auth

<nav class="blue">
    <div class="nav-wrapper container">
      <a class="brand-logo center">CADASTRO DE CLIENTES PF</a>
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

<form action="{{ route('admin.cadastropf')}}" method="POST">
  @csrf
  <br><br>
    <div class="row container">
    <div class="input-field col s6">
        <input name="name" placeholder ="NOME COMPLETO" id="name" type="text" class="validate">
        <label for="name">NOME*</label>
    </div>

    <div class="input-field col s6">
        <input name="cpf" placeholder ="CPF DO CLIENTE" id="cpf" type="number" class="validate">
        <label for="cpf">CPF (Sem pontuação)</label>
    </div>
  
    <div class="input-field col s6">
        <input name="email" placeholder ="E-MAIL" id="email" type="email" class="validate">
        <label for="email">EMAIL</label>
    </div>

    <div class="input-field col s6">
        <input name="telefone" placeholder ="TELEFONE" id="telefone" type="number" class="validate">
        <label for="telefone">TELEFONE*</label>
    </div>
    <div class="row container">
        <div class="input-field col s12">
            <input name="cep" placeholder ="CEP DO ENDEREÇO" id="cep" type="number" class="validate">
            <label for="cep">CEP (Somente números)</label>
        </div>

        <div class="input-field col s12">
            <input name="ruaav" placeholder ="ENDEREÇO COMPLETO COM N°" id="ruaav" type="text" class="validate">
            <label for="ruaav">RUA/AVENIDA E N°</label>
        </div>

        <div class="input-field col s12">
            <input name="complemento" placeholder ="COMPLEMENTO/APARTAMENTO OU PONTO DE REFERENCIA" id="complemento" type="text" class="validate">
            <label for="complemento">COMPLEMENTO</label>
        </div>

        <div class="input-field col s12">
            <input name="cidade" placeholder ="CIDADE" id="cidade" type="text" class="validate">
            <label for="cidade">CIDADE</label>
        </div>

        <div class="input-field col s12">
            <input name="estado" placeholder ="ESTADO" id="estado" type="text" class="validate">
            <label for="estado">ESTADO</label>
        </div>
    </div>

    <div class="center">
        <button type="submit" class="btn" name="btn-login"> CADASTRAR CLIENTE </button>
    </div>


<!-- caso ocorra algum erro na rota 'login.auth' a mensagem de erro será exibida na tela com o comando abaixo -->
<font name="mensagem" id="mensagem">
@if($mensagem = Session::get('erro'))
 <br><center> {{ $mensagem }} </center>
@endif

@if($errors->any())
  @foreach($errors->all() as $erro)
    {{ $erro }} <br>
  @endforeach
@endif
<br></font>
</div>
</form>


@endsection
@else
{{ $redirecionamento = route('login.form') }}
@php header("location: $redirecionamento"); @endphp 
@endauth