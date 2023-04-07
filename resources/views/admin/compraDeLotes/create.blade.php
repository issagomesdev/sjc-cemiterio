@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Lançar Compra de Lote
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.compra-de-lotes.store") }}?id={{$id}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="numero_dam">{{ trans('cruds.compraDeLote.fields.numero_dam') }}</label>
                <input class="form-control {{ $errors->has('numero_dam') ? 'is-invalid' : '' }}" type="text" name="numero_dam" id="numero_dam" value="{{ old('numero_dam', '') }}">
                @if($errors->has('numero_dam'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero_dam') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.compraDeLote.fields.numero_dam_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ano_dam">{{ trans('cruds.compraDeLote.fields.ano_dam') }}</label>
                <input class="form-control {{ $errors->has('ano_dam') ? 'is-invalid' : '' }}" type="text" name="ano_dam" id="ano_dam" value="{{ old('ano_dam', '') }}">
                @if($errors->has('ano_dam'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ano_dam') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.compraDeLote.fields.ano_dam_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_da_aquisicao">{{ trans('cruds.compraDeLote.fields.data_da_aquisicao') }}</label>
                <input class="form-control date {{ $errors->has('data_da_aquisicao') ? 'is-invalid' : '' }}" type="text" name="data_da_aquisicao" id="data_da_aquisicao" value="{{ old('data_da_aquisicao') }}">
                @if($errors->has('data_da_aquisicao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_da_aquisicao') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.compraDeLote.fields.data_da_aquisicao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observacoes">{{ trans('cruds.compraDeLote.fields.observacoes') }}</label>
                <textarea class="form-control {{ $errors->has('observacoes') ? 'is-invalid' : '' }}" name="observacoes" id="observacoes">{{ old('observacoes') }}</textarea>
                @if($errors->has('observacoes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observacoes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.compraDeLote.fields.observacoes_helper') }}</span>
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
