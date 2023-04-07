@extends('layouts.admin')
@section('content')

    <div class="card-body">
        <form method="POST" action="{{ route("admin.para-gavetas.store") }}?id={{$id}}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" class="cemiterio_id" value="{{ $remetente->cemiterio_id }}" for="cemiterio_id" name="cemiterio_id">
            <input type="hidden" class="setor_id" value="{{ $remetente->setor_id }}" for="setor_id" name="setor_id">
            <input type="hidden" class="quadra_id" value="{{ $remetente->quadra_id }}" for="quadra_id" name="quadra_id">
            <input type="hidden" class="lote_id" value="{{ $remetente->lote_id }}" for="lote_id" name="lote_id">

          <div class="card">
            <div class="card-header">
               Destinatário
            </div>

          <div class="card-body">

            <div style="display: flex; flex-wrap: wrap;">

            <div class="form-group" style="margin-right: 0.5rem; width: 100%;">
                <label for="cemiterio_destino_id">{{ trans('cruds.paraGaveta.fields.cemiterio_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio_destino') ? 'is-invalid' : '' }}" name="cemiterio_destino_id" id="cemiterio_destino_id">
                    @foreach($cemiterio_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ old('cemiterio_destino_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraGaveta.fields.cemiterio_destino_helper') }}</span>
            </div>
            <div class="form-group" style="margin-right: 0.5rem; width: 100%;">
                <label for="ossuario_destino_id">{{ trans('cruds.paraGaveta.fields.ossuario_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('ossuario_destino') ? 'is-invalid' : '' }}" name="ossuario_destino_id" id="ossuario_destino_id">
                    <option value> Selecione um cemitério </option>
                </select>
                @if($errors->has('ossuario_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ossuario_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraGaveta.fields.ossuario_destino_helper') }}</span>
            </div>

            </div>

            <div class="form-group">
                <label for="gaveta_destino_id">{{ trans('cruds.paraGaveta.fields.gaveta_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('gaveta_destino') ? 'is-invalid' : '' }}" name="gaveta_destino_id" id="gaveta_destino_id">
                    <option value> Selecione um ossuario </option>
                </select>
                @if($errors->has('gaveta_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gaveta_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraGaveta.fields.gaveta_destino_helper') }}</span>
            </div>

          </div>
          </div>

          <div class="card">
            <div class="card-header">
               Outros
            </div>

            <div class="card-body">

            <div class="form-group">
                <label for="data_de_transferencia">{{ trans('cruds.paraGaveta.fields.data_de_transferencia') }}</label>
                <input class="form-control date {{ $errors->has('data_de_transferencia') ? 'is-invalid' : '' }}" type="text" name="data_de_transferencia" id="data_de_transferencia" value="{{ old('data_de_transferencia') }}">
                @if($errors->has('data_de_transferencia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_de_transferencia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraGaveta.fields.data_de_transferencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observacoes">{{ trans('cruds.paraGaveta.fields.observacoes') }}</label>
                <textarea class="form-control {{ $errors->has('observacoes') ? 'is-invalid' : '' }}" name="observacoes" id="observacoes">{{ old('observacoes') }}</textarea>
                @if($errors->has('observacoes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observacoes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraGaveta.fields.observacoes_helper') }}</span>
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

<style media="screen">
.container-fluid {
  margin-top: 10rem !important;
}
</style>

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
     var ossuarioID = $(this).val();
     if(ossuarioID) {
         $.ajax({
             url: '/admin/cemiterio-ossuario/'+ossuarioID,
             type: "GET",
             data : {"_token":"{{ csrf_token() }}"},
             dataType: "json",
             success:function(data)
             {
               if(data){
                  $('#ossuario_destino_id').empty();
                  $('#ossuario_destino_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, ossuario){
                      $('select[name="ossuario_destino_id"]').append('<option value="'+ ossuario.id +'">' + ossuario.indentificacao + '</option>');
                  });
              }else{
                  $('#ossuario_destino_id').empty();
                  $('#ossuario_destino_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#ossuario_destino_id').empty();
       $('#ossuario_destino_id').append('<option value> Selecione um cemitério </option>');
     }
  });
  });
</script>

<script>
  $(document).ready(function() {
  $('#ossuario_destino_id').on('change', function() {
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
                  $('#gaveta_destino_id').empty();
                  $('#gaveta_destino_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, gaveta){
                      $('select[name="gaveta_destino_id"]').append('<option value="'+ gaveta.id +'">' + gaveta.indentificacao + '</option>');
                  });
              }else{
                  $('#gaveta_destino_id').empty();
                  $('#gaveta_destino_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#gaveta_destino_id').empty();
       $('#gaveta_destino_id').append('<option value> Selecione um ossuario </option>');
     }
  });
  });
</script>

@endsection
