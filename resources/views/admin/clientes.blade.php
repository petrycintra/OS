@extends('layout')                           <!-- Importar configurações do Framework Front-End Materialize.Css -->
@section('title', 'LOGIN CINTRA OS') <!-- Titulo da Página -->
@section('conteudo')                         <!-- Inicia a sessão d conteúdo da página -->
@auth

<nav class="blue">
    <div class="nav-wrapper container">
      <a class="brand-logo center">TELA DE CLIENTES</a>
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

        <div clas="col s12 m3">
            <div class="col s12 m6">
              <div class="card">
                <div class="card">
                  <a href="{{ Route('admin.cadastro')}}" class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">add</i></a>
                </div>
                <div class="card-content green">
                  <span class="card-title center"> ADICIONAR CLIENTE PF</span>
                </div>
              </div>
            </div>
        </div>

        <div clas="col s12 m3">
            <div class="col s12 m6">
              <div class="card">
                <div class="card">
                  <a href="{{ Route('admin.cadastroempresas')}}" class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">add</i></a>
                </div>
                <div class="card-content indigo">
                  <span class="card-title center"> ADICIONAR CLIENTE PJ</span>
                </div>
              </div>
            </div>
        </div>

        <div clas="col s12 m3">
          <div class="col s12 m6">
            <div class="card">
              <div class="card">
                <a href="{{ Route('admin.verealterar.cliente')}}" class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">edit</i></a>
              </div>
              <div class="card-content green lighten-2">
                <span class="card-title center"> VER E/ OU EDITAR CLIENTES PF</span>
              </div>
            </div>
          </div>
      </div>

      <div clas="col s12 m3">
          <div class="col s12 m6">
            <div class="card">
              <div class="card">
                <a href="{{ Route('admin.verealterar.empresa')}}" class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">edit</i></a>
              </div>
              <div class="card-content indigo lighten-2">
                <span class="card-title center"> VER E/ OU EDITAR CLIENTES PJ</span>
              </div>
            </div>
          </div>
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


@endsection
@else
{{ $redirecionamento = route('login.form') }}
@php header("location: $redirecionamento"); @endphp 
@endauth