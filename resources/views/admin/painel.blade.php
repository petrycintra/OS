@extends('layout')                           <!-- Importar configurações do Framework Front-End Materialize.Css -->
@section('title', 'LOGIN CINTRA OS') <!-- Titulo da Página -->
@section('conteudo')                         <!-- Inicia a sessão d conteúdo da página -->
@auth

<nav class="blue">
    <div class="nav-wrapper container">
      <a class="brand-logo center">PAINEL DE CONTROLE</a>
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

        <div clas="col s12 m3" href="#">
            <div class="col s12 m6" href="#">
              <div class="card" href="#">
                <div class="card-content green"  href="#">
                  <span class="card-title center"> ORDENS DE SERVIÇO</span>
                </div>
                <div class="card-action green darken-2 center">
                  <a href="{{ Route('loja.cadastroordens')}}">ABRIR NOVA ORDEM</a>
                  <a href="{{ Route('loja.inicio')}}">VER ORDENS EXISTENTES</a>
                </div>
              </div>
            </div>
        </div>

        <div clas="col s12 m3" href="#">
          <div class="col s12 m6" href="#">
            <div class="card" href="#">
              <div class="card-content Indigo"  href="#">
                <span class="card-title center"> CLIENTES</span>
              </div>
              <div class="card-action indigo darken-2 center">
                <a href="{{ Route('admin.cadastro')}}">NOVO CLIENTE PF</a>
                <a href="{{ Route('admin.cadastropj')}}">NOVO CLIENTE PJ</a>
                <a href="{{ Route('admin.verealterar.cliente')}}">VER CLIENTES PF</a>
                <a href="{{ Route('admin.verealterar.empresa')}}">VER CLIENTES PJ</a>
              </div>
            </div>
          </div>
      </div>

        <div clas="col s12 m3" href="#">
          <div class="col s12 m6" href="#">
            <div class="card" href="#">
              <div class="card-content grey lighten-2"  href="#">
                <span class="card-title center"> PRODUTOS</span>
              </div>
              <div class="card-action gray darken-2 center">
                <a href="#">ADICIONAR NOVO PRODUTO</a>
                <a href="#">VER TODOS OS PRODUTOS</a>
              </div>
            </div>
          </div>
      </div>

        <div clas="col s12 m3" href="#">
          <div class="col s12 m6" href="#">
            <div class="card" href="#">
              <div class="card-content indigo lighten-2"  href="#">
                <span class="card-title center"> SERVIÇOS OFERECIDOS</span>
              </div>
              <div class="card-action indigo darken-2 center">
                <a href="{{ Route('admin.cadastroservicos')}}">ADICIONAR NOVO SERVIÇO</a>
                <a href="{{ Route('admin.verealterar.servico')}}">VER TODOS OS SERVIÇOS</a>
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