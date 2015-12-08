<div class="col-xs-12 padding-b-2">
   <div class="row">
       <div class="col-sm-8">
           <h4>Informações do Cliente</h4>
           <ul id="abas-cliente" class="nav nav-pills margin-b-1">
               <li role="presentation" class="active"><a href="#pessoa-fisica" id="pessoa-fisica-tab" role="tab" data-toggle="tab" aria-controls="pessoa-fisica" aria-expanded="true">Pessoa Física</a></li>
               <li role="presentation"><a href="#pessoa-juridica" id="pessoa-juridica-tab" role="tab" data-toggle="tab" aria-controls="pessoa-juridica" aria-expanded="true">Pessoa Jurídica</a></li>
               <li role="presentation"><a href="#estrangeiro" id="estrangeiro-tab" role="tab" data-toggle="tab" aria-controls="estrangeiro" aria-expanded="true">Estrangeiro</a></li>
           </ul>
           <div class="row">
               <div id="tabs-pagamento" class="tab-content">
                   <div role="tabpanel" class="tab-pane fade active in" id="pessoa-fisica" aria-labelledby="pessoa-fisica-tab">
                       <div class="col-xs-12">
                           <label for="nome-pf">Nome</label>
                           <input type="text" class="form-control" name="nome-pf" required="required" value="{{ Auth::user()->perfil->nome_completo }}">
                       </div>

                       <div class="col-xs-8">
                           <label for="email-pf">Email</label>
                           <input type="email" class="form-control" required="required" name="email-pf" value="{{ Auth::user()->email }}">
                       </div>
                       <div class="col-xs-4">
                           <label for="telefone-pf">Telefone</label>
                           <input type="text" class="form-control" required="required" name="telefone-pf" placeholder="11 987654321">
                       </div>
                   </div>
                   <div role="tabpanel" class="tab-pane fade" id="pessoa-juridica" aria-labelledby="pessoa-juridica-tab">
                       <div class="col-xs-12">
                           <label for="nome-pj">Nome do comprador</label>
                           <input type="text" class="form-control" name="nome-pj" required="required" value="{{ Auth::user()->perfil->nome_completo }}">
                       </div>
                       <div class="col-xs-8">
                           <label for="email-pj">Email</label>
                           <input type="email" class="form-control" required="required" name="email-pj" value="{{ Auth::user()->email }}">
                       </div>
                       <div class="col-xs-4">
                           <label for="telefone-pj">Telefone</label>
                           <input type="text" class="form-control" required="required" name="telefone-pj" placeholder="11 987654321">
                       </div>
                       <div class="col-xs-12">
                           <label for="razao-social-pj">Razão Social</label>
                           <input type="text" class="form-control" name="razao-social-pj" required="required" placeholder="Razão Social">
                       </div>
                       <div class="col-xs-12">
                           <label for="nome-fantasia-pj">Nome fantasia</label>
                           <input type="text" class="form-control" name="nome-fantasia-pj" required="required" placeholder="Nome fantasia">
                       </div>
                       <div class="col-xs-12">
                           <label for="cnpj-pj">CNPJ</label>
                           <input type="text" class="form-control" name="cnpj-pj" required="required" placeholder="54.767.627/0001-00">
                       </div>
                   </div>
                   <div role="tabpanel" class="tab-pane fade" id="estrangeiro" aria-labelledby="estrangeiro-tab">
                       <div class="col-xs-12">
                           <label for="nome-estrangeiro">Nome</label>
                           <input type="text" class="form-control" name="nome-estrangeiro" required="required" value="{{ Auth::user()->perfil->nome_completo }}">
                       </div>
                       <div class="col-xs-8">
                           <label for="email-estrangeiro">Email</label>
                           <input type="email" class="form-control" required="required" name="email-estrangeiro" value="{{ Auth::user()->email }}">
                       </div>
                       <div class="col-xs-4">
                           <label for="telefone-estrangeiro">Telefone</label>
                           <input type="text" class="form-control" required="required" name="telefone-estrangeiro" placeholder="+55 11 987654321">
                       </div>
                       <div class="col-xs-12">
                           <label for="passaporte-estrangeiro">Passaporte</label>
                           <input type="text" class="form-control" name="passaporte" required="required" placeholder="Passaporte">
                       </div>
                   </div>
               </div>
           </div>
           <h4 class="margin-t-2">Forma de Pagamento</h4>
           <ul id="abas-pagamento" class="nav nav-pills margin-b-1">
                @forelse($result->items->payment_methods as $formaPagamento)
                    @if ($formaPagamento->name == 'creditcard')
                      <li role="presentation" class="active"><a href="#cartao-credito" id="cartao-credito-tab" role="tab" data-toggle="tab" aria-controls="cartao-credito" aria-expanded="true">Cartão de crédito</a></li>     
                    @endif
                    
                    @if ($formaPagamento->name == 'debitcard')
                      <li role="presentation"><a href="#cartao-debito" id="cartao-debito-tab" role="tab" data-toggle="tab" aria-controls="cartao-debito" aria-expanded="true">Cartão de Débito</a></li>      
                    @endif
                    
                    @if ($formaPagamento->name == 'paypal_hpp')
                      <li role="presentation"><a href="#paypal" id="paypal-tab" role="tab" data-toggle="tab" aria-controls="paypal" aria-expanded="true">PayPal</a></li>     
                    @endif
 
                @empty
                    <p> Nenhum metodo de pagamento disponivel </p>
                @endforelse
               
           </ul>
           <div class="row margin-b-2">
               <div id="tabs-pagamento" class="tab-content">
                   @forelse($result->items->payment_methods as $formaPagamento)
                    @if ($formaPagamento->name == 'creditcard')  
                       <div role="tabpanel" class="tab-pane fade active in" id="cartao-credito" aria-labelledby="cartao-credito-tab">
                       <div class="col-xs-8">
                           <label for="num-cartao-credito">Número do Cartão</label>
                           <input type="text" class="form-control" name="num-cartao-credito" required="required" placeholder="1234 5678 9876 5432">
                       </div>
                       <div class="col-xs-4">
                           <label for="cod-seguranca-credito" >Código de Segurança</label>
                           <input type="text" class="form-control" name="cod-seguranca-credito" required="required" placeholder="123">
                       </div>
                       <div class="col-xs-8">
                           <label for="nome-titular-credito">Nome do titular <small> (como impresso no cartão)</small></label>
                           <input type="text" class="form-control" name="nome-titular-credito" required="required" placeholder="FULANO D. SILVA">
                       </div>
                       <div class="col-xs-4">
                           <div class="">
                               <label for="mes-validade-credito" >Cartão válido até</label>
                               <select class="col-xs-6">
                                   <option>Mês</option>
                                   <option>01</option>
                               </select>
                               <select class="col-xs-6">
                                   <option>Ano</option>
                                   <option>2015</option>
                               </select>
                           </div>
                       </div>
                       <div class="col-xs-12">
                           <label>Bandeira do cartão</label>
                       </div>
                       <div class="col-xs-12 text-center radio-hidden">
                            @forelse ($formaPagamento->details as $bandeiraCartao)
                                <input type="radio" id="bandeira-cartao-{{ $bandeiraCartao->brand }}" name="bandeira-cartao" class="seleciona-bandeira" value="{{ $bandeiraCartao->brand }}">
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
                            @forelse ($formaPagamento->details as $bandeiraCartao)
                                <select id="bandeira-{{ $bandeiraCartao->brand }}" class="soft-hide select-parcelas">
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
                       <div class="col-xs-8">
                           <label for="num-cartao-debito">Número do Cartão</label>
                           <input type="text" class="form-control" name="num-cartao-debito" required="required" placeholder="1234 5678 9876 5432">
                       </div>
                       <div class="col-xs-4">
                           <label for="cod-seguranca-debito" >Código de Segurança</label>
                           <input type="text" class="form-control" name="cod-seguranca-debito" required="required" placeholder="123">
                       </div>
                       <div class="col-xs-8">
                           <label for="nome-titular-debito">Nome do titular <small> (como impresso no cartão)</small></label>
                           <input type="text" class="form-control" name="nome-titular-debito" required="required" placeholder="FULANO D. SILVA">
                       </div>
                       <div class="col-xs-4">
                           <div class="row">
                               <label for="mes-validade-debito" >Cartão válido até</label>
                               <select class="col-xs-6">
                                   <option>Mês</option>
                                   <option>01</option>
                               </select>
                               <select class="col-xs-6">
                                   <option>Ano</option>
                                   <option>2015</option>
                               </select>
                           </div>
                       </div>
                   </div>
                    @endif
                    
                   @if ($formaPagamento->name == 'paypal_hpp')
                    
                   <div role="tabpanel" class="tab-pane fade" id="paypal" aria-labelledby="paypal-tab">
                       Aproveite e pague sua compra com PayPal!
                       <br>

                       Finalize sua compra para ser transferido para o PayPal.

                   </div>
                   @endif
 
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
                   <h5><b>{{ "SÁBADO, 16, JAN 2016" }}</b></h5>
                   <div class="row">
                       <span class="col-sm-12">{{ "Expresso Brasil" }} - {{ "Convencional" }}</span>
                       <span class="col-sm-12">De: {{ "Rio de Janeiro, RJ - Novo Rio"}} | {{ "00:01" }}</span>
                       <span class="col-sm-12">Para: {{ "Rio de Janeiro, RJ - Novo Rio"}} | {{ "00:01" }}</span>
                   </div>
               </div>
               <div class="passagem">
                   <h5><b>{{ "SÁBADO, 16, JAN 2016" }}</b></h5>
                   <div class="row">
                       <span class="col-sm-12">{{ "Expresso Brasil" }} - {{ "Convencional" }}</span>
                       <span class="col-sm-12">De: {{ "Rio de Janeiro, RJ - Novo Rio"}} | {{ "00:01" }}</span>
                       <span class="col-sm-12">Para: {{ "Rio de Janeiro, RJ - Novo Rio"}} | {{ "00:01" }}</span>
                   </div>
               </div>
           </div>

           <div class="row margin-t-2">
               <div class="col-sm-8 text-left">
                   Poltronas:
               </div>
               <div class="col-sm-4 text-right">
                   {{ number_format($result->ticket_amount,2,',','') }}
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
               @if (isset($passagens)) 
                   @foreach ($passagens as $key => $Passagem) 
                       <input type="hidden" name="passagens[{{ $key }}]['document']" value="{{ $Passagem->document }}">
                       <input type="hidden" name="passagens[{{ $key }}]['seat']" value="{{ $Passagem->seat }}">
                       <input type="hidden" name="passagens[{{ $key }}]['lastName']" value="{{ $Passagem->firstName }}">
                   @endforeach
               @endif

           </div>
           <div class="row margin-t-2 margin-b-1 text-center">
               <button type="submit" class=" btn btn-acao">
                   Compre agora
               </button>
           </div>
       </div>
   </div>
</div>
