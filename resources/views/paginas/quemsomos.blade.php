@extends('conectar')

@section('content')
<div class="col-sm-12 text-justified padding-b-2">

    <div class="row fundo-cheio">
        <h3 class="font-bold-upper text-center margin-b-2">
            Quem somos
            <small class="sub-titulo">
                Quais os nossos propósitos, afinal?
            </small>
        </h3>
    </div>

    <div class="row margin-b-2">
        <img src="/img/quemsomos.png" alt="Quem Somos" title="Quem Somos" class="width-100"></img>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="fundo-cheio padding-t-1 padding-b-1 padding-l-1 padding-r-1">
                <div id="vivala_missao" class="text-center margin-b-1">
                    <i class="fa fa-2x fa-bullseye laranja"></i><span class="font-bold-upper laranja"> Nossa Missão</span>
                </div>
                <p class="text-justify">
                    Fazer com que pessoas de todo o mundo possam viajar e transformar o Brasil, conhecendo diferentes regiões, culturas,
                    crenças e raças, realizando uma imersão cultural, auxiliando o desenvolvimento pessoal, do turismo e das comunidades
                    do país.<br><br><br>
                </p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="fundo-cheio padding-t-1 padding-b-1 padding-l-1 padding-r-1">
                <div id="vivala_existe" class="text-center margin-b-1">
                    <i class="fa fa-2x fa-lightbulb-o laranja"></i><span class="font-bold-upper laranja"> Porquê Nós Existimos</span>
                </div>
                <p class="text-justify">
                    A Vivalá nasceu em Outubro de 2015 e foi projetada por jovens apaixonados por viajar e transformar as realidades
                    para melhor. Estamos cansados da situação política e econômica do Brasil e queremos mudar esse panorama com atitude.
                    Não iremos mais terceirizar a culpa da situação onde estamos para o governo, empresas ou outras entidades. Se queremos
                    que as coisas mudem, mudaremos nós mesmos. Vem com a gente!
                </p>
            </div>
        </div>
    </div>

    <div class="row margin-t-2">
        <div>
            <div class="fundo-cheio padding-t-1 padding-l-1 padding-r-1 padding-b-4">
                <div id="vivala_missao" class="text-center margin-b-1">
                    <i class="fa fa-2x fa-book laranja"></i><span class="font-bold-upper laranja"> Nossa História</span>
                </div>
                <p class="text-justify">
                    Tudo começou quando nossa quando nosso fundador queria conhecer o Brasil através de um mochilão e
                    se deparou com um mercado sem informação de qualidade, vendas fragmentadas e o empacotamento de tudo e todos.
                </p>
                <p class="text-justify">
                    Somado com a grande vontade de mudança na realidade política e econômica brasileira, mas uma mudança real,
                    que realmente fizesse diferença na vida das pessoas nos criamos a Vivalá.
                </p>
                <p class="text-justify">
                    Reunimos pessoas, conceitos, valores de vida, tecnologia e começamos a construção de uma plataforma que visa
                    fazer com que as pessoas cresçam como indivíduos através de auto conhecimento, diversão e cultura em suas
                    viagens e trabalhos voluntários realizados.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
