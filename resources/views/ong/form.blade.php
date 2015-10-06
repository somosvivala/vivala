<!-- DADOS BASE da ong -->
<div id="ong-dados-base" class="row">
	<!-- Título -->
	<div class="col-sm-12">
		<h5 class="col-sm-6">{{ trans('global.ong_t_register_data') }}</h5>
	</div>
	<!-- Nome -->
  <div class="form-group col-sm-12">
    {!! Form::text("nome", null, ['title' => trans('global.ong_name'), 'placeholder' => trans('global.lbl_name'), 'class' => 'form-control']) !!}
  </div>
	<!-- PrettyURL -->
  <div class="form-group col-sm-12">
  	{!! Form::text("url", null, ['title' => trans('global.ong_pretty_URL'), 'placeholder' => trans('global.ong_pretty_URL_ph'), 'class' => 'form-control']) !!}
  </div>
	<!-- Sobre -->
  <div class="form-group col-sm-12">
		{!! Form::textarea("descricao", null, ['title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control' ]) !!}
  </div>
	<!-- Horários de Funcionamento -->
	<div class="form-group col-sm-12">
		{!! Form::text("horario_funcionamento", null, ['title'=> ('global.date_time_and_date'), 'aria-label'=> trans('global.date_time_and_date'), 'placeholder'=> trans('global.date_time_and_date'), 'class'=> 'form-control' ]) !!}
	</div>
</div>

<!-- ENDEREÇO da ong -->
<div id="ong-dados-endereco" class="row">
		<div class="col-sm-12 row">
			<div class="form-group col-sm-6">
				{!! Form::text("cep", null, ['placeholder' => trans('global.address_zipcode'), 'class' => 'form-control']) !!}
			</div>
	    <div class="form-group col-sm-6">
      	{!! Form::text("logradouro",  null , ['placeholder' => trans('global.address_street'), 'class' => 'form-control']) !!}
	    </div>
		</div>
		<div class="col-sm-12 row">
			<div class="form-group col-sm-6">
				{!! Form::text("complemento", null, ['placeholder' => trans('global.address_additional'), 'class' => 'form-control']) !!}
			</div>
	    <div class="form-group col-sm-6">
        {!! Form::text("bairro",  null , ['placeholder' => trans('global.address_district'), 'class' => 'form-control']) !!}
	    </div>

		</div>
		<div class="col-sm-12 row">
	    <div class="form-group col-sm-6">
	            {!! Form::text("estado", null, ['placeholder' => trans('global.address_state'), 'class' => 'form-control']) !!}
	    </div>
	    <div class="form-group col-sm-6">
	            {!! Form::text("cidade", null, ['placeholder' => trans('global.address_city'), 'class' => 'form-control']) !!}
	    </div>
		</div>
</div>

<!-- CATEGORIAS da ong -->
@if(isset($categoriasOngs))
<div id="ong-categorias" class="form-group row margin-t-2">
	<div class="col-sm-12">
		<h5 class="col-sm-6">{{ trans('global.ong_t_onu_categories') }}</h5>
	</div>
	<div class="col-sm-12">
		<div class="col-sm-12">
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
		</div>
	</div>
</div>
@endif

<!-- Complemento - REDES SOCIAIS da ong -->
<div id="ong-redes-sociais" class="form-group row margin-t-2">
	<div class="col-sm-12">
		<h5 class="col-sm-6">{{ trans('global.ong_t_additional_social_networks') }}</h5>
	</div>
	<div class="col-sm-12">
		<div class="form-group col-sm-6">
	    {!! Form::text("url_facebook", null, ['class' => 'form-control', 'placeholder' => trans('global.ong_fb_URL_ph')]) !!}
		</div>
	</div>
	<div class="col-sm-12">
	  <div class="form-group col-sm-6">
	    {!! Form::text("url_gplus", null, ['class' => 'form-control', 'placeholder' => trans('global.ong_gplus_URL_ph')]) !!}
	  </div>
	</div>
	<div class="col-sm-12">
    <div class="form-group col-sm-6">
        {!! Form::text("url_instagram", null, ['class' => 'form-control', 'placeholder' => trans('global.ong_instagram_URL_ph')]) !!}
    </div>
	</div>
	<div class="col-sm-12">
    <div class="form-group col-sm-6">
        {!! Form::text("url_site",  null , ['class' => 'form-control', 'placeholder' => trans('global.lbl_website')]) !!}
    </div>
	</div>
</div>

<!-- CONTATO da ong -->
<div id="ong_contato" class="form-group row margin-t-2">
	<div class="col-sm-12">
		<h5 class="col-sm-6">{{ trans('global.ong_t_contact') }}</h5>
	</div>
	<div class="col-sm-12">
		<div class="form-group col-sm-6">
				{!! Form::text("url_site",  null , ['class' => 'form-control', 'placeholder' => trans('global.ong_contact_manager')]) !!}
		</div>
	</div>
	<div class="col-sm-12">
		<div class="form-group col-sm-6">
				{!! Form::text("url_site",  null , ['class' => 'form-control', 'placeholder' => trans('global.ong_contact_telephone')]) !!}
		</div>
	</div>
	<div class="col-sm-12">
		<div class="form-group col-sm-6">
				{!! Form::text("url_site",  null , ['class' => 'form-control', 'placeholder' => trans('global.ong_contact_email')]) !!}
		</div>
	</div>
</div>

<!-- FOTO DE CAPA da ong -->
<div id="ong_foto_capa" class="form-group row margin-t-2">
	<div class="col-sm-12">
		<h5 class="col-sm-6">{{ trans('global.ong_t_cover_photo') }}</h5>
	</div>
	<div class="col-sm-12">
		<!-- Inserção do upload de imagem -->
	</div>
</div>

<!-- Botão Enviar -->
<div id="ong-btn-submit" class="form-group text-center">
	{!! Form::submit(trans('global.lbl_ong_register'), ['class' => 'btn btn-acao']) !!}
</div>
