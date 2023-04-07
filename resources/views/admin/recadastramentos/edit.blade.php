@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Atualizar Recadastramento
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.recadastramentos.update", [$recadastramento->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="cemiterio_id">{{ trans('cruds.recadastramento.fields.cemiterio') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio') ? 'is-invalid' : '' }}" name="cemiterio_id" id="cemiterio_id">
                    @foreach($cemiterios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cemiterio_id') ? old('cemiterio_id') : $recadastramento->cemiterio->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.cemiterio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="setor_id">{{ trans('cruds.recadastramento.fields.setor') }}</label>
                <select class="form-control select2 {{ $errors->has('setor') ? 'is-invalid' : '' }}" name="setor_id" id="setor_id">
                    @foreach($setors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('setor_id') ? old('setor_id') : $recadastramento->setor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('setor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('setor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.setor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quadra_id">{{ trans('cruds.recadastramento.fields.quadra') }}</label>
                <select class="form-control select2 {{ $errors->has('quadra') ? 'is-invalid' : '' }}" name="quadra_id" id="quadra_id">
                    @foreach($quadras as $id => $entry)
                        <option value="{{ $id }}" {{ (old('quadra_id') ? old('quadra_id') : $recadastramento->quadra->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('quadra'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quadra') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.quadra_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lote_id">{{ trans('cruds.recadastramento.fields.lote') }}</label>
                <select class="form-control select2 {{ $errors->has('lote') ? 'is-invalid' : '' }}" name="lote_id" id="lote_id">
                    @foreach($lotes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('lote_id') ? old('lote_id') : $recadastramento->lote->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lote'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lote') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.lote_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nome_do_falecido">{{ trans('cruds.recadastramento.fields.nome_do_falecido') }}</label>
                <input class="form-control {{ $errors->has('nome_do_falecido') ? 'is-invalid' : '' }}" type="text" name="nome_do_falecido" id="nome_do_falecido" value="{{ old('nome_do_falecido', $recadastramento->nome_do_falecido) }}">
                @if($errors->has('nome_do_falecido'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome_do_falecido') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.nome_do_falecido_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_de_nascimento">{{ trans('cruds.recadastramento.fields.data_de_nascimento') }}</label>
                <input class="form-control date {{ $errors->has('data_de_nascimento') ? 'is-invalid' : '' }}" type="text" name="data_de_nascimento" id="data_de_nascimento" value="{{ old('data_de_nascimento', $recadastramento->data_de_nascimento) }}">
                @if($errors->has('data_de_nascimento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_de_nascimento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.data_de_nascimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_de_falecimento">{{ trans('cruds.recadastramento.fields.data_de_falecimento') }}</label>
                <input class="form-control date {{ $errors->has('data_de_falecimento') ? 'is-invalid' : '' }}" type="text" name="data_de_falecimento" id="data_de_falecimento" value="{{ old('data_de_falecimento', $recadastramento->data_de_falecimento) }}">
                @if($errors->has('data_de_falecimento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_de_falecimento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.data_de_falecimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_de_sepultamento">{{ trans('cruds.recadastramento.fields.data_de_sepultamento') }}</label>
                <input class="form-control date {{ $errors->has('data_de_sepultamento') ? 'is-invalid' : '' }}" type="text" name="data_de_sepultamento" id="data_de_sepultamento" value="{{ old('data_de_sepultamento', $recadastramento->data_de_sepultamento) }}">
                @if($errors->has('data_de_sepultamento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_de_sepultamento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.data_de_sepultamento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nome_da_mae">{{ trans('cruds.recadastramento.fields.nome_da_mae') }}</label>
                <input class="form-control {{ $errors->has('nome_da_mae') ? 'is-invalid' : '' }}" type="text" name="nome_da_mae" id="nome_da_mae" value="{{ old('nome_da_mae', $recadastramento->nome_da_mae) }}">
                @if($errors->has('nome_da_mae'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome_da_mae') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.nome_da_mae_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nome_do_pai">{{ trans('cruds.recadastramento.fields.nome_do_pai') }}</label>
                <input class="form-control {{ $errors->has('nome_do_pai') ? 'is-invalid' : '' }}" type="text" name="nome_do_pai" id="nome_do_pai" value="{{ old('nome_do_pai', $recadastramento->nome_do_pai) }}">
                @if($errors->has('nome_do_pai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome_do_pai') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.nome_do_pai_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.recadastramento.fields.sexo') }}</label>
                <select class="form-control {{ $errors->has('sexo') ? 'is-invalid' : '' }}" name="sexo" id="sexo">
                    <option value disabled {{ old('sexo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Recadastramento::SEXO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sexo', $recadastramento->sexo) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sexo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sexo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.sexo_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.recadastramento.fields.cor_raca') }}</label>
                <select class="form-control {{ $errors->has('cor_raca') ? 'is-invalid' : '' }}" name="cor_raca" id="cor_raca">
                    <option value disabled {{ old('cor_raca', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Recadastramento::COR_RACA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('cor_raca', $recadastramento->cor_raca) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('cor_raca'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cor_raca') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.cor_raca_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="certidao_de_obito">{{ trans('cruds.recadastramento.fields.certidao_de_obito') }}</label>
                <input class="form-control {{ $errors->has('certidao_de_obito') ? 'is-invalid' : '' }}" type="text" name="certidao_de_obito" id="certidao_de_obito" value="{{ old('certidao_de_obito', $recadastramento->certidao_de_obito) }}">
                @if($errors->has('certidao_de_obito'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certidao_de_obito') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.certidao_de_obito_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="causa_da_morte">{{ trans('cruds.recadastramento.fields.causa_da_morte') }}</label>
                <input class="form-control {{ $errors->has('causa_da_morte') ? 'is-invalid' : '' }}" type="text" name="causa_da_morte" id="causa_da_morte" value="{{ old('causa_da_morte', $recadastramento->causa_da_morte) }}">
                @if($errors->has('causa_da_morte'))
                    <div class="invalid-feedback">
                        {{ $errors->first('causa_da_morte') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.causa_da_morte_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="naturalidade">{{ trans('cruds.recadastramento.fields.naturalidade') }}</label>
                <input class="form-control {{ $errors->has('naturalidade') ? 'is-invalid' : '' }}" type="text" name="naturalidade" id="naturalidade" value="{{ old('naturalidade', $recadastramento->naturalidade) }}">
                @if($errors->has('naturalidade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('naturalidade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.naturalidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.recadastramento.fields.estado') }}</label>
                <select class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado" id="estado">
                    <option value disabled {{ old('estado', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Recadastramento::ESTADO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('estado', $recadastramento->estado) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cidade">{{ trans('cruds.recadastramento.fields.cidade') }}</label>
                <input class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}" type="text" name="cidade" id="cidade" value="{{ old('cidade', $recadastramento->cidade) }}">
                @if($errors->has('cidade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cidade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.cidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bairro">{{ trans('cruds.recadastramento.fields.bairro') }}</label>
                <input class="form-control {{ $errors->has('bairro') ? 'is-invalid' : '' }}" type="text" name="bairro" id="bairro" value="{{ old('bairro', $recadastramento->bairro) }}">
                @if($errors->has('bairro'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bairro') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.bairro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rua">{{ trans('cruds.recadastramento.fields.rua') }}</label>
                <input class="form-control {{ $errors->has('rua') ? 'is-invalid' : '' }}" type="text" name="rua" id="rua" value="{{ old('rua', $recadastramento->rua) }}">
                @if($errors->has('rua'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rua') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.rua_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero">{{ trans('cruds.recadastramento.fields.numero') }}</label>
                <input class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" type="text" name="numero" id="numero" value="{{ old('numero', $recadastramento->numero) }}">
                @if($errors->has('numero'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.numero_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="anexos">{{ trans('cruds.recadastramento.fields.anexos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('anexos') ? 'is-invalid' : '' }}" id="anexos-dropzone">
                </div>
                @if($errors->has('anexos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('anexos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.anexos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observacoes">{{ trans('cruds.recadastramento.fields.observacoes') }}</label>
                <textarea class="form-control {{ $errors->has('observacoes') ? 'is-invalid' : '' }}" name="observacoes" id="observacoes">{{ old('observacoes', $recadastramento->observacoes) }}</textarea>
                @if($errors->has('observacoes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observacoes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.recadastramento.fields.observacoes_helper') }}</span>
            </div>
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
             url: '/admin/cemiterio-setor/'+cemiterioID,
             type: "GET",
             data : {"_token":"{{ csrf_token() }}"},
             dataType: "json",
             success:function(data)
             {
               if(data){
                  $('#setor_id').empty();
                  $('#setor_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, setor){
                      $('select[name="setor_id"]').append('<option value="'+ setor.id +'">' + setor.indentificacao + '</option>');
                  });
              }else{
                  $('#setor_id').empty();
                  $('#setor_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#setor_id').empty();
       $('#setor_id').append('<option value> Selecione um cemitério </option>');
     }
  });
  });
</script>

<script>
  $(document).ready(function() {
  $('#setor_id').on('change', function() {
     var setorID = $(this).val();
     if(setorID) {
         $.ajax({
             url: '/admin/setor-quadra/'+setorID,
             type: "GET",
             data : {"_token":"{{ csrf_token() }}"},
             dataType: "json",
             success:function(data)
             {
               if(data){
                  $('#quadra_id').empty();
                  $('#quadra_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, quadra){
                      $('select[name="quadra_id"]').append('<option value="'+ quadra.id +'">' + quadra.indentificacao + '</option>');
                  });
              }else{
                  $('#quadra_id').empty();
                  $('#quadra_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#quadra_id').empty();
       $('#quadra_id').append('<option value> Selecione um setor </option>');
     }
  });
  });
</script>

<script>
  $(document).ready(function() {
  $('#quadra_id').on('change', function() {
     var quadraID = $(this).val();
     if(quadraID) {
         $.ajax({
             url: '/admin/quadra-lote/'+quadraID,
             type: "GET",
             data : {"_token":"{{ csrf_token() }}"},
             dataType: "json",
             success:function(data)
             {
               if(data){
                  $('#lote_id').empty();
                  $('#lote_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, lote){
                      $('select[name="lote_id"]').append('<option value="'+ lote.id +'">' + lote.indentificacao + '</option>');
                  });
              }else{
                  $('#lote_id').empty();
                  $('#lote_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#lote_id').empty();
       $('#lote_id').append('<option value> Selecione uma quadra </option>');
     }
  });
  });
</script>

<script>
    var uploadedAnexosMap = {}
Dropzone.options.anexosDropzone = {
    url: '{{ route('admin.recadastramentos.storeMedia') }}',
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
@if(isset($recadastramento) && $recadastramento->anexos)
          var files =
            {!! json_encode($recadastramento->anexos) !!}
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
