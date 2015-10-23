@extends('viajar')

@section('content')

<div class="foto-fundo foto-header" style="background-image:url('/img/queroviajar.png');">
    <h2>Conheça o Brasil</h2>
    <h3>Escolha seu transporte e hospedagem, reserve restaurantes e entretenimento</h3>
    <div class="col-sm-12">
        <a class="suave padding-btn">
            Como funciona
        </a>
    </div>
</div>

<div class="fundo-cheio col-sm-12">
    <h3 class="font-bold-upper text-center">Já sabe para onde ir?
        <small class="sub-titulo">Monte sua viagem! </small>
    </h3>
   <!-- <iframe src="http://www.e-agencias.com.br/vivala" class="quimera_iframe" style="border: 0;">
   --> 
    
    <ul class="lista-border pesquisa-viajar">
        <li class="col-sm-3 active">
            <a href="#restaurantes" aria-controls="restaurantes" role="tab" data-toggle="tab">
                Restaurantes
            </a>
        </li>
        <li class="col-sm-5">
            <a href="#quimera" data-toggle="modal" data-target="#modal-quimera">
               Hospedagem,Vôos e Carros 
            </a>
        </li>
        <li class="col-sm-4">
            <a href="#" class="desativado">
                Passagens rodoviárias 
            </a>
        </li>
        {{--
        <li class="col-sm-3 active">
            <a href="#hospedagem" aria-controls="hospedagem" role="tab" data-toggle="tab">
                Hospedagem
            </a>
        </li>
        <li class="col-sm-3">
            <a href="#voos" aria-controls="voos" role="tab" data-toggle="tab">
                Vôos
            </a>
        </li>
        <li class="col-sm-3">
            <a href="#carros" class="desativado" aria-controls="carros" role="tab" data-toggle="tab">
                Carros
            </a>
        </li>
        --}}
    </ul>
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="restaurantes">
            @include('chefsclub.buscarestaurantes') 
            <div class="lista-restaurantes">
                @include('chefsclub.listarestaurantes') 
            </div>

        </div>

        {{--
            @include('quimera._formhotels') 
            <div class="fundo-cheio col-sm-12 resultados-busca-hospedagem text-center"> </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="voos">
            @include('quimera._formvoos')
            <div class="fundo-cheio col-sm-12 resultados-busca-voos text-center"> </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="carros">
            @include('quimera._formcarros') 
            <div class="fundo-cheio col-sm-12 resultados-busca-carros text-center"> </div>
        </div>
        --}}
    </div>
</div>
<!-- Modal com iframe da quimera -->
<div id="modal-quimera" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-body">
                <iframe src="http://www.e-agencias.com.br/vivala" class="quimera_iframe" style="border: 0;">
                </iframe>
            </div>
            <div class="modal-footer">
                <!--button type="button" class="btn btn-default" data-dismiss="modal">{{trans('global.lbl_close')}}</button> -->
            </div>
        </div>
    </div>
</div>


<!-- Modal com iframe pra fechamento de pedido -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-body">
                <iframe class="checkout">
                </iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('global.lbl_close')}}</button>
            </div>
        </div>

    </div>
</div>
{{--
<section class="secao-sem-bg text-center">
    <h3 class="subtitulo col-sm-12">Explore novos ares e mares</h3>
    <small class="col-sm-12">Descubra lugares novos e inspiradores</small>
    <div class="col-sm-4">
        <div class="foto-link">
            <a href="/rio">
                <div class="cover">
                    <img src="/img/dummy.jpg">
                </div>
                <h4>Brasília</h4>
            </a>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="foto-fundo foto-link">
            <a href="/rio">
                <div class="cover">
                    <img src="/img/dummy.jpg">
                </div>
                <h4>Brasília</h4>
            </a>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="foto-fundo foto-link">
            <a href="/rio">
                <div class="cover">
                    <img src="/img/dummy.jpg">
                </div>
                <h4>Brasília</h4>
            </a>
        </div>
    </div>
</section>

<section class="secao-sem-bg text-center">
    <h3 class="col-sm-12">Roteiros populares</h3>
    <small class="col-sm-12">Os mais curtidos, comentados e compartilhados da Vivalá</small>
    <div class="col-sm-4">
        <div class="foto-link">
            <a href="/rio">
                <div class="cover">
                    <img src="/img/dummy.jpg">
                </div>
                <h4>Brasília</h4>
                <div class="foto-comentario">
                    <div class="col-sm-5">
                        <div class="round foto">
                            <div class="cover">
                                <img src="/img/dummy.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        Uma viagem para entrar em contato com a cultura local
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="foto-link">
            <a href="/rio">
                <div class="cover">
                    <img src="/img/dummy.jpg">
                </div>
                <h4>Brasília</h4>
                <div class="foto-comentario">
                    <div class="col-sm-5">
                        <div class="round foto">
                            <div class="cover">
                                <img src="/img/dummy.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        Uma viagem para entrar em contato com a cultura local
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="foto-link">
            <a href="/rio">
                <div class="cover">
                    <img src="/img/dummy.jpg">
                </div>
                <h4>Brasília</h4>
                <div class="foto-comentario">
                    <div class="col-sm-5">
                        <div class="round foto">
                            <div class="cover">
                                <img src="/img/dummy.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        Uma viagem para entrar em contato com a cultura local
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
--}}

@endsection
