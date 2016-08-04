<div class="col-xs-12 fundo-cinza-com-borda padding-t-1">
    {{-- Secao de trocar foto do Projeto/Empresa responsavel --}}
    <div class="col-sm-12 margin-t-1 margin-b-1">
        {{-- Aqui insiro o input hidden que guardará o id da foto associada ao owner da experiencia --}}
        {!!
            Form::hidden('owner-experiencia-foto-id',
                isset($experiencia) ? ($experiencia->fotoOwner ?  $experiencia->fotoOwner->id : '') : '',
                ['id' => 'owner-experiencia-foto-id'])
        !!}

        {{-- Aqui insiro o input hidden que guardará o path da foto associada ao owner da experiencia (para caso erre o form) --}}
        {!!
            Form::hidden('owner-experiencia-foto-path',
                isset($experiencia) ? ($experiencia->fotoOwner ?  $experiencia->fotoOwner->path : '') : '',
                ['id' => 'owner-experiencia-foto-path'])
        !!}

        {{-- Incluindo o conjunto (foto / botao troca foto), que dispara a modal contendo o form de trocar foto por ajax --}}
        @include('experiencias._owner_fotoform')
    </div>

    {{-- Secao de selecao da ong/projeto da experiencia --}}
    <div class="col-sm-12 margin-t-1 margin-b-1">
        <div class="row">
          {!! Form::label('projeto', 'Projeto Responsável', ['class' => 'col-lg-9']) !!}
          <div class="col-lg-3 text-right">
            <span>* Obrigatório</span>
            <span> <abbr title="Esse é o campo que identifica o projeto responsável por esta experiência na plataforma."><i class='fa fa-2x fa-question-circle-o'></i></abbr></span>
          </div>
        </div>
        {!! Form::select('projeto', $ongs, (isset($experiencia) ? $experiencia->owner->id : []), ['id' => 'ong_select', 'class' => 'form-control']) !!}
    </div>

    {{-- Secao de insercao do nome do projeto/empresa responsavel --}}
    <div class="col-sm-12 margin-t-1 margin-b-1">
      <div class="row">
        {!! Form::label('owner_nome', 'Nome da Empresa/Instituição Responsável', ['class' => 'col-lg-9']) !!}
        <div class="col-lg-3 text-right">
          <span>* Obrigatório</span>
          <span> <abbr title="Nome da Empresa/Instituição que está promovendo a experiência."><i class='fa fa-2x fa-question-circle-o'></i></abbr></span>
        </div>
      </div>
        {!! Form::text('owner_nome', null, ['placeholder' => 'Ex: Vivalá', 'class' => 'form-control']) !!}
    </div>

    {{-- Secao de insercao da descricao do projeto/empresa responsavel (enviada no email) --}}
    <div class="col-sm-12 margin-t-1 margin-b-1">
      <div class="row">
        {!! Form::label('owner_descricao', 'Descrição da Empresa/Instituição responsável', ['class' => 'col-lg-9']) !!}
        <div class="col-lg-3 text-right">
          <span>* Obrigatório</span>
          <span> <abbr title="Descrição da Empresa/Instituição responsável que está promovendo a experiência."><i class='fa fa-2x fa-question-circle-o'></i></abbr></span>
        </div>
      </div>
      {!! Form::textarea("owner_descricao", null, ['id'=>'descricao-instituicao', 'placeholder'=> 'Ex: A Vivalá é uma plataforma global que conecta pessoas que têm interesse em viajar e transformar o Brasil. [...]', 'class' => 'form-control sem-resize sem-upper', 'rows' => 2]) !!}
    </div>

    {{-- Secao de trocar foto da experiencia --}}
    <div class="col-sm-12 margin-t-1 margin-b-1">
        {{-- Aqui insiro o input hidden que guardará o id da foto associada á experiencia --}}
        {!!
            Form::hidden('experiencia-foto-id',
               isset($experiencia) ? ($experiencia->fotoCapa ?  $experiencia->fotoCapa->id : '') : '',
               ['id' => 'experiencia-foto-id'])
        !!}

        {{-- Aqui insiro o input hidden que guardará o path da foto associada á experiencia --}}
        {!!
            Form::hidden('experiencia-foto-path',
               isset($experiencia) ? ($experiencia->fotoCapa ?  $experiencia->fotoCapa->path : '') : '',
               ['path' => 'experiencia-foto-path'])
        !!}

        {{-- Incluindo o conjunto (foto / botao troca foto), que dispara a modal contendo o form de trocar foto por ajax --}}
        @include('experiencias._fotoform')
    </div>


    {{-- Secao de seleção do local da experiencia --}}
    <div class="col-sm-12 margin-t-1 margin-b-1">
      <div class="row">
        {!! Form::label('campo-autocomplete-cidades', 'Cidade', ['class' => 'col-lg-9']) !!}
        <div class="col-lg-3 text-right">
          <span>* Obrigatório</span>
          <span> <abbr title="Cidade onde a experiência será realizada."><i class='fa fa-2x fa-question-circle-o'></i></abbr></span>
        </div>
      </div>
      <input id="campo-autocomplete-cidades" autocomplete="off" class="form-control autocomplete-cidades-ativo" type="text" placeholder="Ex: São Paulo" value="{{ isset($experiencia) ? $experiencia->local->nome : "" }}"/>
      <input id="campo-autocomplete-cidades-hidden" name="cidade" autocomplete="off" type="hidden" value="{{ isset($experiencia) ? $experiencia->local->id : "" }}">
      <i class="fa fa-spin fa-spinner loading-search soft-hide laranja"></i>
    </div>

    <div class="col-sm-12 margin-t-1 margin-b-1">
      <div class="row">
        {!! Form::label('endereco_completo', 'Endereço Completo', ['class' => 'col-lg-9']) !!}
        <div class="col-lg-3 text-right">
          <span>* Obrigatório</span>
          <span> <abbr title="Endereço onde a experiência será realizada."><i class='fa fa-2x fa-question-circle-o'></i></abbr></span>
        </div>
      </div>
        {!! Form::text('endereco_completo', null, ['placeholder' => 'Ex: Rua do Rócio, 52, CJ 122, Vila Olímpia, São Paulo - SP', 'class' => 'form-control']) !!}
    </div>

    {{-- Secao de campos texto da experiencia --}}
    <div class="col-sm-12 margin-t-1 margin-b-1">
      <div class="row">
        {!! Form::label('descricao_na_listagem', 'Descrição na Listagem (máx: 85 caracteres)', ['class' => 'col-lg-9']) !!}
        <div class="col-lg-3 text-right">
          <span>* Obrigatório</span>
          <span> <abbr title="Descrição na listagem."><i class='fa fa-2x fa-question-circle-o'></i></abbr></span>
        </div>
      </div>
      {!! Form::textarea("descricao_na_listagem", null, ['id'=>'experiencia-descricao-listagem', 'rows' => 3, 'maxlength' => 85, 'title'=> 'Descrição na Listagem', 'placeholder'=> 'Descrição na listagem', 'onkeyup' => 'contadorDescListagem(event)', 'onchange' => 'contadorDescListagem(event)', 'class' => 'form-control sem-resize sem-upper']) !!}
      <div class="row margin-t-0-5 margin-r-0 text-right">
        <span id="experiencia-contador-descricao-listagem"></span>
      </div>
    </div>

    <div class="col-sm-12 margin-t-1 margin-b-1">
      <div class="row">
        {!! Form::label('descricao', 'Descrição Completa (máx: 420 caracteres)', ['class' => 'col-lg-9']) !!}
        <div class="col-lg-3 text-right">
          <span>* Obrigatório</span>
          <span> <abbr title="Descrição completa."><i class='fa fa-2x fa-question-circle-o'></i></abbr></span>
        </div>
      </div>
      {!! Form::textarea('descricao', null, ['id'=>'experiencia-descricao-cheia', 'rows' => 3, 'maxlength' => 420, 'title'=> 'Descrição', 'placeholder'=> 'Descrição', 'onkeyup' => 'contadorDescCheia(event)', 'onchange' => 'contadorDescCheia(event)', 'class' => 'form-control sem-resize sem-upper']) !!}
      <div class="row margin-t-0-5 margin-r-0 text-right">
        <span id="experiencia-contador-descricao-cheia"></span>
      </div>
    </div>

    <div class="col-sm-12 margin-t-1 margin-b-1">
        {!! Form::label('detalhes', 'Detalhes da Experiência', ['class' => 'row col-sm-12']) !!}
        {!! Form::textarea('detalhes', null, ['id'=>'detalhes', 'title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize sem-upper', 'rows' => 3]) !!}
    </div>
    <div class="col-sm-12 margin-t-1 margin-b-1">
      <div class="row">
        {!! Form::label('preco', 'Preço (em R$)', ['class' => 'col-lg-9']) !!}
        <div class="col-lg-3 text-right">
          <span>* Obrigatório</span>
          <span> <abbr title="Preço/Valor da experiência que será realizada."><i class='fa fa-2x fa-question-circle-o'></i></abbr></span>
        </div>
      </div>
        {!! Form::text('preco', null, ['id' => 'experiencia-valor', 'placeholder' => 'Ex: 24.99', 'class' => 'form-control']) !!}
    </div>


    {{-- Secao de informacoes extras da experiencia --}}
    <div class="col-sm-12 margin-t-1 margin-b-1">
        {!! Html::decode(Form::label('', 'Informações Extras  (<a class="laranja" target="_blank" href="http://fontawesome.io/icons/">Lista de Ícones</a>)', ['class' => 'row col-sm-12'])) !!}
        <ul id="informacoes-container">
            @if (isset($experiencia))
            @foreach ($experiencia->informacoes as $informacao)
                @include('experiencias._form_extra_item', ['informacao' => $informacao])
            @endforeach
            @endif

            {{-- Botao de adicionar novas Informacoes --}}
            <li class="col-xs-12 margin-b-1 container-campos-fontawesome">
                <div class="col-xs-11"></div>
                <div class="col-xs-1 text-center">
                        <a href="#" onclick="adicionaInfoExperiencia(event)">
                            <i class="fa fa-2x fa-plus margin-t-1" ></i>
                            <i class="fa fa-2x fa-spin margin-t-1 fa-spinner loading-icon soft-hide laranja"></i>
                        </a>
                </div>
            </li>

        </ul>
    </div>

    <div class="col-sm-12 margin-t-1 margin-b-1">
      <div class="row">
        {!! Form::label('tipo', 'Tipo da Experiencia', ['class' => 'col-lg-9']) !!}
        <div class="col-lg-3 text-right">
          <span>* Obrigatório</span>
          <span> <abbr title="Tipo da Experiencia baseado em sua frequencia"><i class='fa fa-2x fa-question-circle-o'></i></abbr></span>
        </div>
      </div>
        <span> {!! Form::radio("tipo","evento_unico", false, ["id" => "tipo-evento-unico"]) !!}  Evento unico &nbsp;</span>
        <span> {!! Form::radio("tipo","evento_recorrente", false, ["id" => "tipo-evento-recorrente"]) !!}  Evento recorrente &nbsp;</span>
        <span> {!! Form::radio("tipo","evento_servico", false, ["id" => "tipo-evento-servico"]) !!}  Evento recorrente (serviço) &nbsp;</span>
    </div>

    <div class="col-sm-12 margin-t-1 margin-b-1">
      <div class="row">
        {!! Form::label('frequencia', 'Frequencia da experiencia', ['class' => 'col-lg-9']) !!}
        <div class="col-lg-3 text-right">
          <span>* Obrigatório</span>
          <span> <abbr title="Texto que aparecerá na secao Data nos detalhes da experiencia"><i class='fa fa-2x fa-question-circle-o'></i></abbr></span>
        </div>
      </div>
        <div class="col-xs-1">
            <i class="fa-2x fa fa-clock-o"> </i>
        </div>
        <div class="col-xs-3">
        {!! Form::text('frequencia', null, ['id' => 'experiencia-frequencia', 'placeholder' => 'Ex: Segunda á Sexta', 'class' => 'form-control']) !!}
        </div>

    </div>

    {{-- Secao das datas que irao ocorrer a experiencia --}}
    <div class="col-sm-12 margin-t-1 margin-b-1">
        {!! Form::label('', 'Próximas Datas', ['class' => 'row col-sm-12']) !!}
        <ul id="data-ocorrencia-container">
            @if (isset($experiencia))
            @foreach ($experiencia->ocorrencias as $dataOcorrencia)
                @include('experiencias._form_data_ocorrencia', ['dataOcorrencia' => $dataOcorrencia])
            @endforeach
            @endif

            {{-- Botao de adicionar novas datas --}}
            <li class="col-xs-12 margin-b-1 container-datas-ocorrencia">
                <div class="col-xs-11"></div>
                <div class="col-xs-1 text-center">
                        <a href="#" onclick="adicionaDataOcorrenciaExperiencia(event)">
                            <i class="fa fa-2x fa-plus margin-t-1" ></i>
                            <i class="fa fa-2x fa-spin margin-t-1 fa-spinner loading-icon soft-hide laranja"></i>
                        </a>
                </div>
            </li>

        </ul>
    </div>

    {{-- Secao de categorias da experiencia --}}
    <div class="col-sm-12 margin-t-1 margin-b-1">
        <label class="row col-xs-12">Categorias</label>
        @foreach ($Categorias as $categoria)
            <label class="col-xs-3">
                <input type="checkbox" name="categoria[]"
                    value="{{ $categoria->id }}"
                    @if (isset($experiencia) && !$experiencia->categorias->isEmpty() && $experiencia->categorias->find($categoria->id) )
                        checked="true"
                    @endif
                    ><span> {{ $categoria->nome }}</span>
            </label>
        @endforeach
    </div>

    <div class="col-sm-12 margin-b-1 margin-t-1 text-right">
        {!! Form::submit($textBtnSubmit, ['class' => 'btn btn-acao']) !!}
    </div>

</div>
