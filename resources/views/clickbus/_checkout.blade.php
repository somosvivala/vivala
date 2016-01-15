<div class="col-xs-12 padding-b-2">
    {!! Form::open(['url' => ['/clickbus/booking'], 'method' => 'POST', 'id'=>'form-pagamento', 'data-loading'=>'form-loading']) !!}
        <div class="row">
            <div class="col-sm-8">
                <h4>Informações do Cliente</h4>
                <ul id="abas-cliente" class="nav nav-pills margin-b-1">
                    <li role="presentation" class="active"><a class="tipo-cliente" href="#pessoa-fisica" id="pessoa-fisica-tab" role="tab" data-toggle="tab" aria-controls="pessoa-fisica" aria-expanded="true">Pessoa Física</a></li>
                    <li role="presentation"><a class="tipo-cliente" href="#pessoa-juridica" id="pessoa-juridica-tab" role="tab" data-toggle="tab" aria-controls="pessoa-juridica" aria-expanded="true">Pessoa Jurídica</a></li>
                    {{-- Desativado
                    <li role="presentation"><a class="tipo-cliente" href="#estrangeiro" id="estrangeiro-tab" role="tab" data-toggle="tab" aria-controls="estrangeiro" aria-expanded="true">Estrangeiro</a></li>
                    --}}
                </ul>
                <div class="row">
                    <div id="tabs-pagamento-cliente" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="pessoa-fisica" aria-labelledby="pessoa-fisica-tab">
                            <div class="col-xs-8">
                                <label for="nome-pf">Nome</label>
                                <input type="text" class="required form-control" name="nome-pf" required="" value="{{ Auth::user()->perfil->nome_completo }}">
                            </div>

                            <div class="col-xs-4">
                                <label for="nascimento-pf">Nascimento</label>
                                <input type="text" class="required form-control" required="" name="nascimento-pf" placeholder="dd/mm/aaaa" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                            </div>
                            <div class="col-xs-8">
                                <label for="email-pf">Email</label>
                                <input type="email" class="required form-control" required="" name="email-pf" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col-xs-4">
                                <label for="telefone-pf">Telefone</label>
                                <input type="text" class="required form-control" required="" name="telefone-pf" placeholder="11 987654321">
                            </div>
                            <div class="col-xs-8">
                                <div class="row">
                                    <label for="documento" class="col-sm-12">Documento:</label>
                                    <div class="col-xs-4">
                                        <select id="document-type" name="documentType" class="">
                                            <option value="rg">RG</option>
                                            <option value="passaporte">Passaporte</option>
                                            <option value="cpf">CPF</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" id="documento-pf" class="required form-control" placeholder="Ex: 123.456.789-0" name="documento-pf" required="" >
                                    </div>
                                </div>
                            </div>


                        </div>



                        <div role="tabpanel" class="tab-pane fade" id="pessoa-juridica" aria-labelledby="pessoa-juridica-tab">
                            <div class="col-xs-8">
                                <label for="nome-pj">Nome do comprador</label>
                                <input type="text" class="form-control" name="nome-pj" value="{{ Auth::user()->perfil->nome_completo }}">
                            </div>
                            <div class="col-xs-4">
                                <label for="nascimento-pj">Data de nascimento</label>
                                <input type="text" class="required form-control" name="nascimento-pj" placeholder="dd/mm/aaaa" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                            </div>
                            <div class="col-xs-8">
                                <label for="email-pj">Email</label>
                                <input type="email" class="required form-control" name="email-pj" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col-xs-4">
                                <label for="telefone-pj">Telefone</label>
                                <input type="text" class="required form-control" name="telefone-pj" placeholder="11 987654321">
                            </div>
                            <div class="col-xs-12">
                                <label for="razao-social-pj">Razão Social</label>
                                <input type="text" class="required form-control" name="razao-social-pj" placeholder="Razão Social">
                            </div>
                            <div class="col-xs-12">
                                <label for="nome-fantasia-pj">Nome fantasia</label>
                                <input type="text" class="required form-control" name="nome-fantasia-pj" placeholder="Nome fantasia">
                            </div>
                            <div class="col-xs-12">
                                <label for="cnpj-pj">CNPJ</label>
                                <input type="text" class="required form-control" name="cnpj-pj" placeholder="54.767.627/0001-00">
                            </div>
                        </div>
                        {{-- Desativado
                        <div role="tabpanel" class="tab-pane fade" id="estrangeiro" aria-labelledby="estrangeiro-tab">
                            <div class="col-xs-12">
                                <label for="nome-estrangeiro">Nome</label>
                                <input type="text" class="required form-control" name="nome-estrangeiro" value="{{ Auth::user()->perfil->nome_completo }}">
                            </div>
                            <div class="col-xs-4">
                                <label for="nascimento-estrangeiro">Data de nascimento</label>
                                <input type="text" class="required form-control" name="nascimento-estrangeiro" placeholder="dd/mm/aaaa" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                            </div>
                            <div class="col-xs-8">
                                <label for="email-estrangeiro">Email</label>
                                <input type="email" class="required form-control" name="email-estrangeiro" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col-xs-4">
                                <label for="telefone-estrangeiro">Telefone</label>
                                <input type="text" class="required form-control" name="telefone-estrangeiro" placeholder="11 987654321">
                            </div>
                            <div class="col-xs-12">
                                <label for="passaporte-estrangeiro">Passaporte</label>
                                <input type="text" class="required form-control" name="passaporte" placeholder="Passaporte">
                            </div>
                        </div>
                        --}}
                    </div>
                </div>
                <h4 class="margin-t-2">Forma de Pagamento</h4>
                <ul id="abas-pagamento" class="nav nav-pills margin-b-1">
                    @forelse($result->items->payment_methods as $formaPagamento)
                    @if ($formaPagamento->name == 'creditcard')
                    <li role="presentation" class="active"><a class="forma-pagamento" href="#cartao-credito" id="cartao-credito-tab" role="tab" data-toggle="tab" aria-controls="cartao-credito" aria-expanded="true">Cartão de crédito</a></li>
                    @endif

                    @if ($formaPagamento->name == 'debitcard')
                    <li role="presentation"><a class="forma-pagamento" href="#cartao-debito" id="cartao-debito-tab" role="tab" data-toggle="tab" aria-controls="cartao-debito" aria-expanded="true">Cartão de Débito</a></li>
                    @endif

                    {{-- Desativado
                    @if ($formaPagamento->name == 'paypal_hpp')
                    <li role="presentation"><a class="forma-pagamento" href="#paypal" id="paypal-tab" role="tab" data-toggle="tab" aria-controls="paypal" aria-expanded="true">PayPal</a></li>
                    @endif
                    --}}

                    @empty
                    <p> Nenhum metodo de pagamento disponivel </p>
                    @endforelse

                </ul>
                <div class="row margin-b-2">
                    <div id="tabs-pagamento-tipo" class="tab-content">
                        @forelse($result->items->payment_methods as $formaPagamento)
                        @if ($formaPagamento->name == 'creditcard')
                        <div role="tabpanel" class="tab-pane fade active in" id="cartao-credito" aria-labelledby="cartao-credito-tab">
                            <div class="col-xs-7">
                                <label for="num-cartao-credito">Número do Cartão</label>
                                <input type="text" class="required form-control" name="num-cartao-credito" required="" placeholder="0000 0000 0000 0000">
                            </div>
                            <div class="col-xs-7">
                                <label for="nome-titular-credito">Nome do titular <small> (como impresso no cartão)</small></label>
                                <input type="text" class="required form-control" name="nome-titular-credito" required="" placeholder="FULANO D. SILVA">
                            </div>
                            <div class="col-xs-5">
                                <div class="">
                                    <label for="mes-validade-credito" >Cartão válido até</label>
                                    <select class="col-xs-6" name="mes-validade-credito">
                                        <option>Mês</option>
                                        @for($i=1;$i<=12;$i++)
                                        <option>{{ str_pad($i, 2, "0", STR_PAD_LEFT) }}</option>
                                        @endfor
                                    </select>
                                    <select class="col-xs-6" name="ano-validade-credito">
                                        <option>Ano</option>
                                        @for($i=0;$i<=20;$i++)
                                        <option>{{ date('Y')+$i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-5">
                                <label for="cod-seguranca-credito" >Código de Segurança</label>
                                <input type="text" class="required form-control" name="cod-seguranca-credito" required="" placeholder="000">
                            </div>
                            <div class="col-xs-12">
                                <label>CEP:</label>
                            </div>
                            <div class="col-xs-12">
                                <input type="text" class="required form-control" name="cep-titular-credito" required="" placeholder="1701770">
                            </div>
                            <div class="col-xs-12 text-center radio-hidden">
                                @forelse ($formaPagamento->details as $bandeiraCartao)
                                <input type="radio" id="bandeira-cartao-{{ $bandeiraCartao->brand }}" name="bandeira-cartao" class="required seleciona-bandeira" value="{{ $bandeiraCartao->brand }}" required="" >
                                <label for="bandeira-cartao-{{ $bandeiraCartao->brand }}">
                                    <img src="{{ url('/img/bandeiras/'. $bandeiraCartao->brand .'.png') }}" alt="{{ $bandeiraCartao->brand }}" title="{{ $bandeiraCartao->brand }}">
                                </label>
                                @empty
                                <p> Bandeiras para esse metodo de pagamento indisponiveis </p>
                                @endforelse
                            </div>
                            <div class="col-xs-12">
                                <label>Quantidade de parcelas</label>
                            </div>
                            <div class="col-xs-12">
                                <?php $parc_bandeira = 0; ?>
                                @forelse ($formaPagamento->details as $bandeiraCartao)
                                <select id="bandeira-{{ $bandeiraCartao->brand }}" class="<?php if($parc_bandeira != 0) echo "soft-hide";$parc_bandeira++; ?> select-parcelas">
                                    @forelse ($bandeiraCartao->installments as $key => $Parcela)
                                    <option data-discount_value="{{ $bandeiraCartao->discount_value }}" data-fee="{{ $Parcela->fee }}" data-installment="{{ $Parcela->installment }}" data-total="{{ $Parcela->total }}" data-total_with_discount="{{ $Parcela->total_with_discount }}" value="{{ $key }}"> {{ $key }} @if($key == 1)parcela @else parcelas @endif </option>
                                    @empty
                                    <option value="0">Nenhuma opção disponivel</option>
                                    @endforelse
                                </select>
                                @empty
                                <p> Bandeira indisponivel </p>
                                @endforelse
                            </div>
                        </div>
                        @endif

                        @if ($formaPagamento->name == 'debitcard')
                        <div role="tabpanel" class="tab-pane fade" id="cartao-debito" aria-labelledby="cartao-debito-tab">
                            <input name="cartao-debito-datas" id="cartao-debito-datas" type="hidden" data-discount_value="{{ $formaPagamento->details[0]->discount_value }}" data-fee="{{ $formaPagamento->details[0]->installments->{'1'}->fee }}" data-installment="{{ $formaPagamento->details[0]->installments->{'1'}->installment }}" data-total="{{ $formaPagamento->details[0]->installments->{'1'}->total }}" data-total_with_discount="{{ $formaPagamento->details[0]->installments->{'1'}->total_with_discount }}" value="1">
                            <div class="col-xs-12">
                                <h5 class="text-center">É necessário possuir o plug-in do banco instalado NESTE COMPUTADOR. Caso não tenha certeza, recomendamos o uso do cartão de crédito.</h5>
                            </div>
                            <div class="col-xs-7">
                                <label for="num-cartao-debito">Número do Cartão</label>
                                <input type="text" class="required form-control" name="num-cartao-debito" placeholder="0000 0000 0000 0000">
                            </div>
                            <div class="col-xs-5">
                                <label for="cod-seguranca-debito" >Código de Segurança</label>
                                <input type="text" class="required form-control" name="cod-seguranca-debito" placeholder="000">
                            </div>
                            <div class="col-xs-7">
                                <label for="nome-titular-debito">Nome do titular <small> (como impresso no cartão)</small></label>
                                <input type="text" class="required form-control" name="nome-titular-debito" placeholder="FULANO D. SILVA">
                            </div>
                            <div class="col-xs-5">
                                <div class="">
                                    <label for="mes-validade-debito" >Cartão válido até</label>
                                    <select class="col-xs-6" name="mes-validade-debito">
                                        <option>Mês</option>
                                        @for($i=1;$i<=12;$i++)
                                        <option>{{ str_pad($i, 2, "0", STR_PAD_LEFT) }}</option>
                                        @endfor
                                    </select>
                                    <select class="col-xs-6" name="ano-validade-debito">
                                        <option>Ano</option>
                                        @for($i=0;$i<=20;$i++)
                                        <option>{{ date('Y')+$i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <label>CEP:</label>
                            </div>
                            <div class="col-xs-12">
                                <input type="text" class="required form-control" name="cep-titular-debito" placeholder="1701770">
                            </div>
                        </div>
                        @endif


                        {{-- Desativado

                        @if ($formaPagamento->name == 'paypal_hpp')

                        <div role="tabpanel" class="tab-pane fade text-center" id="paypal" aria-labelledby="paypal-tab">
                            <input name="paypal-datas" id="cartao-debito-datas" type="hidden" data-discount_value="{{ $formaPagamento->details[0]->discount_value }}" data-fee="{{ $formaPagamento->details[0]->installments->{'1'}->fee }}" data-installment="{{ $formaPagamento->details[0]->installments->{'1'}->installment }}" data-total="{{ $formaPagamento->details[0]->installments->{'1'}->total }}" data-total_with_discount="{{ $formaPagamento->details[0]->installments->{'1'}->total_with_discount }}" value="1">
                            <h3>
                            Aproveite e pague sua compra com PayPal!
                            </h3>

                            <img src="/img/bandeiras/paypal.png" alt="Paypal" title="PayPal">
                            <h5>
                            Finalize sua compra para ser transferido para o PayPal.
                            </h5>

                        </div>
                        @endif

                        --}}

                        @empty
                        <p> Metodo de pagamento indisponivel </p>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-sm-4 detalhes-pagamento">
                <h4>Detalhes do Pagamento</h4>
                <div id="lista-passagens-pagamento" class="margin-t-2">
                    <div class="passagem">
                        <h5><b>{{ $Ida->diames }}</b></h5>
                        <div class="row">
                            <span class="col-sm-12"> {{ $Ida->company }} - {{ $Ida->classe }}</span>
                            <span class="col-sm-12">De: {{ $Ida->from }} | {{ $Ida->horario }}</span>
                            <span class="col-sm-12">Para: {{ $Ida->to }} | {{ $Ida->horario_chegada }}<span>
                        </div>
                    </div>
                    @if (isset($Volta))
                        <div class="passagem">
                            <h5><b>{{ $Volta->diames }}</b></h5>
                            <div class="row">
                                <span class="col-sm-12"> {{ $Volta->company }} - {{ $Ida->classe }}</span>
                                <span class="col-sm-12">De: {{ $Volta->from }} | {{ $Volta->horario }}</span>
                                <span class="col-sm-12">Para: {{ $Volta->to }} | {{ $Volta->horario_chegada }}<span>
                            </div>
                        </div>
                    @endif
                </div>
           <div class="row margin-t-2">
               <div class="col-sm-8 text-left">
                   Poltronas:
               </div>
               <div class="col-sm-4 text-right ">
                   {{ $result->ticket_amount }}
               </div>
           </div>
           <div class="row">
               <div class="col-sm-8 text-left">
                   Passagem:
               </div>
               <div class="col-sm-4 text-right">
                   R$ {{ number_format($result->original_cost,2,',','') }}
               </div>
           </div>
           <div class="row">
               <div class="col-sm-8 text-left">
                   Impostos e taxas:
               </div>
               <div class="col-sm-4 text-right">
                   R$ <span class="valor-fee">{{ "0,00" }}</span>
               </div>
           </div>
           <div class="row soft-hide row-desconto">
               <div class="col-sm-8 text-left">
                   Desconto:
               </div>
               <div class="col-sm-4 text-right">
                   R$ <span class="valor-desconto">{{ "0,00" }}</span>
               </div>
           </div>
           <div class="row margin-t-2 maring-b-2 valor-pagamento">
               <div class="col-xs-12 font-bold-upper">
                   <small><span class="num-vezes">1</span>x</small>
                   <span class="valor valor-installment">{{ number_format($result->original_cost,2,',','') }}</span>
               </div>
           </div>
           <div class="hidden">
               <input type="hidden"  id="valor-total-pagamento-passagem" name="valor-total-pagamento-passagem" value="0">
               <input type="hidden"  id="qtd-parcelas" name="qtd-parcelas" value="1">
               {{-- Coloca as poltronas reservadas e os passageiros de cada poltrona --}}
               @if (isset($passagens))
                   @foreach ($passagens as $key => $Passagem)
                       <input type="hidden" name="passagens[{{ $key }}]['document']" value="{{ $Passagem->document }}">
                       <input type="hidden" name="passagens[{{ $key }}]['seat']" value="{{ $Passagem->seat }}">
                       <input type="hidden" name="passagens[{{ $key }}]['lastName']" value="{{ $Passagem->lastName }}">
                       <input type="hidden" name="passagens[{{ $key }}]['firstName']" value="{{ $Passagem->firstName }}">
                       <input type="hidden" name="passagens[{{ $key }}]['birthday']" value="{{ $Passagem->birthday }}">
                       <input type="hidden" name="passagens[{{ $key }}]['email']" value="{{ $Passagem->email }}">
                       <input type="hidden" name="passagens[{{ $key }}]['seatReservation']" value="{{ $Passagem->seatReservation }}">
                   @endforeach
               @endif
               {{-- Envia o tipo de pagamento (debito/crediot/paypal) --}}
               <input type="hidden" value="{{ $result->ticket_amount }}" name="quantidade-poltronas" id="quantidade-poltronas">
               <input type="hidden" value="cartao-credito" name="forma-pagamento" id="forma-pagamento">
               <input type="hidden" value="pessoa-fisica" name="tipo-cliente" id="tipo-cliente">

               <input type="hidden" id="ida-to" name="ida-to" value="{{ $Ida->to}}">
               <input type="hidden" id="ida-from" name="ida-from" value="{{ $Ida->from}}">
               <input type="hidden" id="ida-diames" name="ida-diames" value="{{ $Ida->diames }}">
               <input type="hidden" id="ida-horario" name="ida-horario" value="{{ $Ida->horario }}">
               <input type="hidden" id="ida-company" name="ida-company" value="{{ $Ida->company }}">

                @if (isset($Volta))
                   <input type="hidden" id="volta-to" name="volta-to" value="{{ $Volta->to}}">
                   <input type="hidden" id="volta-from" name="volta-from" value="{{ $Volta->from}}">
                   <input type="hidden" id="volta-diames" name="volta-diames" value="{{ $Volta->diames }}">
                   <input type="hidden" id="volta-horario" name="volta-horario" value="{{ $Volta->horario }}">
                   <input type="hidden" id="volta-company" name="volta-company" value="{{ $Volta->company }}">
                @endif
           </div>
           <div class="row margin-t-2 margin-b-1 text-center">
               <button type="submit" class=" btn btn-acao">
                   Compre agora
               </button>
           </div>
       </div>
   </div>
{!! Form::close() !!}
</div>
