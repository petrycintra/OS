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
            @foreach ($clienteselecionado as $dados)
            <form action="{{ route('loja.inserirordens')}}" method="POST">
                @csrf
                <br><br>
                <div class="row container">
                    <input type="hidden" name="id" value="{{ $dados->id }}" id="id" type="text" class="validate">
                    <input type="hidden" name="name" value="{{ $dados->name }}" id="name" type="text" class="validate">
                    <div class="input-field col s12">
                        <input name="vername" value ="{{ $dados->name }}" id="vername" type="text" class="validate" disabled>
                        <label for="vername">NOME DO CLIENTE</label>
                    </div>

                    <input type="hidden" name="tipo" value="{{ $dados->tipo }}" id="tipo" type="text" class="validate">
                    <div class="input-field col s12">
                        <input name="vertipo" value ="{{ $dados->tipo }}" id="vertipo" type="text" class="validate" disabled>
                        <label for="vertipo">TIPO DE CONTA DO CLIENTE</label>
                    </div>

                    <div class="input-field col s12">
                        <input name="equipamento" placeholder ="EQUIPAMENTO QUE O CLIENTE ESTÁ ENTREGANDO" id="equipamento" type="text" class="validate">
                        <label for="equipamento">EQUIPAMENTO</label>
                    </div>

                    @foreach ($servicoselecionado as $serv)
                        <input type="hidden" name="servico" value="{{ $serv->name }}" id="servico" type="text" class="validate">
                        <div class="input-field col s12">
                        
                            <input name="verservico" placeholder ="QUAL SERVIÇO SERÁ REALIZADO?" value="{{ $serv->name }}" id="verservico" type="text" class="validate" disabled>
                            <label for="verservico">SERVIÇO</label>
                        </div>
    
                        <div class="input-field col s12">
                        
                            <input name="descricao" placeholder ="DESCRIÇÃO DO SERVIÇO REALIZADO" value="{{ $serv->descricao }}" id="descricao" type="text" class="validate">
                            <label for="descricao">DESCRIÇÃO</label>
                        </div>

                        <div class="input-field col s12">
                        
                            <input name="valor" placeholder ="VALOR DO SERVIÇO REALIZADO" value="{{ $serv->valor }}" id="valor" type="text" class="validate">
                            <label for="valor">VALOR (Somente números)</label>
                        </div>

                        <div class="input-field col s12">
                        
                            <input name="prazo" placeholder ="PRAZO DO SERVIÇO" value="{{ $serv->prazo }} Dias" id="valor" type="text" class="validate">
                            <label for="prazo">PRAZO</label>
                        </div>
                        @endforeach

                        <table class="striped">
                            <tbody>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="radio" name="status" class="filled-in" value="Em analise/Orçamento"/>
                                            <span>Em analise/Orçamento</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" name="status" class="filled-in" value="Aguardando Aprovação"/>
                                            <span>Aguardando Aprovação</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" name="status" class="filled-in" value="Aprovado"/>
                                            <span>Aprovado</span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="radio" name="status" class="filled-in" value="Reprovado"/>
                                            <span>Reprovado</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" name="status" class="filled-in" value="Em andamento"/>
                                            <span>Em andamento</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" name="status" class="filled-in" value="Sem conserto possivel"/>
                                            <span>Sem conserto possivel</span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="radio" name="status" class="filled-in" value="Aguardando peça"/>
                                            <span>Aguardando peça</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" name="status" class="filled-in" value="Aguardando retirada"/>
                                            <span>Aguardando retirada</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" name="status" class="filled-in" value="Entregue"/>
                                            <span>Entregue</span>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="center">
                            <button type="submit" class="btn" name="btn-servico"> CADASTRAR ORDEM DE SERVIÇO </button>
                        </div>

                        <font name="mensagem" id="mensagem">
                            @if($mensagem = Session::get('erro'))
                                <br><center> {{ $mensagem }} </center>
                            @endif
                            <br>
                        </font>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
@endsection
@else
{{ $redirecionamento = route('login.form') }}
@php header("location: $redirecionamento"); @endphp 
@endauth