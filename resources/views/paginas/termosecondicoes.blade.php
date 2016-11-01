@extends('mobiletemplate')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fundo-laranja">
    <div class="padding-t-1 padding-b-1 text-center container-logo">
        <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
            <img src="{{ asset('vivala-logo-branco.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.title_vivala') }}" />
        </div>
    </div>
    <div class="hidden-lg">
        <a href="#" class="link-voltar history-back padding-t-1">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    <div class="conteudo-mobile margin-b-1 text-justified width-100">
          <div class="row">
            <h3 class="text-center margin-b-2 font-bold-upper">
                {!! trans('global.termsconditions_title') !!}
                <small class="margin-t-1 sub-titulo ajuste-fonte-avenir-medium">
                    {!! trans('global.termsconditions_subtitle') !!}
                </small>
            </h3>
          </div>
          <section class="container">
            <div class="row">
                <p class="col-md-12 col-lg-12 ajuste-fonte-avenir-light">
                    {!! trans('global.termsconditions_intro_text') !!}
                </p>
                <div id="politica-de-compras" class="margin-b-2">
                    <h5 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-b-0 titulo-zumbi">
                        {!! trans('global.termsconditions_buying_terms_title') !!}
                    </h5>
                    <p class="col-md-12 col-lg-12 ajuste-fonte-avenir-light">
                        {!! trans('global.termsconditions_buying_terms_text') !!}
                    </p>
                </div>
                <div id="politica-de-conteudos" class="margin-b-2">
                    <h5 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-b-0 titulo-zumbi">
                        {!! trans('global.termsconditions_content_terms_title') !!}
                    </h5>
                    <p class="col-md-12 col-lg-12 ajuste-fonte-avenir-light">
                        {!! trans('global.termsconditions_content_terms_text') !!}
                    </p>
                </div>
                <div id="politica-de-voluntariado" class="margin-b-2">
                    <h5 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-b-0 titulo-zumbi">
                        {!! trans('global.termsconditions_volunteer_policy_title') !!}
                    </h5>
                    <p class="col-md-12 col-lg-12 ajuste-fonte-avenir-light">
                        {!! trans('global.termsconditions_volunteer_policy_text') !!}
                    </p>
                </div>
                <div id="politica-de-experiencias" class="margin-b-2">
                    <h5 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-b-0 titulo-zumbi">
                        TERMOS E CONDIÇÕES PARA AQUISIÇÃO DE EXPERIÊNCIAS
                    </h5>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ol class="col-md-12 col-lg-12 text-left">
                            <li class="margin-b-1 ajuste-fonte-avenir-light text-justified">
                                Para todos os fins deste Termo, a VIVALÁ TURISMO E SERVIÇOS LTDA., sociedade empresária inscrita no CNPJ/MF sob nº 22.693.622/0001 - 85, com sede na cidade de São José  do  Rio  Preto, Estado de São Paulo, na Rua Coronel Spinola de Castro, CEP 15015-500 será denominada como  “Vivalá”, e os clientes adquirentes dos produtos intermediados pela Vivalá serão denominados “Cliente”.
                            </li>
                            <li class="margin-b-1 ajuste-fonte-avenir-light text-justified">
                                Todos os termos e condições comerciais dos serviços de  intermediaçã o  de venda de experiências turísticas (“Experiência”) ou dos produtos de terceiros fornecidos (“Produtos”), tais como, preço, condições de pagamento, e orientações gerais serão dispostas na aba de entretenimento em experiências no site <a href="{{ url('/') }}" target="_self" class="laranja">www.vivala.com.br.</a>
                            </li>
                            <li class="margin-b-1 ajuste-fonte-avenir-light text-justified">
                                Todos os pagamentos realizados pelo Cliente deverão ser feitos via boleto emitidos pela Vivalá, ou então via depósito bancário na conta  corrente  da  Vivalá: Banco Santander, Agência 2064, Conta Corrente 130011031, CNPJ/MF sob nº 22.693.622/0001-85, desde que o Cliente encaminhe o comprovante de depósito para o e-mail <a href="maito:contato@vivala.com.br?subject=Comprovante Depósito Experiências – [Nome  do Cliente] [Data da Experiência]" class="laranja">contato@vivala.com.br</a> com o título “Comprovante Depósito Experiências – [Nome do Cliente] [Data da Experiência]”.
                            </li>
                            <li class="margin-b-1 ajuste-fonte-avenir-light text-justified">
                                A Vivalá declara que trabalha como intermediária na divulgação e comercialização das Experiências através de parceiros de qualidade, entretanto, não se responsabiliza pela insatisfação do Cliente na execução das Experiências caso elas forem prestadas da forma disposta no momento da compra no site. No entanto, a falta de execução das Experiências ou o descumprimento do aqui disposto pelo Terceiro deve ser informado imediatamente para Vivalá através do e-mail <a href="maito:contato@vivala.com.br" class="laranja">contato@vivala.com.br</a> que terá 2 (dois) dias úteis para analisar o caso e retornar para o Cliente com uma resposta sobre o assunto, tentando sempre encontrar a melhor solução possível para todos.
                            </li>
                            <li class="margin-b-1 ajuste-fonte-avenir-light text-justified">
                                As Partes acordam que todos e quaisquer custos, despesas direta ou indiretamente relacionadas com os Serviços, incluindo, mas não se limitando, a hospedagem, alimentação e deslocamentos são, salvo acordado por escrito entre as Partes, de exclusiva responsabilidade do Cliente.
                            </li>
                            <li class="margin-b-1 ajuste-fonte-avenir-light text-justified">
                                A Vivalá não se responsabiliza por quaisquer objetos de valor, roupas, pertences pessoais, jóias, relógios, filmadoras, máquinas fotográficas, celulares e quaisquer outros objetos que sejam levados pelo Cliente nas Experiências, desobrigando-a de qualquer tipo de reembolso em caso de perda, furto ou roubo.
                            </li>
                            <li class="margin-b-1 ajuste-fonte-avenir-light text-justified">
                                Para transferência da Experiência pelo Cliente para qualquer terceiro será cobrada uma taxa de R$10,00 (dez reais) com a solicitação e envio do comprovante de pagamento para o e-mail <a href="maito:contato@vivala.com.br?subject=Solicitação de Transferência" class="laranja">contato@vivala.com.br</a> com no máximo 72 (setenta e duas) horas de antecedência do início da Experiência (“Solicitação de Transferência”).
                            </li>
                            <li class="margin-b-1 ajuste-fonte-avenir-light text-justified">
                                Para cancelamento da Experiência será cobrada multa de 50% sobre o valor total da experiência. O cliente deve solicitar o cancelamento pelo e-mail <a href="maito:contato@vivala.com.br?subject=Solicitação  de  Cancelamento" class="laranja">contato@vivala.com.br</a> com no máximo 72 (setenta e duas) horas de antecedência do início da Experiência (“Solicitação  de  Cancelamento”). O reembolso da Solicitação de Cancelamento será realizado na conta indicada pelo cliente em até 30 (trinta) dias. Caso a Solicitação de Cancelamento seja feita após o prazo máximo estabelecido nesta Cláusula, o Cliente não terá direito a qualquer reembolso de pagamento.
                            </li>
                            <li class="margin-b-1 ajuste-fonte-avenir-light text-justified">
                                Os casos fortuitos ou de força maior serão excludentes da responsabilidade da Vivalá e do Cliente, na forma do parágrafo único do artigo 393 do Código Civil Brasileiro.
                            </li>
                            <li class="margin-b-1 ajuste-fonte-avenir-light text-justified">
                                Os tributos e contribuições aplicáveis serão arcados pelo Cliente, de modo que a Vivalá apresentará ao final do pedido de compra das Experiências eventuais taxas e encargos, se aplicáveis. 
                            </li>
                            <li class="margin-b-1 ajuste-fonte-avenir-light text-justified">
                                Nenhuma desistência ou omissão, por qualquer Parte, de exigir o  cumprimento, pela outra, de qualquer cláusula deste Termo, nem qualquer tolerância concedida, ou demonstrada por uma Parte à outra, desobrigará, exonerará, ou, de qualquer forma, afetará nem prejudicará o direito de uma Parte de, a qualquer tempo, exigir o cumprimento rigoroso, pela outra, de qualquer ou de todos os dispositivos e obrigações deste Termo.
                            </li>
                            <li class="margin-b-1 ajuste-fonte-avenir-light text-justified">
                                O exercício pela Vivalá no acompanhamento da Experiência não exonera o Terceiro ou o próprio Cliente de suas responsabilidades por eventuais erros, falhas ou omissões relacionadas à Experiência.
                            </li>
                            <li class="ajuste-fonte-avenir-light text-justified">
                                As Partes elegem o Foro da Comarca de São Paulo, Estado de São Paulo, com renúncia expressa a qualquer outro, por mais privilegiado que seja, para nele dirimirem as questões porventura oriundas deste Termo.
                            </li>
                        </ol>
                    </div>
                </div>
                <div id="politica-de-modificacoes">
                    <h5 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-b-0 titulo-zumbi">
                        {!! trans('global.termsconditions_modifications_policy_title') !!}
                    </h5>
                    <p class="col-md-12 col-lg-12 ajuste-fonte-avenir-light">
                        {!! trans('global.termsconditions_modifications_policy_text') !!}
                    </p>
                </div>
            </div>
        </section>
        <div class="row margin-t-2 text-center">
            <a href="{{ url('home') }}" target="_self" rel="" class="btn btn-acao">
            {{ trans('global.lbl_home') }}
            </a>
        </div>
    </div>
</div>
@endsection
