<!-- DADOS BASE da ong -->
<div id="ong-create-form" class="col-sm-12">
	<div id="ong-dados-base" class="row">
		<!-- Título -->
		<h5 class="form-group col-sm-12">{{ trans('global.ong_t_register_data') }}</h5>
		<!-- Nome -->
	  <div class="form-group col-sm-12">
	    {!! Form::text("nome", $nome, ['title' => trans('global.ong_name'), 'placeholder' => trans('global.lbl_name'), 'class' => 'form-control']) !!}
	  </div>
		<!-- PrettyURL -->
	  <div class="form-group col-sm-12">
			<div class="row">
 				<div class="col-sm-4 pretty-url-padd-r">
					{!! Form::label("url_facebook", trans('global.ong_vivala_URL_ph'), ['class' => 'col-sm-12 prettyurl-input pretty-url-no-border-r']) !!}
				</div>
	  		<div class="col-sm-8 pretty-url-padd-l">
					{!! Form::text("url", null, ['title' => trans('global.ong_pretty_URL'), 'placeholder' => trans('global.ong_name_prettyurl'), 'class' => 'form-control']) !!}
				</div>
			</div>
	  </div>
		<!-- Sobre -->
	  <div class="form-group col-sm-12">
			{!! Form::textarea("descricao", null, ['title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize' ]) !!}
	  </div>
		<!-- Horários de Funcionamento -->
		<div class="form-group col-sm-12">
			{!! Form::text("horario_funcionamento", null, ['title'=> trans('global.date_time_and_date'), 'aria-label'=> trans('global.date_time_and_date'), 'placeholder'=> trans('global.date_time_and_date'), 'class'=> 'form-control' ]) !!}
		</div>
	</div>

	<!-- ENDEREÇO da ong -->
	<div id="ong-dados-endereco" class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="form-group col-sm-6">
					{!! Form::text("cep", null, ['title' => trans('global.ong_address_zipcode'), 'placeholder' => trans('global.address_zipcode'), 'class' => 'form-control']) !!}
				</div>
		    <div class="form-group col-sm-6">
	      	{!! Form::text("logradouro",  null , ['title' => trans('global.ong_address_patio'), 'placeholder' => trans('global.address_street'), 'class' => 'form-control']) !!}
		    </div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					{!! Form::text("complemento", null, ['title' => trans('global.ong_address_additional'), 'placeholder' => trans('global.address_additional'), 'class' => 'form-control']) !!}
				</div>
		    <div class="form-group col-sm-6">
	        {!! Form::text("bairro",  null , ['title' => trans('global.ong_address_district'), 'placeholder' => trans('global.address_district'), 'class' => 'form-control']) !!}
		    </div>
			</div>
			<div class="row">
		    <div class="form-group col-sm-6">
        	{!! Form::select("estado", $estados, ['title' => trans('global.ong_address_state'), 'placeholder' => trans('global.address_state'), 'class' => 'form-control']) !!}
		    </div>
		    <div class="form-group col-sm-6">
        	{!! Form::select("cidade_id", $cidades, ['title' => trans('global.ong_address_city'), 'placeholder' => trans('global.address_city'), 'class' => 'form-control']) !!}

		    </div>
			</div>
		</div>
	</div>

	<!-- CATEGORIAS da ong -->
	<!-- @if(isset($categoriasOngs)) -->
	<div id="ong-categorias" class="form-group row margin-t-2">
		<h5 class="col-sm-12">{{ trans('global.ong_t_onu_categories') }}</h5>
		<div class="row text-center">
			<div class="cat-ong" class="col-sm-12">
				<ul id="cat-ong-1" class="col-sm-3">
					<input type="radio" name="categoria-ong" value="categoria-ong-1" id="categoria-ong-1">
					<label for="categoria-ong-1">
						<img src='../img/categorias-onu/onu-cat-1-fome-e-miseria.png' alt='{{ trans('global.ong_onu_cat-1') }}' title='{{ trans('global.ong_onu_cat-1') }}' class='col-sm-12'/>
					</label>
				</ul>
				<ul id="cat-ong-2" class="col-sm-3">
					<input type="radio" name="categoria-ong" value="categoria-ong-2" id="categoria-ong-2">
					<label for="categoria-ong-2">
						<img src='../img/categorias-onu/onu-cat-2-educacao-basica-e-qualidade.png' alt='{{ trans('global.ong_onu_cat-2') }}' title='{{ trans('global.ong_onu_cat-2') }}' class='col-sm-12'/>
					</label>
				</ul>
				<ul id="cat-ong-3" class="col-sm-3">
					<input type="radio" name="categoria-ong" value="categoria-ong-3" id="categoria-ong-3">
					<label for="categoria-ong-3">
						<img src='../img/categorias-onu/onu-cat-3-igualdade-entre-sexos-e-valorizacao-mulher.png' alt='{{ trans('global.ong_onu_cat-3') }}' title='{{ trans('global.ong_onu_cat-3') }}' class='col-sm-12'/>
					</label>
				</ul>
				<ul id="cat-ong-4" class="col-sm-3">
					<input type="radio" name="categoria-ong" value="categoria-ong-4" id="categoria-ong-4">
					<label for="categoria-ong-4">
						<img src='../img/categorias-onu/onu-cat-4-reduzir-mortalidade-infantil.png' alt='{{ trans('global.ong_onu_cat-4') }}' title='{{ trans('global.ong_onu_cat-4') }}' class='col-sm-12'/>
					</label>
				</ul>
			</div>
		</div>
		<div class="row text-center">
			<div class="cat-ong" class="col-sm-12">
				<ul id="cat-ong-5" class="col-sm-3">
					<input type="radio" name="categoria-ong" value="categoria-ong-5" id="categoria-ong-5">
					<label for="categoria-ong-5">
						<img src='../img/categorias-onu/onu-cat-5-melhorar-saude-gestantes.png' alt='{{ trans('global.ong_onu_cat-5') }}' title='{{ trans('global.ong_onu_cat-5') }}' class='col-sm-12'/>
					</label>
				</ul>
				<ul id="cat-ong-6" class="col-sm-3">
					<input type="radio" name="categoria-ong" value="categoria-ong-6" id="categoria-ong-6">
					<label for="categoria-ong-6">
						<img src='../img/categorias-onu/onu-cat-6-combater-malaria-aids-e-outras-doencas.png' alt='{{ trans('global.ong_onu_cat-6') }}' title='{{ trans('global.ong_onu_cat-6') }}' class='col-sm-12'/>
					</label>
				</ul>
				<ul id="cat-ong-7" class="col-sm-3">
					<input type="radio" name="categoria-ong" value="categoria-ong-7" id="categoria-ong-7">
					<label for="categoria-ong-7">
						<img src='../img/categorias-onu/onu-cat-7-qualidade-vida-e-respeito-meio-ambiente.png' alt='{{ trans('global.ong_onu_cat-7') }}' title='{{ trans('global.ong_onu_cat-7') }}' class='col-sm-12'/>
					</label>
				</ul>
				<ul id="cat-ong-8" class="col-sm-3">
					<input type="radio" name="categoria-ong" value="categoria-ong-8" id="categoria-ong-8">
					<label for="categoria-ong-8">
						<img src='../img/categorias-onu/onu-cat-8-todo-mundo-trabalhando-pro-desenvolvimento.png' alt='{{ trans('global.ong_onu_cat-8') }}' title='{{ trans('global.ong_onu_cat-8') }}' class='col-sm-12'/>
					</label>
				</ul>
			</div>
		</div>
		<!-- <div class="col-sm-12">
	    <select name="categoria_ong_id">
	        <option value="null">Escolha uma categoria</option>
	    @forelse($categoriasOngs as $Categoria)
	        @if ($categoriaSelecionada == $Categoria->id)
	            <option value="{{ $Categoria->id }}" selected="selected">{{ $Categoria->nome }}</option>
	        @else
	            <option value="{{ $Categoria->id }}">{{ $Categoria->nome }}</option>
	        @endif
	    @empty
	        <option>Sem categorias</option>
	    @endforelse
	    </select>
		</div> -->
	</div>
	<!-- @endif -->

	<!-- Complemento - REDES SOCIAIS da ong -->
	<div id="ong-redes-sociais" class="form-group row margin-t-2">
		<h5 class="col-sm-12">{{ trans('global.ong_t_additional_social_networks') }}</h5>
		<div class="form-group ong-facebook col-sm-12">
			<div class="row">
 				<div class="col-sm-4 pretty-url-padd-r">
					{!! Form::label("url_facebook", trans('global.ong_facebook_URL_ph'), ['class' => 'col-sm-12 prettyurl-input pretty-url-no-border-r']) !!}
				</div>
	  		<div class="col-sm-8 pretty-url-padd-l">
					{!! Form::text("url_facebook", null, ['title' => trans('global.ong_facebook_URL'), 'placeholder' => trans('global.ong_name_prettyurl'), 'class' => 'form-control col-sm-12 pretty-url-no-border-l']) !!}
				</div>
			</div>
		</div>
	  <div class="form-group ong-gplus col-sm-12">
			<div class="row">
				<div class="col-sm-4 pretty-url-padd-r">
					{!! Form::label("url_gplus", trans('global.ong_googleplus_URL_ph'), ['class' => 'col-sm-12 prettyurl-input pretty-url-no-border-r']) !!}
				</div>
				<div class="col-sm-8 pretty-url-padd-l">
		    	{!! Form::text("url_gplus", null, ['title' => trans('global.ong_googleplus_URL'), 'placeholder' => trans('global.ong_name_prettyurl'), 'class' => 'form-control col-sm-12 pretty-url-no-border-l']) !!}
		  	</div>
			</div>
		</div>
    <div class="form-group ong-instagram col-sm-12">
			<div class="row">
				<div class="col-sm-4 pretty-url-padd-r">
					{!! Form::label("url_instagram", trans('global.ong_instagram_URL_ph'), ['class' => 'col-sm-12 prettyurl-input pretty-url-no-border-r']) !!}
				</div>
				<div class="col-sm-8 pretty-url-padd-l">
					{!! Form::text("url_instagram", null, ['title' => trans('global.ong_instagram_URL'), 'placeholder' => trans('global.ong_name_prettyurl'), 'class' => 'form-control col-sm-12 pretty-url-no-border-l',]) !!}
	    	</div>
			</div>
		</div>
    <div class="form-group ong-website col-sm-12">
        {!! Form::text("url_site",  null , ['title'=> trans('global.lbl_website'), 'placeholder' => trans('global.lbl_website'), 'class' => 'form-control col-sm-12']) !!}
		</div>
	</div>

	<!-- CONTATO da ong -->
	<div id="ong_contato" class="form-group row margin-t-2">
		<h5 class="col-sm-12">{{ trans('global.ong_t_contact') }}</h5>
		<div class="form-group col-sm-12">
				{!! Form::text("ong_manager",  null , ['title' => trans('global.ong_contact_manager'), 'placeholder' => trans('global.ong_contact_manager'), 'class' => 'form-control col-sm-6']) !!}
		</div>
		<div class="form-group col-sm-12">
				{!! Form::text("ong_telephone",  null , ['title' => trans('global.ong_contact_telephone'), 'placeholder' => trans('global.ong_contact_telephone'), 'class' => 'form-control col-sm-6']) !!}
		</div>
		<div class="form-group col-sm-12">
				{!! Form::text("ong_email",  null , ['title'=> trans('global.ong_contact_email'), 'placeholder' => trans('global.ong_contact_email'), 'class' => 'form-control col-sm-6']) !!}
		</div>
	</div>

	<!-- FOTO DE CAPA da ong -->
	<div id="ong_foto_capa" class="form-group row margin-t-2">
		<h5 class="col-sm-12">{{ trans('global.ong_t_cover_photo') }}</h5>
		<div class="col-sm-12">
			<!-- Inserção do upload de imagem -->
		</div>
	</div>

	<!-- Botão Enviar -->
	<div id="ong-btn-submit" class="form-group text-center">
		{!! Form::submit(trans('global.lbl_ong_register'), ['class' => 'btn btn-acao']) !!}
	</div>
</div>
