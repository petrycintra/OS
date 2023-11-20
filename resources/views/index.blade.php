@extends('layout')                           <!-- Importar configurações do Framework Front-End Materialize.Css -->
@section('title', 'LOGIN CINTRA OS') <!-- Titulo da Página -->
@section('conteudo')                         <!-- Inicia a sessão d conteúdo da página -->

<nav class="blue">
  <div class="nav-wrapper container">
    <a class="brand-logo center">CENTRAL DE ORDENS DE SERVIÇO</a>
    <ul id="nav-mobile" class="left">
      <li><a href="{{ Route('admin.painel')}}">Home</a></li>
      <li><a href="{{ Route('admin.clientes')}}">Clientes</a></li>
      <li><a href="{{ Route('admin.servicos')}}">Serviços</a></li>
    </ul>
  </div>
</nav>

<form action="{{ route('login.auth')}}" method="POST">
  @csrf
  <br>
  <div class="row container">
    <div class="row container">
  <div class="input-field col s6">
      <input name="email" placeholder ="SEU EMAIL" id="email" type="email" class="validate">
      <label for="email">Email</label>
  </div>

  <div class="input-field col s6">
      <input name="password" placeholder ="SUA SENHA" id="password" type="password" class="validate">
      <label for="password">Senha</label>
  </div><br><br><br><br>
  <div class="Center">
  <button type="submit" class="btn" name="btn-login"> Fazer Login </button>
  <br><br>
  <!-- caso ocorra algum erro na rota 'login.auth' a mensagem de erro será exibida na tela com o comando abaixo -->
<font name="mensagem" id="mensagem">
  @if($mensagem = Session::get('erro'))
    {{ $mensagem }}
  @endif

  @if($errors->any())
  @foreach($errors->all() as $erro)
  {{ $erro }} <br>
  @endforeach
@endif
</div></div></div>




<br></font>
</form>


@endsection
@auth
{{ $redirecionamento = route('admin.painel') }}
@php header("location: $redirecionamento"); @endphp 
@endauth