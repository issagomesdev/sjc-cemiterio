@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.paraLote.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.para-lotes.update", [$paraLote->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="responsavel_id">{{ trans('cruds.paraLote.fields.responsavel') }}</label>
                <select class="form-control select2 {{ $errors->has('responsavel') ? 'is-invalid' : '' }}" name="responsavel_id" id="responsavel_id">
                    @foreach($responsavels as $id => $entry)
                        <option value="{{ $id }}" {{ (old('responsavel_id') ? old('responsavel_id') : $paraLote->responsavel->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('responsavel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('responsavel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.responsavel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="falecido_id">{{ trans('cruds.paraLote.fields.falecido') }}</label>
                <select class="form-control select2 {{ $errors->has('falecido') ? 'is-invalid' : '' }}" name="falecido_id" id="falecido_id">
                    @foreach($falecidos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('falecido_id') ? old('falecido_id') : $paraLote->falecido->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('falecido'))
                    <div class="invalid-feedback">
                        {{ $errors->first('falecido') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.falecido_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cemiterio_id">{{ trans('cruds.paraLote.fields.cemiterio') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio') ? 'is-invalid' : '' }}" name="cemiterio_id" id="cemiterio_id">
                    @foreach($cemiterios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cemiterio_id') ? old('cemiterio_id') : $paraLote->cemiterio->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.cemiterio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ossuario_id">{{ trans('cruds.paraLote.fields.ossuario') }}</label>
                <select class="form-control select2 {{ $errors->has('ossuario') ? 'is-invalid' : '' }}" name="ossuario_id" id="ossuario_id">
                    @foreach($ossuarios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ossuario_id') ? old('ossuario_id') : $paraLote->ossuario->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ossuario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ossuario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.ossuario_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gaveta_id">{{ trans('cruds.paraLote.fields.gaveta') }}</label>
                <select class="form-control select2 {{ $errors->has('gaveta') ? 'is-invalid' : '' }}" name="gaveta_id" id="gaveta_id">
                    @foreach($gavetas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('gaveta_id') ? old('gaveta_id') : $paraLote->gaveta->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('gaveta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gaveta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.gaveta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cemiterio_de_destino_id">{{ trans('cruds.paraLote.fields.cemiterio_de_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio_de_destino') ? 'is-invalid' : '' }}" name="cemiterio_de_destino_id" id="cemiterio_de_destino_id">
                    @foreach($cemiterio_de_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cemiterio_de_destino_id') ? old('cemiterio_de_destino_id') : $paraLote->cemiterio_de_destino->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio_de_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio_de_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.cemiterio_de_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="setor_de_destino_id">{{ trans('cruds.paraLote.fields.setor_de_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('setor_de_destino') ? 'is-invalid' : '' }}" name="setor_de_destino_id" id="setor_de_destino_id">
                    @foreach($setor_de_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('setor_de_destino_id') ? old('setor_de_destino_id') : $paraLote->setor_de_destino->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('setor_de_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('setor_de_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.setor_de_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quadra_de_destinos">{{ trans('cruds.paraLote.fields.quadra_de_destino') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('quadra_de_destinos') ? 'is-invalid' : '' }}" name="quadra_de_destinos[]" id="quadra_de_destinos" multiple>
                    @foreach($quadra_de_destinos as $id => $quadra_de_destino)
                        <option value="{{ $id }}" {{ (in_array($id, old('quadra_de_destinos', [])) || $paraLote->quadra_de_destinos->contains($id)) ? 'selected' : '' }}>{{ $quadra_de_destino }}</option>
                    @endforeach
                </select>
                @if($errors->has('quadra_de_destinos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quadra_de_destinos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.quadra_de_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lote_de_destino_id">{{ trans('cruds.paraLote.fields.lote_de_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('lote_de_destino') ? 'is-invalid' : '' }}" name="lote_de_destino_id" id="lote_de_destino_id">
                    @foreach($lote_de_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('lote_de_destino_id') ? old('lote_de_destino_id') : $paraLote->lote_de_destino->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lote_de_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lote_de_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.lote_de_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_de_transferencia">{{ trans('cruds.paraLote.fields.data_de_transferencia') }}</label>
                <input class="form-control date {{ $errors->has('data_de_transferencia') ? 'is-invalid' : '' }}" type="text" name="data_de_transferencia" id="data_de_transferencia" value="{{ old('data_de_transferencia', $paraLote->data_de_transferencia) }}">
                @if($errors->has('data_de_transferencia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_de_transferencia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.data_de_transferencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observacoes">{{ trans('cruds.paraLote.fields.observacoes') }}</label>
                <textarea class="form-control {{ $errors->has('observacoes') ? 'is-invalid' : '' }}" name="observacoes" id="observacoes">{{ old('observacoes', $paraLote->observacoes) }}</textarea>
                @if($errors->has('observacoes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observacoes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paraLote.fields.observacoes_helper') }}</span>
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