@extends('layouts.admin')
@section('content')

        <form method="POST" action="{{ route("admin.para-lotes.store") }}?id={{$id}}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" class="cemiterio_id" value="{{ $remetente->cemiterio_id }}" for="cemiterio_id" name="cemiterio_id">
            <input type="hidden" class="ossuario_id" value="{{ $remetente->ossuario_id }}" for="ossuario_id" name="ossuario_id">
            <input type="hidden" class="gaveta_id" value="{{ $remetente->gaveta_id }}" for="gaveta_id" name="gaveta_id">

            <div class="card">
              <div class="card-header">
                 Destinatário
              </div>

            <div class="card-body">

              <div style="display: flex; flex-wrap: wrap;">

            <div class="form-group" style="margin-right: 0.5rem;">
                <label for="cemiterio_de_destino_id">{{ trans('cruds.paraLote.fields.cemiterio_de_destino') }}</label>
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
                <span class="help-block">{{ trans('cruds.paraLote.fields.cemiterio_de_destino_helper') }}</span>
            </div>

            <div class="form-group" style="margin-right: 0.5rem;">
                <label for="setor_de_destino_id">{{ trans('cruds.paraLote.fields.setor_de_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('setor_de_destino') ? 'is-invalid' : '' }}" name="setor_de_destino_id" id="setor_de_destino_id">
                    <option value> Selecione um cemitério </option>
                </select>
                @if($errors->has('setor_de_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('setor_de_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.setor_de_destino_helper') }}</span>
            </div>

            <div class="form-group" style="margin-right: 0.5rem;">
                <label for="quadra_de_destinos">{{ trans('cruds.paraLote.fields.quadra_de_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('quadra_de_destinos') ? 'is-invalid' : '' }}" name="quadra_de_destino_id" id="quadra_de_destino_id">
                    <option value> Selecione um setor </option>
                </select>
                @if($errors->has('quadra_de_destinos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quadra_de_destinos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.quadra_de_destino_helper') }}</span>
            </div>

            <div class="form-group" style="margin-right: 0.5rem;">
                <label for="lote_de_destino_id">{{ trans('cruds.paraLote.fields.lote_de_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('lote_de_destino') ? 'is-invalid' : '' }}" name="lote_de_destino_id" id="lote_de_destino_id">
                    <option value> Selecione uma quadra </option>
                </select>
                @if($errors->has('lote_de_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lote_de_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.lote_de_destino_helper') }}</span>
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
                <label for="data_de_transferencia">{{ trans('cruds.paraLote.fields.data_de_transferencia') }}</label>
                <input class="form-control date {{ $errors->has('data_de_transferencia') ? 'is-invalid' : '' }}" type="text" name="data_de_transferencia" id="data_de_transferencia" value="{{ old('data_de_transferencia') }}">
                @if($errors->has('data_de_transferencia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_de_transferencia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.data_de_transferencia_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="observacoes">{{ trans('cruds.paraLote.fields.observacoes') }}</label>
                <textarea class="form-control {{ $errors->has('observacoes') ? 'is-invalid' : '' }}" name="observacoes" id="observacoes">{{ old('observacoes') }}</textarea>
                @if($errors->has('observacoes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observacoes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.observacoes_helper') }}</span>
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

<!-- Destinatário -->

<script>
  $(document).ready(function() {
  $('#cemiterio_de_destino_id').on('change', function() {
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
                  $('#setor_de_destino_id').empty();
                  $('#setor_de_destino_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, setor){
                      $('select[name="setor_de_destino_id"]').append('<option value="'+ setor.id +'">' + setor.indentificacao + '</option>');
                  });
              }else{
                  $('#setor_de_destino_id').empty();
                  $('#setor_de_destino_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#setor_de_destino_id').empty();
       $('#setor_de_destino_id').append('<option value> Selecione um cemitério </option>');
     }
  });
  });
</script>

<script>
  $(document).ready(function() {
  $('#setor_de_destino_id').on('change', function() {
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
                  $('#quadra_de_destino_id').empty();
                  $('#quadra_de_destino_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, quadra){
                      $('select[name="quadra_de_destino_id"]').append('<option value="'+ quadra.id +'">' + quadra.indentificacao + '</option>');
                  });
              }else{
                  $('#quadra_de_destino_id').empty();
                  $('#quadra_de_destino_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#quadra_de_destino_id').empty();
       $('#quadra_de_destino_id').append('<option value> Selecione um setor </option>');
     }
  });
  });
</script>

<script>
  $(document).ready(function() {
  $('#quadra_de_destino_id').on('change', function() {
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
                  $('#lote_de_destino_id').empty();
                  $('#lote_de_destino_id').append('<option value> Selecione por favor </option>');
                  $.each(data, function(key, lote){
                      $('select[name="lote_de_destino_id"]').append('<option value="'+ lote.id +'">' + lote.indentificacao + '</option>');
                  });
              }else{
                  $('#lote_de_destino_id').empty();
                  $('#lote_de_destino_id').append('<option value> Selecione por favor </option>');
              }
           }
         });
     }else{
       $('#lote_de_destino_id').empty();
       $('#lote_de_destino_id').append('<option value> Selecione uma quadra </option>');
     }
  });
  });
</script>

@endsection
