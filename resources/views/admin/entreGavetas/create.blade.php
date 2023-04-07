@extends('layouts.admin')
@section('content')

        <form method="POST" action="{{ route("admin.entre-gavetas.store") }}?id={{$id}}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" class="cemiterio_id" value="{{ $remetente->cemiterio_id }}" for="cemiterio_id" name="cemiterio_id">
            <input type="hidden" class="ossuario_id" value="{{ $remetente->ossuario_id }}" for="ossuario_id" name="ossuario_id">
            <input type="hidden" class="gaveta_id" value="{{ $remetente->gaveta_id }}" for="gaveta_id" name="gaveta_id">

  <div class="card">
          <div class="card-header">
            Tipo de Destino
          </div>

          <div class="card-body">

              <div class="form-group" style="display: flex;">
                <div class="form-check" style="margin-right: 0.5rem;">
                <input class="form-check-input" style="margin-left: -1.1rem;" type="radio" name="tipo_de_destino" id="Interno" value="Interno">
                <label class="form-check-label" for="Interno">Interno</label>
                </div>
                <div class="form-check">
                <input class="form-check-input" style="margin-left: -1.1rem;" type="radio" name="tipo_de_destino" id="Externo" value="Externo">
                <label class="form-check-label" for="Externo">Externo</label>
                </div>
                  <span class="help-block"> </span>
              </div>

            </div>
            </div>

            <div class="card">
              <div class="card-header">
                 Destinatário
              </div>

            <div class="card-body">

            <div class="form-group" id="form-destino" style="display: none;">
                <label for="destino">{{ trans('cruds.entreGaveta.fields.destino') }}</label>
                <input class="form-control {{ $errors->has('destino') ? 'is-invalid' : '' }}" type="text" name="destino" id="destino" value="{{ old('destino', '') }}">
                @if($errors->has('destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreGaveta.fields.destino_helper') }}</span>
            </div>

            <div style="display: flex; flex-wrap: wrap;">

            <div class="form-group" id="form-cemiterio" style="display: none; margin-right: 0.5rem;">
                <label for="cemiterio_de_destino_id">{{ trans('cruds.entreGaveta.fields.cemiterio_de_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio_de_destino') ? 'is-invalid' : '' }}" name="cemiterio_de_destino_id" id="cemiterio_de_destino_id">
                    @foreach($cemiterio_de_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ old('cemiterio_de_destino_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio_de_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio_de_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreGaveta.fields.cemiterio_de_destino_helper') }}</span>
            </div>

            <div class="form-group" id="form-ossuario" style="display: none; margin-right: 0.5rem;">
                <label for="ossuario_de_destino_id">{{ trans('cruds.entreGaveta.fields.ossuario_de_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('ossuario_de_destino') ? 'is-invalid' : '' }}" name="ossuario_de_destino_id" id="ossuario_de_destino_id">
                    <option value> Selecione um cemitério </option>
                </select>
                @if($errors->has('ossuario_de_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ossuario_de_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreGaveta.fields.ossuario_de_destino_helper') }}</span>
            </div>

            <div class="form-group" id="form-gaveta" style="display: none; margin-right: 0.5rem;">
                <label for="gaveta_destino">{{ trans('cruds.entreGaveta.fields.gaveta_de_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('gaveta_de_destino') ? 'is-invalid' : '' }}" name="gaveta_de_destino_id" id="gaveta_de_destino_id">
                    <option value> Selecione um ossuário </option>
                </select>
                @if($errors->has('gaveta_de_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gaveta_de_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreGaveta.fields.gaveta_de_destino_helper') }}</span>
            </div>

          </div>

        </div>
        </div>

        <div class="card">
          <div class="card-header">
            Outros
          </div>

        <div class="card-body">

            <div class="form-group">
                <label for="data_de_transferencia">{{ trans('cruds.entreGaveta.fields.data_de_transferencia') }}</label>
                <input class="form-control date {{ $errors->has('data_de_transferencia') ? 'is-invalid' : '' }}" type="text" name="data_de_transferencia" id="data_de_transferencia" value="{{ old('data_de_transferencia') }}">
                @if($errors->has('data_de_transferencia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_de_transferencia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreGaveta.fields.data_de_transferencia_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="observacoes">{{ trans('cruds.entreGaveta.fields.observacoes') }}</label>
                <textarea class="form-control {{ $errors->has('observacoes') ? 'is-invalid' : '' }}" name="observacoes" id="observacoes">{{ old('observacoes') }}</textarea>
                @if($errors->has('observacoes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observacoes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreGaveta.fields.observacoes_helper') }}</span>
            </div>
            <input type="hidden" class="assinatura_id" value="{{Auth::user()->id}}" for="assinatura_id" name="assinatura_id">

            </div>
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>

            </form>

@endsection
@section('scripts')
@parent

<!-- Destinatário -->

<script>
  $(document).ready(function() {
  $('#cemiterio_de_destino_id').on('change', function() {
     var cemiteriodestinoID = $(this).val();
     if(cemiteriodestinoID) {
         $.ajax({
             url: '/admin/cemiterio-ossuario/'+cemiteriodestinoID,
             type: "GET",
             data : {"_token":"{{ csrf_token() }}"},
             dataType: "json",
             success:function(data)
             {
               if(data){
                  $('#ossuario_de_destino_id').empty();
                  $('#ossuario_de_destino_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, ossuario){
                      $('select[name="ossuario_de_destino_id"]').append('<option value="'+ ossuario.id +'">' + ossuario.indentificacao + '</option>');
                  });
              }else{
                  $('#ossuario_destino_id').empty();
                  $('#ossuario_destino_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#ossuario_de_destino_id').empty();
       $('#ossuario_de_destino_id').append('<option value> Selecione um cemitério </option>');
     }
  });
  });
</script>

<script>
  $(document).ready(function() {
  $('#ossuario_de_destino_id').on('change', function() {
     var ossuariodestinoID = $(this).val();
     if(ossuariodestinoID) {
         $.ajax({
             url: '/admin/ossuario-gaveta/'+ossuariodestinoID,
             type: "GET",
             data : {"_token":"{{ csrf_token() }}"},
             dataType: "json",
             success:function(data)
             {
               if(data){
                  $('#gaveta_de_destino_id').empty();
                  $('#gaveta_de_destino_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, gaveta){
                      $('select[name="gaveta_de_destino_id"]').append('<option value="'+ gaveta.id +'">' + gaveta.indentificacao + '</option>');
                  });
              }else{
                  $('#gaveta_de_destino_id').empty();
                  $('#gaveta_de_destino_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#gaveta_de_destino_id').empty();
       $('#gaveta_de_destino_id').append('<option value> Selecione um ossuário </option>');
     }
  });
  });
</script>

<!-- Tipo de Destino -->

<script>
$('input[type=radio][name=tipo_de_destino]').on('change', function() {
switch ($(this).val()) {
case 'Interno':
$("#form-destino").hide();
$("#destino").attr('disabled', 1);
$("#form-cemiterio").show();
$("#form-ossuario").show();
$("#form-gaveta").show();
$("#cemiterio_de_destino_id").removeAttr('disabled');
$("#ossuario_de_destino_id").removeAttr('disabled');
$("#gaveta_de_destino_id").removeAttr('disabled');
  break;
case 'Externo':
$("#form-destino").show();
$("#destino").removeAttr('disabled');
$("#form-cemiterio").hide();
$("#form-ossuario").hide();
$("#form-gaveta").hide();
$("#cemiterio_de_destino_id").attr('disabled', 1);
$("#ossuario_de_destino_id").attr('disabled', 1);
$("#gaveta_de_destino_id").attr('disabled', 1);
  break;
}
});
</script>

@endsection
