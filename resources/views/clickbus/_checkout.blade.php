<div class="col-xs-12">
   <h3> Tela de Checkout  - Em desenvolvimento</h3>

   @if(isset($result))
       {{ $result }}
   @endif
   <div class="row">
       <div class="col-sm-8">
           <h4>Informações do Cliente</h4>
           <ul id="abas-cliente" class="nav nav-pills">
               <li role="presentation" class="active"><a href="#pessoa-fisica" id="pessoa-fisica-tab" role="tab" data-toggle="tab" aria-controls="pessoa-fisica" aria-expanded="true">Pessoa Física</a></li>
               <li role="presentation"><a href="#pessoa-juridica" id="pessoa-juridica-tab" role="tab" data-toggle="tab" aria-controls="pessoa-juridica" aria-expanded="true">Pessoa Jurídica</a></li>
               <li role="presentation"><a href="#estrangeiro" id="estrangeiro-tab" role="tab" data-toggle="tab" aria-controls="estrangeiro" aria-expanded="true">Estrangeiro</a></li>
           </ul>
           <div class="row">
               <div id="tabs-pagamento" class="tab-content">
                   <div role="tabpanel" class="tab-pane fade active in" id="pessoa-fisica" aria-labelledby="pessoa-fisica-tab">
                       <div class="col-xs-12">
                           <label for="nome-pf">Nome</label>
                           <input type="text" class="form-control" name="nome-pf" required="required">
                       </div>
                       
                       <div class="col-xs-8">
                           <label for="email-pf">Email</label>
                           <input type="email" class="form-control" required="required" name="email-pf">
                       </div>
                       <div class="col-xs-4">
                           <label for="telefone-pf">Telefone</label>
                           <input type="text" class="form-control" required="required" name="telefone-pf">
                       </div>
                   </div>
                   <div role="tabpanel" class="tab-pane fade" id="pessoa-juridica" aria-labelledby="pessoa-juridica-tab">
                       <div class="col-xs-12">
                           <label for="nome-pj">Nome do comprador</label>
                           <input type="text" class="form-control" name="nome-pj" required="required">
                       </div>
                       <div class="col-xs-8">
                           <label for="email-pj">Email</label>
                           <input type="email" class="form-control" required="required" name="email-pj">
                       </div>
                       <div class="col-xs-4">
                           <label for="telefone-pj">Telefone</label>
                           <input type="text" class="form-control" required="required" name="telefone-pj">
                       </div>
                       <div class="col-xs-12">
                           <label for="razao-social-pj">Razão Social</label>
                           <input type="text" class="form-control" name="razao-social-pj" required="required">
                       </div>
                       <div claYss="col-xs-12">
                           <label for="nome-fantasia-pj">Nome fantasia</label>
                           <input type="text" class="form-control" name="nome-fantasia-pj" required="required">
                       </div>
                       <div class="col-xs-12">
                           <label for="cnpj-pj">CNPJ</label>
                           <input type="text" class="form-control" name="cnpj-pj" required="required">
                       </div>
                   </div>
                   <div role="tabpanel" class="tab-pane fade" id="estrangeiro" aria-labelledby="estrangeiro-tab">
                       <div class="col-xs-12">
                           <label for="nome-estrangeiro">Nome</label>
                           <input type="text" class="form-control" name="nome-estrangeiro" required="required">
                       </div>
                       <div class="col-xs-8">
                           <label for="email-estrangeiro">Email</label>
                           <input type="email" class="form-control" required="required" name="email-estrangeiro">
                       </div>
                       <div class="col-xs-4">
                           <label for="telefone-estrangeiro">Telefone</label>
                           <input type="text" class="form-control" required="required" name="telefone-estrangeiro">
                       </div>
                       <div class="col-xs-12">
                           <label for="passaporte-estrangeiro">Passaporte</label>
                           <input type="text" class="form-control" name="passaporte" required="required">
                       </div>
                   </div>
               </div>
           </div>
           <h4>Forma de Pagamento</h4>
           <ul id="abas-pagamento" class="nav nav-pills">
               <li role="presentation" class="active"><a href="#cartao-credito" id="cartao-credito-tab" role="tab" data-toggle="tab" aria-controls="cartao-credito" aria-expanded="true">Cartão de crédito</a></li>
               <li role="presentation"><a href="#cartao-debito" id="cartao-debito-tab" role="tab" data-toggle="tab" aria-controls="cartao-debito" aria-expanded="true">Cartão de Débito</a></li>
               <li role="presentation"><a href="#paypal" id="paypal-tab" role="tab" data-toggle="tab" aria-controls="paypal" aria-expanded="true">PayPal</a></li>
           </ul>
           <div class="row">
               <div id="tabs-pagamento" class="tab-content">
                   <div role="tabpanel" class="tab-pane fade active in" id="cartao-credito" aria-labelledby="cartao-credito-tab">
                       <div class="col-xs-8">
                           <label for="num-cartao-credito">Número do Cartão</label>
                           <input type="text" class="col-xs-8" name="num-cartao-credito" required="required">
                       </div>
                       <div class="col-xs-4">
                           <label for="cod-seguranca-credito" >Código de Segurança</label>
                           <input type="text" class="col-xs-4" name="cod-seguranca-credito" required="required">
                       </div>
                       <div class="col-xs-8">
                           <label for="nome-titular-credito">Nome do titular <small> (como impresso no cartão)</small></label>
                           <input type="text" class="form-control" name="nome-titular-credito" required="required">
                       </div>
                       <div class="col-xs-4">
                           <div class="row">
                               <label for="mes-validade-credito" >Cartão válido até</label>
                               <select class="col-xs-6">
                                   <option>Mês</option>
                                   <option>Janiero</option>
                               </select>
                               <select class="col-xs-6">
                                   <option>Ano</option>
                                   <option>2015</option>
                               </select>
                           </div>
                       </div>
                   </div>
                   <div role="tabpanel" class="tab-pane fade" id="cartao-debito" aria-labelledby="cartao-debito-tab">
                       <div class="col-xs-8">
                           <label for="num-cartao-debito">Número do Cartão</label>
                           <input type="text" class="col-xs-8" name="num-cartao-debito" required="required">
                       </div>
                       <div class="col-xs-4">
                           <label for="cod-seguranca-debito" >Código de Segurança</label>
                           <input type="text" class="col-xs-4" name="cod-seguranca-debito" required="required">
                       </div>
                       <div class="col-xs-8">
                           <label for="nome-titular-debito">Nome do titular <small> (como impresso no cartão)</small></label>
                           <input type="text" class="form-control" name="nome-titular-debito" required="required">
                       </div>
                       <div class="col-xs-4">
                           <div class="row">
                               <label for="mes-validade-debito" >Cartão válido até</label>
                               <select class="col-xs-6">
                                   <option>Mês</option>
                                   <option>Janiero</option>
                               </select>
                               <select class="col-xs-6">
                                   <option>Ano</option>
                                   <option>2015</option>
                               </select>
                           </div>
                       </div>
                   </div>
                   <div role="tabpanel" class="tab-pane fade" id="paypal" aria-labelledby="paypal-tab">
                       Aproveite e pague sua compra com PayPal!
                       <br>

                       Finalize sua compra para ser transferido para o PayPal.

                   </div>
                </div>
           </div>
       </div>
       <div class="col-sm-4">
           <h4>Detalhes do Pagamento</h4>
       </div>
</div>
