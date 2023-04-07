@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Atualizar Quadra
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.quadras.update", [$quadra->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="cemiterio_id">{{ trans('cruds.quadra.fields.cemiterio') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio') ? 'is-invalid' : '' }}" name="cemiterio_id" id="cemiterio_id">
                    @foreach($cemiterios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cemiterio_id') ? old('cemiterio_id') : $quadra->cemiterio->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quadra.fields.cemiterio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="setor_id">{{ trans('cruds.quadra.fields.setor') }}</label>
                <select class="form-control select2 {{ $errors->has('setor') ? 'is-invalid' : '' }}" name="setor_id" id="setor_id">
                    @foreach($setors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('setor_id') ? old('setor_id') : $quadra->setor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('setor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('setor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quadra.fields.setor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="indentificacao">{{ trans('cruds.quadra.fields.indentificacao') }}</label>
                <input class="form-control {{ $errors->has('indentificacao') ? 'is-invalid' : '' }}" type="text" name="indentificacao" id="indentificacao" value="{{ old('indentificacao', $quadra->indentificacao) }}">
                @if($errors->has('indentificacao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indentificacao') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quadra.fields.indentificacao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descricao">{{ trans('cruds.quadra.fields.descricao') }}</label>
                <input class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}" type="text" name="descricao" id="descricao" value="{{ old('descricao', $quadra->descricao) }}">
                @if($errors->has('descricao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descricao') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quadra.fields.descricao_helper') }}</span>
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



@endsection
