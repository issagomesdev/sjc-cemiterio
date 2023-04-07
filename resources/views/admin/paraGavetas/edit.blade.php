@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Atualizar Transferência
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.para-ossuarios.update", [$paraOssuario->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="solicitante_id">{{ trans('cruds.paraOssuario.fields.solicitante') }}</label>
                <select class="form-control select2 {{ $errors->has('solicitante') ? 'is-invalid' : '' }}" name="solicitante_id" id="solicitante_id">
                    @foreach($solicitantes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('solicitante_id') ? old('solicitante_id') : $paraOssuario->solicitante->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('solicitante'))
                    <div class="invalid-feedback">
                        {{ $errors->first('solicitante') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraOssuario.fields.solicitante_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="falecido_id">{{ trans('cruds.paraOssuario.fields.falecido') }}</label>
                <select class="form-control select2 {{ $errors->has('falecido') ? 'is-invalid' : '' }}" name="falecido_id" id="falecido_id">
                    @foreach($falecidos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('falecido_id') ? old('falecido_id') : $paraOssuario->falecido->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('falecido'))
                    <div class="invalid-feedback">
                        {{ $errors->first('falecido') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraOssuario.fields.falecido_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cemiterio_id">{{ trans('cruds.paraOssuario.fields.cemiterio') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio') ? 'is-invalid' : '' }}" name="cemiterio_id" id="cemiterio_id">
                    @foreach($cemiterios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cemiterio_id') ? old('cemiterio_id') : $paraOssuario->cemiterio->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraOssuario.fields.cemiterio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="setor_id">{{ trans('cruds.paraOssuario.fields.setor') }}</label>
                <select class="form-control select2 {{ $errors->has('setor') ? 'is-invalid' : '' }}" name="setor_id" id="setor_id">
                    @foreach($setors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('setor_id') ? old('setor_id') : $paraOssuario->setor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('setor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('setor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraOssuario.fields.setor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quadra_id">{{ trans('cruds.paraOssuario.fields.quadra') }}</label>
                <select class="form-control select2 {{ $errors->has('quadra') ? 'is-invalid' : '' }}" name="quadra_id" id="quadra_id">
                    @foreach($quadras as $id => $entry)
                        <option value="{{ $id }}" {{ (old('quadra_id') ? old('quadra_id') : $paraOssuario->quadra->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('quadra'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quadra') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraOssuario.fields.quadra_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lote_id">{{ trans('cruds.paraOssuario.fields.lote') }}</label>
                <select class="form-control select2 {{ $errors->has('lote') ? 'is-invalid' : '' }}" name="lote_id" id="lote_id">
                    @foreach($lotes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('lote_id') ? old('lote_id') : $paraOssuario->lote->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lote'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lote') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraOssuario.fields.lote_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cemiterio_destino_id">{{ trans('cruds.paraOssuario.fields.cemiterio_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio_destino') ? 'is-invalid' : '' }}" name="cemiterio_destino_id" id="cemiterio_destino_id">
                    @foreach($cemiterio_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cemiterio_destino_id') ? old('cemiterio_destino_id') : $paraOssuario->cemiterio_destino->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraOssuario.fields.cemiterio_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ossuario_destino_id">{{ trans('cruds.paraOssuario.fields.ossuario_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('ossuario_destino') ? 'is-invalid' : '' }}" name="ossuario_destino_id" id="ossuario_destino_id">
                    @foreach($ossuario_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ossuario_destino_id') ? old('ossuario_destino_id') : $paraOssuario->ossuario_destino->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ossuario_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ossuario_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraOssuario.fields.ossuario_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gaveta_destino_id">{{ trans('cruds.paraOssuario.fields.gaveta_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('gaveta_destino') ? 'is-invalid' : '' }}" name="gaveta_destino_id" id="gaveta_destino_id">
                    @foreach($gaveta_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('gaveta_destino_id') ? old('gaveta_destino_id') : $paraOssuario->gaveta_destino->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('gaveta_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gaveta_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraOssuario.fields.gaveta_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_de_transferencia">{{ trans('cruds.paraOssuario.fields.data_de_transferencia') }}</label>
                <input class="form-control date {{ $errors->has('data_de_transferencia') ? 'is-invalid' : '' }}" type="text" name="data_de_transferencia" id="data_de_transferencia" value="{{ old('data_de_transferencia', $paraOssuario->data_de_transferencia) }}">
                @if($errors->has('data_de_transferencia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_de_transferencia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraOssuario.fields.data_de_transferencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observacoes">{{ trans('cruds.paraOssuario.fields.observacoes') }}</label>
                <textarea class="form-control {{ $errors->has('observacoes') ? 'is-invalid' : '' }}" name="observacoes" id="observacoes">{{ old('observacoes', $paraOssuario->observacoes) }}</textarea>
                @if($errors->has('observacoes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observacoes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraOssuario.fields.observacoes_helper') }}</span>
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
