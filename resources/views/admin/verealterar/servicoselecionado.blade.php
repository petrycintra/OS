@extends('layout')                           <!-- Importar configurações do Framework Front-End Materialize.Css -->
@section('title', 'LOGIN CINTRA OS') <!-- Titulo da Página -->
@section('conteudo')                         <!-- Inicia a sessão d conteúdo da página -->
@auth

<nav class="blue">
    <div class="nav-wrapper container">
      <a class="brand-logo center">EDIÇÃO DE SERVIÇO</a>
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

<form action="{{ route('admin.verealterar.atualizarservico')}}" method="POST">
  @csrf
  @foreach ($servico as $dados)
  <br><br>
  <input type="hidden" name="id" value="{{ $dados->id }}" id="id" type="text" class="validate">
    <div class="row container">
    <div class="input-field col s12">
        <input name="name" value ="{{ $dados->name }}" id="name" type="text" class="validate">
        <label for="name">SERVIÇO*</label>
    </div>

    <div class="input-field col s12">
        <input name="descricaoatual" value ="{{ $dados->descricao }}" id="descricaoatual" type="text" class="validate" disabled>
        <label for="descricaoatual">DESCRIÇÃO ATUAL</label>
    </div>

    <div class="input-field col s12">
        <textarea name="descricao" placeholder ="DESCRIÇÃO DO SERVIÇO" id="descricao" type="text" class="materialize-textarea"></textarea>
        <label for="descricao">NOVA DESCRIÇÃO (Deixe vázio para manter a descrição atual)</label>
    </div>
  
    <div class="input-field col s12">
        <input name="valor" value ="{{ $dados->valor }}" id="valor" type="text" class="validate">
        <label for="valor">VALOR (Em R$, Somente números)</label>
    </div>

    <div class="input-field col s12">
        <input name="prazo" value ="{{ $dados->prazo }}" id="prazo" type="text" class="validate">
        <label for="prazo">PRAZO DE CONCLUSÃO (Em dias úteis)*</label>
    </div>

    <div class="center">
        <button type="submit" class="btn" name="btn-login"> ATUALIZAR DADOS DO SERVIÇO </button>
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
@section('js')
<script>
    $('#descricao').val('New Text');
    M.textareaAutoResize($('#descricao'));
</script>
@endsection
@else
{{ $redirecionamento = route('login.form') }}
@php header("location: $redirecionamento"); @endphp 
@endauth