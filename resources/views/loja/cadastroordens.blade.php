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

    <div class="row container">
        @if(!isset($clienteselecionado))
        <form action="{{ route('loja.procurarcliente')}}" class = "col s12 center" method="post">
            @csrf
            <div class="input-field col s12">
                <input name="name" placeholder ="NOME DO CLIENTE QUE SOLICITA A ORDEM" id="name" type="text" class="validate">
                <label for="name">Cliente</label>
            </div ><br><br><br><br>
            <button type="submit" class="waves-effect waves-light btn blue">CONSULTAR</button>
            @if(isset($cliente))
            <table class="striped">
                <thead>
                    <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>CPF/CNPJ</th>
                    <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cliente as $dados)
                    <tr>
                        <td> {{ $dados->name }} </td>
                        <td> {{ $dados->tipo }} </td>
                        <td> {{ $dados->cpf }} {{ $dados->cnpj }} </td>
                        <td> {{ $dados->telefone }} </td>
                        <td><a href="{{ Route('loja.cadastroordens_id')}}/{{$dados->id}}"   name="btn-editar" class="btn orange" > Criar Ordem</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @if($mensagem = Session::get('erro'))
                <br><center> {{ $mensagem }} </center>
            @endif
        </form>
        @endif
        @if(isset($clienteselecionado))
        @foreach ($clienteselecionado as $dados)
        <form action="{{ route('loja.procurarservico')}}" method="POST">
            @csrf
            <br><br>
              <div class="row container">
                <input type="hidden" name="id" value="{{ $dados->id }}" id="id" type="text" class="validate">
                <input type="hidden" name="name" value="{{ $dados->name }}" id="name" type="text" class="validate">
                  <div class="input-field col s12">
                      <input name="vername" value ="{{ $dados->name }}" id="vername" type="text" class="validate" disabled>
                      <label for="vername">NOME DO CLIENTE</label>
                  </div>

                  <div class="input-field col s12">
                    <input name="vertipo" value ="{{ $dados->tipo }}" id="vertipo" type="text" class="validate" disabled>
                    <label for="vertipo">TIPO DE CONTA DO CLIENTE</label>
                </div>
          
                  <div class="input-field col s12">
                      <input name="servico" placeholder ="QUAL SERVIÇO SERÁ REALIZADO?" id="servico" type="text" class="validate">
                      <label for="servico">SERVIÇO</label>
                  </div>
                  @if(!isset($dados->servico))
                  <div class="center">
                    <button type="submit" class="btn" name="btn-servico"> PESQUISAR SERVIÇO </button>
                </div>
                  @endif
                  @php
                    $servico = Session::get('servico'); 
                  @endphp
                  @if(isset($servico))
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
                        @foreach($servico as $serv)
                        <tr>
                            <td> {{ $serv->name }} </td>
                            <td> {{ $serv->descricao }} </td>
                            <td> R$: {{ $serv->valor }}</td>
                            <td> {{ $serv->Prazo }} Dias</td>
                            <td><a href="{{ Route('loja.cadastroordens_id')}}/{{$dados->id}}/{{$serv->id}}"   name="btn-editar" class="btn orange" > Selecionar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                  @endif
              </div>
              @endforeach
          
          
          <!-- caso ocorra algum erro na rota 'login.auth' a mensagem de erro será exibida na tela com o comando abaixo -->
          <font name="mensagem" id="mensagem">
          @if($mensagem = Session::get('erro'))
           <br><center> {{ $mensagem }} </center>
          @endif
          <br></font>
          </div>
          </form>
        @endif

    </div>
</div>

@endsection
@else
{{ $redirecionamento = route('login.form') }}
@php header("location: $redirecionamento"); @endphp 
@endauth