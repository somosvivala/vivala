<li class="container-datas-ocorrencia col-xs-12 margin-b-1" data-id="{{ $dataOcorrencia->id }}">
        <input type="hidden" name="datas-ocorrencia[{{ $dataOcorrencia->id }}][id]" value="{{ $dataOcorrencia->id }}">
        <div class="col-xs-3">
            {!! Form::label('', '&nbsp;', ['class' => 'row col-sm-12']) !!}
            <input data-provide="datepicker" data-date-today-highlight="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" data-date-format="dd/mm/yyyy" data-date-autoclose="true" name="datas-ocorrencia[{{ $dataOcorrencia->id }}][data]" class="form-control mascara-data data-ocorrencia" type="text" value="{{ $dataOcorrencia->data }}" data-date-start-date="0d">
        </div>
        <div class="col-xs-1 text-center">
                <a href="#" class="remover-data-ocorrencia" onclick="removeDataOcorrenciaExperiencia(event)">
                    <i class="fa fa-2x fa-close margin-t-1"></i>
                    <i class="fa fa-2x fa-spin margin-t-1 fa-spinner loading-icon soft-hide laranja"></i>
                </a>
        </div>
</li>
