@extends('layout')                           <!-- Importar configurações do Framework Front-End Materialize.Css -->
@section('title', 'LOGIN CINTRA OS') <!-- Titulo da Página -->
@section('conteudo')                         <!-- Inicia a sessão d conteúdo da página -->
@auth

<nav class="blue">
    <div class="nav-wrapper container">
      <a class="brand-logo center">EDIÇÃO DE CLIENTE PJ</a>
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

<form action="{{ route('admin.verealterar.atualizarempresa')}}" method="POST">
  @csrf
  @foreach ($empresas as $empresa)
  <br><br>
  <input type="hidden" name="id" value="{{ $empresa->id }}" id="id" type="text" class="validate">
    <div class="row container">
    <div class="input-field col s6">
        <input name="name" value ="{{ $empresa->name }}" id="name" type="text" class="validate">
        <label for="name">NOME FANTASIA*</label>
    </div>

    <div class="input-field col s6">
        <input name="cnpj" value ="{{ $empresa->cnpj }}" id="cnpj" type="number" class="validate">
        <label for="cnpj">CNPJ (Sem pontuação)*</label>
    </div>
  
    <div class="input-field col s6">
        <input name="email" placeholder ="E-MAIL" value ="{{ $empresa->email }}" id="email" type="email" class="validate">
        <label for="email">EMAIL</label>
    </div>

    <div class="input-field col s6">
        <input name="telefone" placeholder ="TELEFONE" value ="{{ $empresa->telefone }}"id="telefone" type="number" class="validate">
        <label for="telefone">TELEFONE*</label>
    </div>
    <div class="row container">
        <div class="input-field col s12">
            <input name="cep" placeholder ="CEP DO ENDEREÇO" value ="{{ $empresa->cep }}" id="cep" type="number" class="validate">
            <label for="cep">CEP (Somente números)</label>
        </div>

        <div class="input-field col s12">
            <input name="ruaav" placeholder ="ENDEREÇO COMPLETO COM N°" value ="{{ $empresa->ruaav }}" id="ruaav" type="text" class="validate">
            <label for="ruaav">RUA/AVENIDA E N°</label>
        </div>

        <div class="input-field col s12">
            <input name="complemento" placeholder ="COMPLEMENTO/APARTAMENTO OU PONTO DE REFERENCIA" value ="{{ $empresa->complemento }}"id="complemento" type="text" class="validate">
            <label for="complemento">COMPLEMENTO</label>
        </div>

        <div class="input-field col s12">
            <input name="cidade" placeholder ="CIDADE" value ="{{ $empresa->cidade }}"id="cidade" type="text" class="validate">
            <label for="cidade">CIDADE</label>
        </div>

        <div class="input-field col s12">
            <input name="estado" placeholder ="ESTADO" value ="{{ $empresa->estado }}" id="estado" type="text" class="validate">
            <label for="estado">ESTADO</label>
        </div>
    </div>

    <div class="center">
        <button type="submit" class="btn" name="btn-login"> ATUALIZAR EMPRESA CLIENTE </button>
    </div>
    @endforeach


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