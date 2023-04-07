@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Atualizar Transferência
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.entre-lotes.update", [$entreLote->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="solicitante_id">{{ trans('cruds.entreLote.fields.solicitante') }}</label>
                <select class="form-control select2 {{ $errors->has('solicitante') ? 'is-invalid' : '' }}" name="solicitante_id" id="solicitante_id">
                    @foreach($solicitantes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('solicitante_id') ? old('solicitante_id') : $entreLote->solicitante->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('solicitante'))
                    <div class="invalid-feedback">
                        {{ $errors->first('solicitante') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.solicitante_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="falecido_id">{{ trans('cruds.entreLote.fields.falecido') }}</label>
                <select class="form-control select2 {{ $errors->has('falecido') ? 'is-invalid' : '' }}" name="falecido_id" id="falecido_id">
                    @foreach($falecidos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('falecido_id') ? old('falecido_id') : $entreLote->falecido->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('falecido'))
                    <div class="invalid-feedback">
                        {{ $errors->first('falecido') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.falecido_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cemiterio_id">{{ trans('cruds.entreLote.fields.cemiterio') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio') ? 'is-invalid' : '' }}" name="cemiterio_id" id="cemiterio_id">
                    @foreach($cemiterios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cemiterio_id') ? old('cemiterio_id') : $entreLote->cemiterio->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.cemiterio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="setor_id">{{ trans('cruds.entreLote.fields.setor') }}</label>
                <select class="form-control select2 {{ $errors->has('setor') ? 'is-invalid' : '' }}" name="setor_id" id="setor_id">
                    @foreach($setors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('setor_id') ? old('setor_id') : $entreLote->setor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('setor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('setor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.setor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quadra_id">{{ trans('cruds.entreLote.fields.quadra') }}</label>
                <select class="form-control select2 {{ $errors->has('quadra') ? 'is-invalid' : '' }}" name="quadra_id" id="quadra_id">
                    @foreach($quadras as $id => $entry)
                        <option value="{{ $id }}" {{ (old('quadra_id') ? old('quadra_id') : $entreLote->quadra->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('quadra'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quadra') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.quadra_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lote_id">{{ trans('cruds.entreLote.fields.lote') }}</label>
                <select class="form-control select2 {{ $errors->has('lote') ? 'is-invalid' : '' }}" name="lote_id" id="lote_id">
                    @foreach($lotes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('lote_id') ? old('lote_id') : $entreLote->lote->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lote'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lote') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.lote_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.entreLote.fields.tipo_de_destino') }}</label>
                @foreach(App\Models\EntreLote::TIPO_DE_DESTINO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('tipo_de_destino') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="tipo_de_destino_{{ $key }}" name="tipo_de_destino" value="{{ $key }}" {{ old('tipo_de_destino', $entreLote->tipo_de_destino) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="tipo_de_destino_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('tipo_de_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipo_de_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.tipo_de_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="destino">{{ trans('cruds.entreLote.fields.destino') }}</label>
                <input class="form-control {{ $errors->has('destino') ? 'is-invalid' : '' }}" type="text" name="destino" id="destino" value="{{ old('destino', $entreLote->destino) }}">
                @if($errors->has('destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cemiterio_destino_id">{{ trans('cruds.entreLote.fields.cemiterio_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio_destino') ? 'is-invalid' : '' }}" name="cemiterio_destino_id" id="cemiterio_destino_id">
                    @foreach($cemiterio_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cemiterio_destino_id') ? old('cemiterio_destino_id') : $entreLote->cemiterio_destino->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.cemiterio_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="setor_destino_id">{{ trans('cruds.entreLote.fields.setor_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('setor_destino') ? 'is-invalid' : '' }}" name="setor_destino_id" id="setor_destino_id">
                    @foreach($setor_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('setor_destino_id') ? old('setor_destino_id') : $entreLote->setor_destino->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('setor_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('setor_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.setor_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quadra_destino_id">{{ trans('cruds.entreLote.fields.quadra_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('quadra_destino') ? 'is-invalid' : '' }}" name="quadra_destino_id" id="quadra_destino_id">
                    @foreach($quadra_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('quadra_destino_id') ? old('quadra_destino_id') : $entreLote->quadra_destino->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('quadra_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quadra_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.quadra_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lote_destino_id">{{ trans('cruds.entreLote.fields.lote_destino') }}</label>
                <select class="form-control select2 {{ $errors->has('lote_destino') ? 'is-invalid' : '' }}" name="lote_destino_id" id="lote_destino_id">
                    @foreach($lote_destinos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('lote_destino_id') ? old('lote_destino_id') : $entreLote->lote_destino->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lote_destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lote_destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.lote_destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_de_transferencia">{{ trans('cruds.entreLote.fields.data_de_transferencia') }}</label>
                <input class="form-control date {{ $errors->has('data_de_transferencia') ? 'is-invalid' : '' }}" type="text" name="data_de_transferencia" id="data_de_transferencia" value="{{ old('data_de_transferencia', $entreLote->data_de_transferencia) }}">
                @if($errors->has('data_de_transferencia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_de_transferencia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.data_de_transferencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observacoes">{{ trans('cruds.entreLote.fields.observacoes') }}</label>
                <textarea class="form-control {{ $errors->has('observacoes') ? 'is-invalid' : '' }}" name="observacoes" id="observacoes">{{ old('observacoes', $entreLote->observacoes) }}</textarea>
                @if($errors->has('observacoes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observacoes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entreLote.fields.observacoes_helper') }}</span>
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
