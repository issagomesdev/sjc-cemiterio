@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Cadastrar Gaveta
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.gaveta.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="cemiterio_id">{{ trans('cruds.gavetum.fields.cemiterio') }}</label>
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
                <span class="help-block">{{ trans('cruds.gavetum.fields.cemiterio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ossuario_id">{{ trans('cruds.gavetum.fields.ossuario') }}</label>
                <select class="form-control select2 {{ $errors->has('ossuario') ? 'is-invalid' : '' }}" name="ossuario_id" id="ossuario_id">
                    <option value> Selecione um cemitério </option>
                </select>
                @if($errors->has('ossuario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ossuario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gavetum.fields.ossuario_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="indentificacao">{{ trans('cruds.gavetum.fields.indentificacao') }}</label>
                <input class="form-control {{ $errors->has('indentificacao') ? 'is-invalid' : '' }}" type="text" name="indentificacao" id="indentificacao" value="{{ old('indentificacao', '') }}">
                @if($errors->has('indentificacao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indentificacao') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gavetum.fields.indentificacao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descricao">{{ trans('cruds.gavetum.fields.descricao') }}</label>
                <input class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}" type="text" name="descricao" id="descricao" value="{{ old('descricao', '') }}">
                @if($errors->has('descricao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descricao') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gavetum.fields.descricao_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('gaveta_vazia') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="gaveta_vazia" value="Não">
                    <input class="form-check-input" type="checkbox" name="gaveta_vazia" id="gaveta_vazia" value="Sim" {{ old('gaveta_vazia', 'Não') == 'Sim' ? 'checked' : '' }}>
                    <label class="form-check-label" for="gaveta_vazia">{{ trans('cruds.gavetum.fields.gaveta_vazia') }}</label>
                </div>
                @if($errors->has('gaveta_vazia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gaveta_vazia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gavetum.fields.gaveta_vazia_helper') }}</span>
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

@endsection
