@extends('layouts.admin')
@section('content')

        <form method="POST" action="{{ route("admin.entre-lotes.store") }}?id={{$id}}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" class="cemiterio_id" value="{{ $remetente->cemiterio_id }}" for="cemiterio_id" name="cemiterio_id">
            <input type="hidden" class="setor_id" value="{{ $remetente->setor_id }}" for="setor_id" name="setor_id">
            <input type="hidden" class="quadra_id" value="{{ $remetente->quadra_id }}" for="quadra_id" name="quadra_id">
            <input type="hidden" class="lote_id" value="{{ $remetente->lote_id }}" for="lote_id" name="lote_id">

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
                <span class="help-block">{{ trans('cruds.entreLote.fields.tipo_de_destino_helper') }}</span>
            </div>

          </div>
          </div>

          <div class="card">
            <div class="card-header">
               Destinatário
            </div>

          <div class="card-body">

            <div class="form-group" id="form-destino" style="display: none;">
                <label for="destino">{{ trans('cruds.entreLote.fields.destino') }}</label>
                <input class="form-control {{ $errors->has('destino') ? 'is-invalid' : '' }}" type="text" name="destino" id="destino" disabled value="{{ old('destino', '') }}">
                @if($errors->has('destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.destino_helper') }}</span>
            </div>

            <div style="display: flex;">

            <div class="form-group" id="form-cemiterio" style="display: none; margin-right: 0.5rem; width: 100%;">
                <label for="cemiterio_destino_id">{{ trans('cruds.entreLote.fields.cemiterio_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio_destino') ? 'is-invalid' : '' }}" disabled name="cemiterio_destino_id" id="cemiterio_destino_id">
                    @foreach($cemiterio_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ old('cemiterio_destino_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.cemiterio_destino_helper') }}</span>
            </div>
            <div class="form-group" id="form-setor" style="display: none; margin-right: 0.5rem; width: 100%;">
                <label for="setor_destino_id">{{ trans('cruds.entreLote.fields.setor_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('setor_destino') ? 'is-invalid' : '' }}" disabled name="setor_destino_id" id="setor_destino_id">
                    <option value> Selecione um cemitério </option>
                </select>
                @if($errors->has('setor_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('setor_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.setor_destino_helper') }}</span>
            </div>

            </div>

            <div style="display: flex;">

            <div class="form-group" id="form-quadra" style="display: none; margin-right: 0.5rem; width: 100%;">
                <label for="quadra_destino_id">{{ trans('cruds.entreLote.fields.quadra_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('quadra_destino') ? 'is-invalid' : '' }}" disabled name="quadra_destino_id" id="quadra_destino_id">
                    <option value> Selecione um setor </option>
                </select>
                @if($errors->has('quadra_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quadra_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.quadra_destino_helper') }}</span>
            </div>
            <div class="form-group" id="form-lote" style="display: none; margin-right: 0.5rem; width: 100%;">
                <label for="lote_destino_id">{{ trans('cruds.entreLote.fields.lote_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('lote_destino') ? 'is-invalid' : '' }}" disabled name="lote_destino_id" id="lote_destino_id">
                  <option value> Selecione uma quadra </option>
                </select>
                @if($errors->has('lote_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lote_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.lote_destino_helper') }}</span>
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
                <label for="data_de_transferencia">{{ trans('cruds.entreLote.fields.data_de_transferencia') }}</label>
                <input class="form-control date {{ $errors->has('data_de_transferencia') ? 'is-invalid' : '' }}" type="text" name="data_de_transferencia" id="data_de_transferencia" value="{{ old('data_de_transferencia') }}">
                @if($errors->has('data_de_transferencia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_de_transferencia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.data_de_transferencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observacoes">{{ trans('cruds.entreLote.fields.observacoes') }}</label>
                <textarea class="form-control {{ $errors->has('observacoes') ? 'is-invalid' : '' }}" name="observacoes" id="observacoes">{{ old('observacoes') }}</textarea>
                @if($errors->has('observacoes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observacoes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.observacoes_helper') }}</span>
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

<!-- Remetente -->
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

<!-- Destinatário -->

<script>
  $(document).ready(function() {
  $('#cemiterio_destino_id').on('change', function() {
     var cemiteriodestinoID = $(this).val();
     if(cemiteriodestinoID) {
         $.ajax({
             url: '/admin/cemiterio-setor/'+cemiteriodestinoID,
             type: "GET",
             data : {"_token":"{{ csrf_token() }}"},
             dataType: "json",
             success:function(data)
             {
               if(data){
                  $('#setor_destino_id').empty();
                  $('#setor_destino_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, setor){
                      $('select[name="setor_destino_id"]').append('<option value="'+ setor.id +'">' + setor.indentificacao + '</option>');
                  });
              }else{
                  $('#setor_destino_id').empty();
                  $('#setor_destino_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#setor_destino_id').empty();
       $('#setor_destino_id').append('<option value> Selecione um cemitério </option>');
     }
  });
  });
</script>

<script>
  $(document).ready(function() {
  $('#setor_destino_id').on('change', function() {
     var setordestinoID = $(this).val();
     if(setordestinoID) {
         $.ajax({
             url: '/admin/setor-quadra/'+setordestinoID,
             type: "GET",
             data : {"_token":"{{ csrf_token() }}"},
             dataType: "json",
             success:function(data)
             {
               if(data){
                  $('#quadra_destino_id').empty();
                  $('#quadra_destino_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, quadra){
                      $('select[name="quadra_destino_id"]').append('<option value="'+ quadra.id +'">' + quadra.indentificacao + '</option>');
                  });
              }else{
                  $('#quadra_destino_id').empty();
                  $('#quadra_destino_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#quadra_destino_id').empty();
       $('#quadra_destino_id').append('<option value> Selecione um setor </option>');
     }
  });
  });
</script>

<script>
  $(document).ready(function() {
  $('#quadra_destino_id').on('change', function() {
     var quadradestinoID = $(this).val();
     if(quadradestinoID) {
         $.ajax({
             url: '/admin/quadra-lote/'+quadradestinoID,
             type: "GET",
             data : {"_token":"{{ csrf_token() }}"},
             dataType: "json",
             success:function(data)
             {
               if(data){
                  $('#lote_destino_id').empty();
                  $('#lote_destino_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, lote){
                      $('select[name="lote_destino_id"]').append('<option value="'+ lote.id +'">' + lote.indentificacao + '</option>');
                  });
              }else{
                  $('#lote_destino_id').empty();
                  $('#lote_destino_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#lote_destino_id').empty();
       $('#lote_destino_id').append('<option value> Selecione uma quadra </option>');
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
$("#form-setor").show();
$("#form-quadra").show();
$("#form-lote").show();
$("#cemiterio_destino_id").removeAttr('disabled');
$("#setor_destino_id").removeAttr('disabled');
$("#quadra_destino_id").removeAttr('disabled');
$("#lote_destino_id").removeAttr('disabled');
  break;
case 'Externo':
$("#form-destino").show();
$("#destino").removeAttr('disabled');
$("#form-cemiterio").hide();
$("#form-setor").hide();
$("#form-quadra").hide();
$("#form-lote").hide();
$("#cemiterio_destino_id").attr('disabled', 1);
$("#setor_destino_id").attr('disabled', 1);
$("#quadra_destino_id").attr('disabled', 1);
$("#lote_destino_id").attr('disabled', 1);
  break;
}
});
</script>

@endsection
