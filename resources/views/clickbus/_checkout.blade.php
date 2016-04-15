<div class="col-xs-12 padding-b-2">
    {!! Form::open(['url' => ['/clickbus/booking'], 'method' => 'POST', 'id'=>'form-pagamento', 'data-loading'=>'form-loading']) !!}
        <div class="row">
            <div class="col-sm-8">
                <h4>{{ trans('clickbus.clickbus_client-title-infos') }}</h4>
                <ul id="abas-cliente" class="nav nav-pills margin-b-1">
                    <li role="presentation" class="active"><a class="tipo-cliente" href="#pessoa-fisica" id="pessoa-fisica-tab" role="tab" data-toggle="tab" aria-controls="pessoa-fisica" aria-expanded="true" tabindex="-1">{{ trans('clickbus.clickbus_client-opt-PF') }}</a></li>
                    <li role="presentation"><a class="tipo-cliente" href="#pessoa-juridica" id="pessoa-juridica-tab" role="tab" data-toggle="tab" aria-controls="pessoa-juridica" aria-expanded="true" tabindex="-1">{{ trans('clickbus.clickbus_client-opt-PJ') }}</a></li>
                    {{-- Desativado
                    <li role="presentation"><a class="tipo-cliente" href="#estrangeiro" id="estrangeiro-tab" role="tab" data-toggle="tab" aria-controls="estrangeiro" aria-expanded="true" tabindex="-1">{{ trans('clickbus.clickbus_client-opt-foreigner') }}</a></li>
                    --}}
                </ul>
                <div class="row">
                    <div id="tabs-pagamento-cliente" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="pessoa-fisica" aria-labelledby="pessoa-fisica-tab">
                            <div class="col-xs-8">
                                <label for="nome-pf">{{ trans('global.lbl_name') }}</label>
                                <input type="text" class="required form-control" name="nome-pf" required="" value="">
                            </div>

                            <div class="col-xs-4">
                                <label for="nascimento-pf">{{ trans('global.lbl_birthday') }}</label>
                                <input type="text" class="required form-control mascara-data" required="" name="nascimento-pf" placeholder="dd/mm/aaaa" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                            </div>
                            <div class="col-xs-8 padding-t-1">
                                <label for="email-pf">{{ trans('global.lbl_email') }}</label>
                                <input type="email" class="required form-control" required="" name="email-pf" value="">
                            </div>
                            <div class="col-xs-4 padding-t-1">
                                <label for="telefone-pf">{{ trans('global.lbl_phone') }}</label>
                                <input type="text" class="required form-control" required="" name="telefone-pf" placeholder="11 987654321">
                            </div>
                            <div class="col-xs-8 padding-t-1">
                                <div class="row">
                                    <label for="documento" class="col-sm-12">{{ trans('global.lbl_document') }}</label>
                                    <div class="col-xs-4">
                                        <select id="document-type" name="documentType" class="form-control" onchange="bindaDocumentTypeSelect(this)">
                                            <option value="CPF">CPF</option>
                                            <option value="PASSAPORTE">{{ trans('global.lbl_passport') }}</option>
                                        </select>
                                        <input type="hidden" id="document-type-mp" class="" name="document-type-mp">
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
                                <input type="text" class="form-control" name="nome-pj" value="">
                            </div>
                            <div class="col-xs-4">
                                <label for="nascimento-pj">{{ trans('global.lbl_birthday') }}</label>
                                <input type="text" class="required form-control mascara-data" name="nascimento-pj" placeholder="dd/mm/aaaa" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                            </div>
                            <div class="col-xs-8 padding-t-1">
                                <label for="email-pj">{{ trans('global.lbl_email') }}</label>
                                <input type="email" class="required form-control" name="email-pj" value="">
                            </div>
                            <div class="col-xs-4 padding-t-1">
                                <label for="telefone-pj">{{ trans('global.lbl_phone') }}</label>
                                <input type="text" class="required form-control" name="telefone-pj" placeholder="11 987654321">
                            </div>
                            <div class="col-xs-12 padding-t-1">
                                <label for="razao-social-pj">Razão Social</label>
                                <input type="text" class="required form-control" name="razao-social-pj" placeholder="Razão Social">
                            </div>
                            <div class="col-xs-12 padding-t-1">
                                <label for="nome-fantasia-pj">Nome fantasia</label>
                                <input type="text" class="required form-control" name="nome-fantasia-pj" placeholder="Nome fantasia">
                            </div>
                            <div class="col-xs-12 padding-t-1">
                                <label for="cnpj-pj">CNPJ</label>
                                <input id=documento-pj' type="text" class="required form-control" name="cnpj-pj" placeholder="54.767.627/0001-00">
                            </div>
                        </div>
                        {{-- Desativado
                        <div role="tabpanel" class="tab-pane fade" id="estrangeiro" aria-labelledby="estrangeiro-tab">
                            <div class="col-xs-12">
                                <label for="nome-estrangeiro">{{ trans('global.lbl_name') }}</label>
                                <input type="text" class="required form-control" name="nome-estrangeiro" value="">
                            </div>
                            <div class="col-xs-4">
                                <label for="nascimento-estrangeiro">{{ trans('global.lbl_birthday') }}</label>
                                <input type="text" class="required form-control" name="nascimento-estrangeiro" placeholder="dd/mm/aaaa" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                            </div>
                            <div class="col-xs-8">
                                <label for="email-estrangeiro">{{ trans('global.lbl_email') }}</label>
                                <input type="email" class="required form-control" name="email-estrangeiro" value="">
                            </div>
                            <div class="col-xs-4">
                                <label for="telefone-estrangeiro">{{ trans('global.lbl_phone') }}</label>
                                <input type="text" class="required form-control" name="telefone-estrangeiro" placeholder="11 987654321">
                            </div>
                            <div class="col-xs-12">
                                <label for="passaporte-estrangeiro">{{ trans('global.lbl_passport') }}</label>
                                <input type="text" class="required form-control" name="passaporte" placeholder="Passaporte">
                            </div>
                        </div>
                        --}}
                    </div>
                </div>
                <h4 class="margin-t-2">{{ trans('clickbus.clickbus_client-title-payment-type') }}</h4>
                <ul id="abas-pagamento" class="nav nav-pills margin-b-1">
                    @forelse($decoded->items->payment_methods as $formaPagamento)
                    @if ($formaPagamento->name == 'creditcard')
                    <li role="presentation" class="active"><a class="forma-pagamento" href="#cartao-credito" id="cartao-credito-tab" role="tab" data-toggle="tab" aria-controls="cartao-credito" aria-expanded="true" tabindex="-1">{{ trans('clickbus.clickbus_client-title-credit-card') }}</a></li>
                    @endif

                    @if ($formaPagamento->name == 'debitcard')
                    <li role="presentation"><a class="forma-pagamento" href="#cartao-debito" id="cartao-debito-tab" role="tab" data-toggle="tab" aria-controls="cartao-debito" aria-expanded="true" tabindex="-1">{{ trans('clickbus.clickbus_client-title-debit-card') }}</a></li>
                    @endif

                    {{-- Desativado
                    @if ($formaPagamento->name == 'paypal_hpp')
                    <li role="presentation"><a class="forma-pagamento" href="#paypal" id="paypal-tab" role="tab" data-toggle="tab" aria-controls="paypal" aria-expanded="true" tabindex="-1">PayPal</a></li>
                    @endif
                    --}}

                    @empty
                    <p>{{ trans('clickbus.clickbus_client-error-2') }}</p>
                    @endforelse
                </ul>
                <div class="row margin-b-2">
                    <div id="tabs-pagamento-tipo" class="tab-content">
                        @forelse($decoded->items->payment_methods as $formaPagamento)
                        @if ($formaPagamento->name == 'creditcard')
                        <div role="tabpanel" class="tab-pane fade active in" id="cartao-credito" aria-labelledby="cartao-credito-tab">
                            <div class="col-xs-12 text-center radio-hidden">
                                @forelse ($formaPagamento->details as $bandeiraCartao)
                                <input type="radio" id="bandeira-cartao-{{ $bandeiraCartao->brand }}" name="bandeira-cartao" class="required seleciona-bandeira" value="{{ $bandeiraCartao->brand }}" {{ $bandeiraCartao->brand == "mastercard" ? 'checked="checked"' : ''}} required="" >
                                <label for="bandeira-cartao-{{ $bandeiraCartao->brand }}" tabindex="-1">
                                    <img src="{{ url('/img/bandeiras/'. $bandeiraCartao->brand .'.png') }}" alt="{{ $bandeiraCartao->brand }}" title="{{ $bandeiraCartao->brand }}">
                                </label>
                                @empty
                                <p>{{ trans('clickbus.clickbus_client-error-3') }}</p>
                                @endforelse
                            </div>
                            <div class="col-xs-7 padding-t-1">
                                <label for="num-cartao-credito">{{ trans('clickbus.clickbus_client-opt-card-number') }}</label>
                                <input id="num-cartao-credito"type="text" class="required form-control" name="num-cartao-credito" required="" placeholder="0000 0000 0000 0000">
                            </div>
                            <div class="col-xs-5 padding-t-1">
                                <div class="">
                                    <label for="mes-validade-credito" >{{ trans('clickbus.clickbus_client-opt-card-expiration-date') }}</label>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <select id="mes-validade-credito" class="form-control" name="mes-validade-credito">
                                                <option>{{ trans('global.date_month') }}</option>
                                                @for($i=1;$i<=12;$i++)
                                                <option>{{ str_pad($i, 2, "0", STR_PAD_LEFT) }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-xs-6">
                                            <select id="ano-validade-credito" class="form-control" name="ano-validade-credito">
                                                <option>{{ trans('global.date_year') }}</option>
                                                @for($i=0;$i<=20;$i++)
                                                <option>{{ date('Y')+$i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-7 padding-t-1">
                                <label for="nome-titular-credito">{{ trans('clickbus.clickbus_client-opt-card-name-1') }} <small>{{ trans('clickbus.clickbus_client-opt-card-name-2') }}</small></label>
                                <input id="nome-titular-credito" type="text" class="required form-control" name="nome-titular-credito" required="" placeholder="JOÃO D. SILVA">
                            </div>
                            <div class="col-xs-5 padding-t-1">
                                <label for="cod-seguranca-credito" >{{ trans('clickbus.clickbus_client-opt-card-password') }}</label>
                                <input id="cod-seguranca-credito" type="text" class="required form-control" name="cod-seguranca-credito" required="" placeholder="000">
                            </div>
                            <div class="col-xs-12 padding-t-1">
                                <label>{{ trans('clickbus.clickbus_client-opt-number-installments') }}</label>
                            </div>
                            <div class="col-xs-12 ">
                                <?php $parc_bandeira = 0; ?>
                                @forelse ($formaPagamento->details as $bandeiraCartao)
                                <select id="bandeira-{{ $bandeiraCartao->brand }}" class="form-control <?php if($parc_bandeira != 0) echo "soft-hide";$parc_bandeira++; ?> select-parcelas">
                                    @forelse ($bandeiraCartao->installments as $key => $Parcela)
                                    <option data-discount_value="{{ $bandeiraCartao->discount_value }}" data-fee="{{ $Parcela->fee }}" data-installment="{{ $Parcela->installment }}" data-total="{{ $Parcela->total }}" data-total_with_discount="{{ $Parcela->total_with_discount }}" value="{{ $key }}"> {{ $key }} @if($key == 1){{ trans('clickbus.clickbus_client-opt-installment') }} @else {{ trans('clickbus.clickbus_client-opt-installment_') }} @endif </option>
                                    @empty
                                    <option value="0"></option>
                                    @endforelse
                                </select>
                                @empty
                                <p>{{ trans('clickbus.clickbus_client-error-4') }}</p>
                                @endforelse
                            </div>

                            <div class="col-xs-12 padding-t-1">
                                <label>{{ trans('global.address_zipcode') }}</label>
                            </div>
                            <div class="col-xs-12">
                                <input type="text" class="required form-control" name="cep-titular-credito" tabindex="0" required="" placeholder="1701770">
                            </div>
                        </div>
                        @endif

                        @if ($formaPagamento->name == 'debitcard')
                        <div role="tabpanel" class="tab-pane fade" id="cartao-debito" aria-labelledby="cartao-debito-tab">
                            <input name="cartao-debito-datas" id="cartao-debito-datas" type="hidden" data-discount_value="{{ $formaPagamento->details[0]->discount_value }}" data-fee="{{ $formaPagamento->details[0]->installments->{'1'}->fee }}" data-installment="{{ $formaPagamento->details[0]->installments->{'1'}->installment }}" data-total="{{ $formaPagamento->details[0]->installments->{'1'}->total }}" data-total_with_discount="{{ $formaPagamento->details[0]->installments->{'1'}->total_with_discount }}" value="1">
                            <div class="col-xs-12">
                                <h5 class="text-center">{{ trans('clickbus.clickbus_client-bank-plugin') }}</h5>
                            </div>
                            <div class="col-xs-7">
                                <label for="num-cartao-debito">{{ trans('clickbus.clickbus_client-opt-card-number') }}</label>
                                <input type="text" class="required form-control" name="num-cartao-debito" placeholder="0000 0000 0000 0000">
                            </div>
                            <div class="col-xs-5">
                                <label for="cod-seguranca-debito" >{{ trans('clickbus.clickbus_client-opt-card-password') }}</label>
                                <input type="text" class="required form-control" name="cod-seguranca-debito" placeholder="000">
                            </div>
                            <div class="col-xs-7 padding-t-1">
                                <label for="nome-titular-debito">{{ trans('clickbus.clickbus_client-opt-card-name-1') }} <small>{{ trans('clickbus.clickbus_client-opt-card-name-2') }}</small></label>
                                <input type="text" class="required form-control" name="nome-titular-debito" placeholder="JOÃO D. SILVA">
                            </div>
                            <div class="col-xs-5 padding-t-1">
                                <div class="">
                                    <label for="mes-validade-debito" >{{ trans('clickbus.clickbus_client-opt-card-expiration-date') }}</label>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <select class="form-control" name="mes-validade-debito">
                                                <option>{{ trans('global.date_month') }}</option>
                                                @for($i=1;$i<=12;$i++)
                                                <option>{{ str_pad($i, 2, "0", STR_PAD_LEFT) }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-xs-6">
                                            <select class="form-control" name="ano-validade-debito">
                                                <option>{{ trans('global.date_year') }}</option>
                                                @for($i=0;$i<=20;$i++)
                                                <option>{{ date('Y')+$i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 padding-t-1">
                                <label>{{ trans('global.address_zipcode') }}:</label>
                            </div>
                            <div class="col-xs-12">
                                <input type="text" class="required form-control" name="cep-titular-debito" tabindex="0" placeholder="1701770">
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
                        <p>{{ trans('clickbus.clickbus_client-error-5') }}</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-sm-4 detalhes-pagamento">
                <h4>{{ trans('clickbus.clickbus_client-title-payment-details') }}</h4>
                <div id="lista-passagens-pagamento" class="margin-t-2">
                    <div class="passagem">
                        <h5><b>{{ $Ida->diames }}</b></h5>
                        <div class="row">
                            <span class="col-sm-12"> {{ $Ida->company }} - {{ $Ida->classe }}</span>
                            <span class="col-sm-12">{{ trans('clickbus.clickbus_client-opt-from') }}: {{ $Ida->from }} | {{ $Ida->horario }}</span>
                            <span class="col-sm-12">{{ trans('clickbus.clickbus_client-opt-destiny') }}: {{ $Ida->to }} | {{ $Ida->horario_chegada }}<span>
                        </div>
                    </div>
                    @if (isset($Volta))
                        <div class="passagem">
                            <h5><b>{{ $Volta->diames }}</b></h5>
                            <div class="row">
                                <span class="col-sm-12"> {{ $Volta->company }} - {{ $Ida->classe }}</span>
                                <span class="col-sm-12">{{ trans('clickbus.clickbus_client-opt-from') }}: {{ $Volta->from }} | {{ $Volta->horario }}</span>
                                <span class="col-sm-12">{{ trans('clickbus.clickbus_client-opt-destiny') }}: {{ $Volta->to }} | {{ $Volta->horario_chegada }}<span>
                            </div>
                        </div>
                    @endif
                </div>
           <div class="row margin-t-2 margin-b-1 text-center">
               <div class="col-xs-12 text-left">
                   {{ trans('clickbus.clickbus_client-voucher-insert') }}
               </div>
               <div class="col-xs-6">
                   <input type="text" class="form-control" id="voucher-str" name="voucher-str" tabindex="0">
               </div>
               <button type="button" class="btn btn-acao col-xs-6" id="usar-voucher-desconto" tabindex="0">
                   {{ trans('clickbus.clickbus_client-voucher-use') }}
               </button>
           </div>
           <div class="row margin-t-2">
               <div class="col-sm-8 text-left">
                   {{ trans('clickbus.clickbus_seat_') }}:
               </div>
               <div class="col-sm-4 text-right ">
                   {{ $decoded->ticket_amount }}
               </div>
           </div>
           <div class="row">
               <div class="col-sm-8 text-left">
                   {{ trans('clickbus.clickbus_ticket_') }}:
               </div>
               <div class="col-sm-4 text-right">
                   R$ {{ number_format($decoded->original_cost,2,',','') }}
               </div>
           </div>
           <div class="row">
               <div class="col-sm-8 text-left">
                   {{ trans('clickbus.clickbus_client-taxes-fees') }}:
               </div>
               <div class="col-sm-4 text-right">
                   R$ <span class="valor-fee">{{ "0,00" }}</span>
               </div>
           </div>
           <div class="row soft-hide row-desconto">
               <div class="col-sm-8 text-left">
                   {{ trans('clickbus.clickbus_client-discounts') }}:
               </div>
               <div class="col-sm-4 text-right">
                   R$ <span class="valor-desconto">{{ "0,00" }}</span>
               </div>
           </div>
           <div class="row">
               <div class="col-sm-8 text-left">
                   {{ trans('clickbus.clickbus_client-total') }}:
               </div>
               <div class="col-sm-4 text-right">
                   R$ <span class="valor-total">{{ "0,00" }}</span>
               </div>
           </div>

           <div class="row margin-t-2 maring-b-2 valor-pagamento">
               <div class="col-xs-12 font-bold-upper">
                   <small><span class="num-vezes">1</span>x</small>
                   <span class="valor valor-installment">{{ number_format($decoded->original_cost,2,',','') }}</span>
               </div>
           </div>
           <div class="hidden">
               <input type="hidden"  id="valor-total-pagamento-passagem" name="valor-total-pagamento-passagem" value="0">
               <input type="hidden"  id="qtd-parcelas" name="qtd-parcelas" value="1">
               <input type="hidden"  id="valor-documento-mp" name="valor-documento-mp" value="">
               <input type="hidden"  id="valor-documento-type-mp" name="valor-documento-type-mp" value="">
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
               <input type="hidden" value="{{ $decoded->ticket_amount }}" name="quantidade-poltronas" id="quantidade-poltronas">
               <input type="hidden" value="cartao-credito" name="forma-pagamento" id="forma-pagamento">
               <input type="hidden" value="pessoa-fisica" name="tipo-cliente" id="tipo-cliente">

               <input type="hidden" value="0" name="desconto" id="desconto">
               <input type="hidden" value="0" name="desconto-fixo" id="desconto-fixo">
               <input type="hidden" value="0" name="desconto-servico" id="desconto-servico">

               <input type="hidden" id="ida-to" name="ida-to" value="{{ $Ida->to}}">
               <input type="hidden" id="ida-from" name="ida-from" value="{{ $Ida->from}}">
               <input type="hidden" id="ida-diames" name="ida-diames" value="{{ $Ida->diames }}">
               <input type="hidden" id="ida-horario" name="ida-horario" value="{{ $Ida->horario }}">
               <input type="hidden" id="ida-company" name="ida-company" value="{{ $Ida->company }}">
               <input type="hidden" id="ida-company-id" name="ida-company-id" value="{{ $Ida->companyId }}">

                @if (isset($Volta))
                   <input type="hidden" id="volta-to" name="volta-to" value="{{ $Volta->to}}">
                   <input type="hidden" id="volta-from" name="volta-from" value="{{ $Volta->from}}">
                   <input type="hidden" id="volta-diames" name="volta-diames" value="{{ $Volta->diames }}">
                   <input type="hidden" id="volta-horario" name="volta-horario" value="{{ $Volta->horario }}">
                   <input type="hidden" id="volta-company" name="volta-company" value="{{ $Volta->company }}">
                   <input type="hidden" id="volta-company-id" name="volta-company-id" value="{{ $Volta->companyId }}">
                @endif
           </div>
           <div class="row margin-t-2 margin-b-1 text-center">
               <button type="submit" class=" btn btn-acao" tabindex="0">
                   {{ trans('clickbus.clickbus_buy-now') }}
               </button>
           </div>
       </div>
   </div>
{!! Form::close() !!}
</div>
