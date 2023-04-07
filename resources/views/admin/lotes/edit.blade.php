@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Atualizar Lote
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.lotes.update", [$lote->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="cemiterio_id">{{ trans('cruds.lote.fields.cemiterio') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio') ? 'is-invalid' : '' }}" name="cemiterio_id" id="cemiterio_id">
                    @foreach($cemiterios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cemiterio_id') ? old('cemiterio_id') : $lote->cemiterio->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lote.fields.cemiterio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="setor_id">{{ trans('cruds.lote.fields.setor') }}</label>
                <select class="form-control select2 {{ $errors->has('setor') ? 'is-invalid' : '' }}" name="setor_id" id="setor_id">
                    @foreach($setors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('setor_id') ? old('setor_id') : $lote->setor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('setor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('setor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lote.fields.setor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quadra_id">{{ trans('cruds.lote.fields.quadra') }}</label>
                <select class="form-control select2 {{ $errors->has('quadra') ? 'is-invalid' : '' }}" name="quadra_id" id="quadra_id">
                    @foreach($quadras as $id => $entry)
                        <option value="{{ $id }}" {{ (old('quadra_id') ? old('quadra_id') : $lote->quadra->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('quadra'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quadra') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lote.fields.quadra_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.lote.fields.tipo_de_lote') }}</label>
                <select class="form-control {{ $errors->has('tipo_de_lote') ? 'is-invalid' : '' }}" name="tipo_de_lote" id="tipo_de_lote">
                    <option value disabled {{ old('tipo_de_lote', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Lote::TIPO_DE_LOTE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipo_de_lote', $lote->tipo_de_lote) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo_de_lote'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipo_de_lote') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lote.fields.tipo_de_lote_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comprimento">{{ trans('cruds.lote.fields.comprimento') }}</label>
                <input class="form-control {{ $errors->has('comprimento') ? 'is-invalid' : '' }}" type="text" name="comprimento" id="comprimento" value="{{ old('comprimento', $lote->comprimento) }}">
                @if($errors->has('comprimento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comprimento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lote.fields.comprimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="altura">{{ trans('cruds.lote.fields.altura') }}</label>
                <input class="form-control {{ $errors->has('altura') ? 'is-invalid' : '' }}" type="text" name="altura" id="altura" value="{{ old('altura', $lote->altura) }}">
                @if($errors->has('altura'))
                    <div class="invalid-feedback">
                        {{ $errors->first('altura') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lote.fields.altura_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="indentificacao">{{ trans('cruds.lote.fields.indentificacao') }}</label>
                <input class="form-control {{ $errors->has('indentificacao') ? 'is-invalid' : '' }}" type="text" name="indentificacao" id="indentificacao" value="{{ old('indentificacao', $lote->indentificacao) }}">
                @if($errors->has('indentificacao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indentificacao') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lote.fields.indentificacao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descricao">{{ trans('cruds.lote.fields.descricao') }}</label>
                <input class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}" type="text" name="descricao" id="descricao" value="{{ old('descricao', $lote->descricao) }}">
                @if($errors->has('descricao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descricao') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lote.fields.descricao_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('lote_vazio') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="lote_vazio" value="Não">
                    <input class="form-check-input" type="checkbox" name="lote_vazio" id="lote_vazio" value="Sim" {{ $lote->lote_vazio || old('lote_vazio', 'Não') === 'Sim' ? 'checked' : '' }}>
                    <label class="form-check-label" for="lote_vazio">{{ trans('cruds.lote.fields.lote_vazio') }}</label>
                </div>
                @if($errors->has('lote_vazio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lote_vazio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lote.fields.lote_vazio_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('reservado') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="reservado" value="Não">
                    <input class="form-check-input" type="checkbox" name="reservado" id="reservado" value="Sim" {{ $lote->reservado || old('reservado', 'Não') === 'Sim' ? 'checked' : '' }}>
                    <label class="form-check-label" for="reservado">{{ trans('cruds.lote.fields.reservado') }}</label>
                </div>
                @if($errors->has('reservado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reservado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lote.fields.reservado_helper') }}</span>
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

@endsection
