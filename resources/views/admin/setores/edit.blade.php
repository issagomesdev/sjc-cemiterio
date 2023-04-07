@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Atualizar Setor
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.setores.update", [$setore->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="cemiterio_id">{{ trans('cruds.setore.fields.cemiterio') }}</label>
                <select class="form-control select2 {{ $errors->has('cemiterio') ? 'is-invalid' : '' }}" name="cemiterio_id" id="cemiterio_id">
                    @foreach($cemiterios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cemiterio_id') ? old('cemiterio_id') : $setore->cemiterio->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cemiterio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cemiterio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setore.fields.cemiterio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="indentificacao">{{ trans('cruds.setore.fields.indentificacao') }}</label>
                <input class="form-control {{ $errors->has('indentificacao') ? 'is-invalid' : '' }}" type="text" name="indentificacao" id="indentificacao" value="{{ old('indentificacao', $setore->indentificacao) }}">
                @if($errors->has('indentificacao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indentificacao') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setore.fields.indentificacao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descricao">{{ trans('cruds.setore.fields.descricao') }}</label>
                <input class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}" type="text" name="descricao" id="descricao" value="{{ old('descricao', $setore->descricao) }}">
                @if($errors->has('descricao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descricao') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setore.fields.descricao_helper') }}</span>
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
