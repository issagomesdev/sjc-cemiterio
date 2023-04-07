@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Cadastrar Permissão
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.permissions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.permission.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="funcao">{{ trans('cruds.permission.fields.funcao') }}</label>
                <input class="form-control {{ $errors->has('funcao') ? 'is-invalid' : '' }}" type="text" name="funcao" id="funcao" value="{{ old('funcao', '') }}">
                @if($errors->has('funcao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('funcao') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.funcao_helper') }}</span>
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
