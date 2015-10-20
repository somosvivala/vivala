@extends('conectar')

@section('content')

<div class="fundo-cheio col-sm-12 text-justified padding-b-2">
    <div class="col-sm-12">
        <h3 class="font-bold-upper text-center margin-t-1 margin-b-2">
            {{ trans('global.lbl_manifest_our') }}
            <small class="sub-titulo margin-t-1">
                Vivemos mais que uma geração, vivemos um movimento.
            </small>
        </h3>
    </div>
    <div class="row margin-b-2">
        {{-- Colocar o vídeo do financiamento assim que estiver pronto, Vimeo ou Youtube? --}}
        <img src="/img/dummy.jpg" alt="Vivalá" title="Vivalá" class="col-sm-12"></img>
        <!-- iframe src="http://www.youtube.com/embed/dQw4w9WgXcQ"></iframe -->
    </div>
    <div class="col-sm-12">
        <div class="col-sm-12 cursor-default">
            <p class="text-left margin-b-2">
                Nós somos inquietos.
            </p>
            <p class="text-left margin-b-2">
                Nascemos assim, com essa vontade incontrolável de conhecer novas pessoas, sentir novas sensações e viver experiências
                únicas.<br>
                Sonhamos com um país melhor e fazemos desse sonho uma realidade com atitude. Estamos construindo o Brasil do futuro.
            </p>
            <p class="text-left margin-b-2">
                Lamentamos por aqueles que são se envolvem nessa mudança, que não querem ir além.<br>
                Não queremos fazer parte do grupo dos que só falam e não fazem nada.
            </p>
            <p class="text-left margin-b-2">
                Não nós.
            </p>
            <p class="text-left margin-b-2">
                Nós apostamos todas as nossas fichas em nossos ideais e lutamos por eles.<br>
                Nós queremos viajar mais, conhecer mais e transformar mais.
                Explorar cada canto deste país maravilhoso, descobrindo e desenvolvendo tudo o que eles tem a nos oferecer.<br>
                Se a rotina existe, ela ficou pra trás. Estamos em busca de novs destinos em direção à liberdade.
            </p>
            <p class="text-left margin-b-2">
                Somos do tipo que apoia a variedade de culturas, crenças, raças e pensamentos, que ainda acredita nas<br>
                pessoas, ama o Brasil e aprecia as diferenças.
            </p>
            <p class="text-left margin-b-2">
                Porque no fim das contas existem três tipos de pessoas:<br>
                - Aquelas que não sabem o que acontece<br>
                - Aquelas que imaginam o que acontece<br>
                - E nós, que fazemos acontecer.
            </p>
            <p class="text-left margin-b-2">
                Vivemos mais que uma geração, vivemos um movimento.<br>
                Viva as diferenças.<br>
                Viva as atitudes.<br>
                <span class="laranja-hover">Vivalá.</span>
            </p>
        <div>
    </div>
</div>

@endsection
