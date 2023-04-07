@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Atualizar Transferência
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.entre-ossuarios.update", [$entreOssuario->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="responsavel_id">{{ trans('cruds.entreOssuario.fields.responsavel') }}</label>
                <select class="form-control select2 {{ $errors->has('responsavel') ? 'is-invalid' : '' }}" name="responsavel_id" id="responsavel_id">
                    @foreach($responsavels as $id => $entry)
                        <option value="{{ $id }}" {{ (old('responsavel_id') ? old('responsavel_id') : $entreOssuario->responsavel->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('responsavel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('responsavel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreOssuario.fields.responsavel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="falecido_id">{{ trans('cruds.entreOssuario.fields.falecido') }}</label>
                <select class="form-control select2 {{ $errors->has('falecido') ? 'is-invalid' : '' }}" name="falecido_id" id="falecido_id">
                    @foreach($falecidos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('falecido_id') ? old('falecido_id') : $entreOssuario->falecido->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('falecido'))
                    <div class="invalid-feedback">
                        {{ $errors->first('falecido') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreOssuario.fields.falecido_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cemiterio_id">{{ trans('cruds.entreOssuario.fields.cemiterio') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio') ? 'is-invalid' : '' }}" name="cemiterio_id" id="cemiterio_id">
                    @foreach($cemiterios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cemiterio_id') ? old('cemiterio_id') : $entreOssuario->cemiterio->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreOssuario.fields.cemiterio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ossuario_id">{{ trans('cruds.entreOssuario.fields.ossuario') }}</label>
                <select class="form-control select2 {{ $errors->has('ossuario') ? 'is-invalid' : '' }}" name="ossuario_id" id="ossuario_id">
                    @foreach($ossuarios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ossuario_id') ? old('ossuario_id') : $entreOssuario->ossuario->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ossuario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ossuario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreOssuario.fields.ossuario_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gaveta_id">{{ trans('cruds.entreOssuario.fields.gaveta') }}</label>
                <select class="form-control select2 {{ $errors->has('gaveta') ? 'is-invalid' : '' }}" name="gaveta_id" id="gaveta_id">
                    @foreach($gavetas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('gaveta_id') ? old('gaveta_id') : $entreOssuario->gaveta->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('gaveta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gaveta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreOssuario.fields.gaveta_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.entreOssuario.fields.tipo_de_destino') }}</label>
                @foreach(App\Models\EntreOssuario::TIPO_DE_DESTINO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('tipo_de_destino') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="tipo_de_destino_{{ $key }}" name="tipo_de_destino" value="{{ $key }}" {{ old('tipo_de_destino', $entreOssuario->tipo_de_destino) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="tipo_de_destino_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('tipo_de_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipo_de_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreOssuario.fields.tipo_de_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="destino">{{ trans('cruds.entreOssuario.fields.destino') }}</label>
                <input class="form-control {{ $errors->has('destino') ? 'is-invalid' : '' }}" type="text" name="destino" id="destino" value="{{ old('destino', $entreOssuario->destino) }}">
                @if($errors->has('destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreOssuario.fields.destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cemiterio_de_destino_id">{{ trans('cruds.entreOssuario.fields.cemiterio_de_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio_de_destino') ? 'is-invalid' : '' }}" name="cemiterio_de_destino_id" id="cemiterio_de_destino_id">
                    @foreach($cemiterio_de_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cemiterio_de_destino_id') ? old('cemiterio_de_destino_id') : $entreOssuario->cemiterio_de_destino->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio_de_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio_de_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreOssuario.fields.cemiterio_de_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ossuario_de_destino_id">{{ trans('cruds.entreOssuario.fields.ossuario_de_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('ossuario_de_destino') ? 'is-invalid' : '' }}" name="ossuario_de_destino_id" id="ossuario_de_destino_id">
                    @foreach($ossuario_de_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ossuario_de_destino_id') ? old('ossuario_de_destino_id') : $entreOssuario->ossuario_de_destino->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ossuario_de_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ossuario_de_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreOssuario.fields.ossuario_de_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gaveta_de_destinos">{{ trans('cruds.entreOssuario.fields.gaveta_de_destino') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('gaveta_de_destinos') ? 'is-invalid' : '' }}" name="gaveta_de_destinos[]" id="gaveta_de_destinos" multiple>
                    @foreach($gaveta_de_destinos as $id => $gaveta_de_destino)
                        <option value="{{ $id }}" {{ (in_array($id, old('gaveta_de_destinos', [])) || $entreOssuario->gaveta_de_destinos->contains($id)) ? 'selected' : '' }}>{{ $gaveta_de_destino }}</option>
                    @endforeach
                </select>
                @if($errors->has('gaveta_de_destinos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gaveta_de_destinos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreOssuario.fields.gaveta_de_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_de_transferencia">{{ trans('cruds.entreOssuario.fields.data_de_transferencia') }}</label>
                <input class="form-control date {{ $errors->has('data_de_transferencia') ? 'is-invalid' : '' }}" type="text" name="data_de_transferencia" id="data_de_transferencia" value="{{ old('data_de_transferencia', $entreOssuario->data_de_transferencia) }}">
                @if($errors->has('data_de_transferencia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_de_transferencia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreOssuario.fields.data_de_transferencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observacoes">{{ trans('cruds.entreOssuario.fields.observacoes') }}</label>
                <textarea class="form-control {{ $errors->has('observacoes') ? 'is-invalid' : '' }}" name="observacoes" id="observacoes">{{ old('observacoes', $entreOssuario->observacoes) }}</textarea>
                @if($errors->has('observacoes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observacoes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreOssuario.fields.observacoes_helper') }}</span>
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
