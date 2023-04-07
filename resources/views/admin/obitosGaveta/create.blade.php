@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Cadastrar Óbito em Gaveta
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.obitos-gavetas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="responsavel_id">{{ trans('cruds.obitosGaveta.fields.responsavel') }}</label>
                <select class="form-control select2 {{ $errors->has('responsavel') ? 'is-invalid' : '' }}" name="responsavel_id" id="responsavel_id">
                    @foreach($responsaveis as $id => $entry)
                        <option value="{{ $id }}" {{ old('responsavel_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('responsavel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('responsavel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.responsavel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cemiterio_id">{{ trans('cruds.obitosGaveta.fields.cemiterio') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio') ? 'is-invalid' : '' }}" name="cemiterio_id" id="cemiterio_id">
                    @foreach($cemiterios as $id => $entry)
                        <option value="{{ $id }}" {{ old('cemiterio_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.cemiterio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ossuario_id">{{ trans('cruds.obitosGaveta.fields.ossuario') }}</label>
                <select class="form-control select2 {{ $errors->has('ossuario') ? 'is-invalid' : '' }}" name="ossuario_id" id="ossuario_id">
                    <option value> Selecione um cemitério </option>
                </select>
                @if($errors->has('ossuario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ossuario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.ossuario_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gaveta_id">{{ trans('cruds.obitosGaveta.fields.gaveta') }}</label>
                <select class="form-control select2 {{ $errors->has('gaveta') ? 'is-invalid' : '' }}" name="gaveta_id" id="gaveta_id">
                    <option value> Selecione um ossuário </option>
                </select>
                @if($errors->has('gaveta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gaveta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.gaveta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero_dam">{{ trans('cruds.obitosGaveta.fields.numero_dam') }}</label>
                <input class="form-control {{ $errors->has('numero_dam') ? 'is-invalid' : '' }}" type="text" name="numero_dam" id="numero_dam" value="{{ old('numero_dam', '') }}">
                @if($errors->has('numero_dam'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero_dam') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.numero_dam_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ano_dam">{{ trans('cruds.obitosGaveta.fields.ano_dam') }}</label>
                <input class="form-control {{ $errors->has('ano_dam') ? 'is-invalid' : '' }}" type="text" name="ano_dam" id="ano_dam" value="{{ old('ano_dam', '') }}">
                @if($errors->has('ano_dam'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ano_dam') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.ano_dam_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nome_do_falecido">{{ trans('cruds.obitosGaveta.fields.nome_do_falecido') }}</label>
                <input class="form-control {{ $errors->has('nome_do_falecido') ? 'is-invalid' : '' }}" type="text" name="nome_do_falecido" id="nome_do_falecido" value="{{ old('nome_do_falecido', '') }}">
                @if($errors->has('nome_do_falecido'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome_do_falecido') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.nome_do_falecido_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_de_nascimento">{{ trans('cruds.obitosGaveta.fields.data_de_nascimento') }}</label>
                <input class="form-control date {{ $errors->has('data_de_nascimento') ? 'is-invalid' : '' }}" type="text" name="data_de_nascimento" id="data_de_nascimento" value="{{ old('data_de_nascimento') }}">
                @if($errors->has('data_de_nascimento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_de_nascimento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.data_de_nascimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_de_falecimento">{{ trans('cruds.obitosGaveta.fields.data_de_falecimento') }}</label>
                <input class="form-control date {{ $errors->has('data_de_falecimento') ? 'is-invalid' : '' }}" type="text" name="data_de_falecimento" id="data_de_falecimento" value="{{ old('data_de_falecimento') }}">
                @if($errors->has('data_de_falecimento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_de_falecimento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.data_de_falecimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_de_sepultamento">{{ trans('cruds.obitosGaveta.fields.data_de_sepultamento') }}</label>
                <input class="form-control date {{ $errors->has('data_de_sepultamento') ? 'is-invalid' : '' }}" type="text" name="data_de_sepultamento" id="data_de_sepultamento" value="{{ old('data_de_sepultamento') }}">
                @if($errors->has('data_de_sepultamento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_de_sepultamento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.data_de_sepultamento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nome_da_mae">{{ trans('cruds.obitosGaveta.fields.nome_da_mae') }}</label>
                <input class="form-control {{ $errors->has('nome_da_mae') ? 'is-invalid' : '' }}" type="text" name="nome_da_mae" id="nome_da_mae" value="{{ old('nome_da_mae', '') }}">
                @if($errors->has('nome_da_mae'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome_da_mae') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.nome_da_mae_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nome_do_pai">{{ trans('cruds.obitosGaveta.fields.nome_do_pai') }}</label>
                <input class="form-control {{ $errors->has('nome_do_pai') ? 'is-invalid' : '' }}" type="text" name="nome_do_pai" id="nome_do_pai" value="{{ old('nome_do_pai', '') }}">
                @if($errors->has('nome_do_pai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome_do_pai') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.nome_do_pai_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.obitosGaveta.fields.sexo') }}</label>
                <select class="form-control {{ $errors->has('sexo') ? 'is-invalid' : '' }}" name="sexo" id="sexo">
                    <option value disabled {{ old('sexo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ObitosGaveta::SEXO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sexo', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sexo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sexo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.sexo_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.obitosGaveta.fields.cor_raca') }}</label>
                <select class="form-control {{ $errors->has('cor_raca') ? 'is-invalid' : '' }}" name="cor_raca" id="cor_raca">
                    <option value disabled {{ old('cor_raca', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ObitosGaveta::COR_RACA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('cor_raca', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('cor_raca'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cor_raca') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.cor_raca_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="certidao_de_obito">{{ trans('cruds.obitosGaveta.fields.certidao_de_obito') }}</label>
                <input class="form-control {{ $errors->has('certidao_de_obito') ? 'is-invalid' : '' }}" type="text" name="certidao_de_obito" id="certidao_de_obito" value="{{ old('certidao_de_obito', '') }}">
                @if($errors->has('certidao_de_obito'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certidao_de_obito') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.certidao_de_obito_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="causa_da_morte">{{ trans('cruds.obitosGaveta.fields.causa_da_morte') }}</label>
                <input class="form-control {{ $errors->has('causa_da_morte') ? 'is-invalid' : '' }}" type="text" name="causa_da_morte" id="causa_da_morte" value="{{ old('causa_da_morte', '') }}">
                @if($errors->has('causa_da_morte'))
                    <div class="invalid-feedback">
                        {{ $errors->first('causa_da_morte') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.causa_da_morte_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="naturalidade">{{ trans('cruds.obitosGaveta.fields.naturalidade') }}</label>
                <input class="form-control {{ $errors->has('naturalidade') ? 'is-invalid' : '' }}" type="text" name="naturalidade" id="naturalidade" value="{{ old('naturalidade', '') }}">
                @if($errors->has('naturalidade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('naturalidade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.naturalidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.obitosGaveta.fields.estado') }}</label>
                <select class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado" id="estado">
                    <option value disabled {{ old('estado', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ObitosGaveta::ESTADO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('estado', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cidade">{{ trans('cruds.obitosGaveta.fields.cidade') }}</label>
                <input class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}" type="text" name="cidade" id="cidade" value="{{ old('cidade', '') }}">
                @if($errors->has('cidade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cidade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.cidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bairro">{{ trans('cruds.obitosGaveta.fields.bairro') }}</label>
                <input class="form-control {{ $errors->has('bairro') ? 'is-invalid' : '' }}" type="text" name="bairro" id="bairro" value="{{ old('bairro', '') }}">
                @if($errors->has('bairro'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bairro') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.bairro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rua">{{ trans('cruds.obitosGaveta.fields.rua') }}</label>
                <input class="form-control {{ $errors->has('rua') ? 'is-invalid' : '' }}" type="text" name="rua" id="rua" value="{{ old('rua', '') }}">
                @if($errors->has('rua'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rua') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.rua_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero">{{ trans('cruds.obitosGaveta.fields.numero') }}</label>
                <input class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" type="text" name="numero" id="numero" value="{{ old('numero', '') }}">
                @if($errors->has('numero'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.numero_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="anexos">{{ trans('cruds.obitosGaveta.fields.anexos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('anexos') ? 'is-invalid' : '' }}" id="anexos-dropzone">
                </div>
                @if($errors->has('anexos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('anexos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.anexos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observacoes">{{ trans('cruds.obitosGaveta.fields.observacoes') }}</label>
                <textarea class="form-control {{ $errors->has('observacoes') ? 'is-invalid' : '' }}" name="observacoes" id="observacoes">{{ old('observacoes') }}</textarea>
                @if($errors->has('observacoes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observacoes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.obitosGaveta.fields.observacoes_helper') }}</span>
            </div>
            <input type="hidden" class="assinatura_id" value="{{Auth::user()->id}}" for="assinatura_id" name="assinatura_id">
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
@parent

<script>
  $(document).ready(function() {
  $('#cemiterio_id').on('change', function() {
     var cemiterioID = $(this).val();
     if(cemiterioID) {
         $.ajax({
             url: '/admin/cemiterio-ossuario/'+cemiterioID,
             type: "GET",
             data : {"_token":"{{ csrf_token() }}"},
             dataType: "json",
             success:function(data)
             {
               if(data){
                  $('#ossuario_id').empty();
                  $('#ossuario_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, ossuario){
                      $('select[name="ossuario_id"]').append('<option value="'+ ossuario.id +'">' + ossuario.indentificacao + '</option>');
                  });
              }else{
                  $('#ossuario_id').empty();
                  $('#ossuario_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#ossuario_id').empty();
       $('#ossuario_id').append('<option value> Selecione um cemitério </option>');
     }
  });
  });
</script>

<script>
  $(document).ready(function() {
  $('#ossuario_id').on('change', function() {
     var gavetaID = $(this).val();
     if(gavetaID) {
         $.ajax({
             url: '/admin/ossuario-gaveta/'+gavetaID,
             type: "GET",
             data : {"_token":"{{ csrf_token() }}"},
             dataType: "json",
             success:function(data)
             {
               if(data){
                  $('#gaveta_id').empty();
                  $('#gaveta_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, gaveta){
                      $('select[name="gaveta_id"]').append('<option value="'+ gaveta.id +'">' + gaveta.indentificacao + '</option>');
                  });
              }else{
                  $('#gaveta_id').empty();
                  $('#gaveta_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#gaveta_id').empty();
       $('#gaveta_id').append('<option value> Selecione um ossuário </option>');
     }
  });
  });
</script>

<script>
    var uploadedAnexosMap = {}
Dropzone.options.anexosDropzone = {
    url: '{{ route('admin.obitos-gavetas.storeMedia') }}',
    maxFilesize: 5, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="anexos[]" value="' + response.name + '">')
      uploadedAnexosMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAnexosMap[file.name]
      }
      $('form').find('input[name="anexos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($obitosGaveta) && $obitosGaveta->anexos)
          var files =
            {!! json_encode($obitosGaveta->anexos) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="anexos[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection
