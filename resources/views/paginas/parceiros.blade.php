@extends('conectar')

@section('content')
<div class="fundo-cheio col-sm-12 text-justified padding-b-2">

    <div class="row">
        <h3 class="font-bold-upper text-center margin-b-2">
            Parceiros
            <small class="sub-titulo margin-t-1">
                Todos juntos ou não somos ninguém.
            </small>
        </h3>
    </div>

    <div class="row margin-b-2">
        <img src="/img/parceiros.png" alt="O Que Fazemos" title="O Que Fazemos" class="width-100"></img>
    </div>

    <div class="row">
        <div class="col-sm-12 padding-b-4">
            <div class="col-sm-12">
                <p class="text-justify">
                Para criar uma plataforma de viagens extremamente completa e integrada a Vivalá conta com diversos parceiros que juntos, disponibilizam:<br>
                <br>
                - Mais de 200.000 hotéis em 8.000 destinos<br>
                - 500 empresas de aviação com serviços para todo o mundo<br>
                - Mais de 30 empresas de aluguel de carro em 30.000 destinos<br>
                - 1.582 restaurantes em 19 cidades brasileiras<br>
                - 3.000 destinos de ônibus no Brasil operados por 40 empresas rodoviárias<br>
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 text-center">
            {{-- TODO: Trabalhar no responsivo dos logos, lembrar --}}
            <!-- <a href="" alt="decolar.com" title="decolar.com" target="_blank" class="margin-l-1 margin-r-1 cursor-default">
                <img src="/img/parceiros/decolar.png" style="width: 124px; height: 30px;"></img>
            </a>
            <a href="" alt="chefsclub.com.br" title="chefsclub.com.br" target="_blank" class="margin-l-1 margin-r-1 cursor-default">
                <img src="/img/parceiros/chefsclub.png" style="width: 43px; height: 30px;"></img>
            </a>
            <a href="" alt="clickbus.com.br" title="clickbus.com.br" target="_blank" class="margin-l-1 margin-r-1 cursor-default">
                <img src="/img/parceiros/clickbus.png" style="width: 102px; height: 30px;"></img>
            </a> -->
            <span class="margin-l-1 margin-r-1 cursor-default">
                <img src="/img/parceiros/decolar.png" alt="decolar.com" title="decolar.com" style="width: 124px; height: 30px;"></img>
            </span>
            <span class="margin-l-1 margin-r-1 cursor-default">
                <img src="/img/parceiros/chefsclub.png" alt="chefsclub.com.br" title="chefsclub.com.br" style="width: 43px; height: 30px;"></img>
            </span>
            <span class="margin-l-1 margin-r-1 cursor-default">
                <img src="/img/parceiros/clickbus.png" alt="clickbus.com.br" title="clickbus.com.br" style="width: 102px; height: 30px;"></img>
            </span>
        </div>
    </div>
</div>
@endsection
