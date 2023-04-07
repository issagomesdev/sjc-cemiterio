@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Cadastrar Responsável
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.responsaveis.store") }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nome">{{ trans('cruds.responsavel.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', '') }}">
                @if($errors->has('nome'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsavel.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.responsavel.fields.parentesco') }}</label>
                <select class="form-control {{ $errors->has('parentesco') ? 'is-invalid' : '' }}" name="parentesco" id="parentesco">
                    <option value disabled {{ old('parentesco', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Responsavel::PARENTESCO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('parentesco', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('parentesco'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parentesco') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsavel.fields.parentesco_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.responsavel.fields.sexo') }}</label>
                <select class="form-control {{ $errors->has('sexo') ? 'is-invalid' : '' }}" name="sexo" id="sexo">
                    <option value disabled {{ old('sexo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Responsavel::SEXO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sexo', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sexo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sexo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsavel.fields.sexo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cnpj"> CPF/CNPJ </label>
                <input class="form-control {{ $errors->has('cpf_cnpj') ? 'is-invalid' : '' }}" type="text" name="cpf_cnpj" id="cpf_cnpj" value="{{ old('cpf_cnpj', '') }}">
                @if($errors->has('cnpj'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cnpj') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsavel.fields.cnpj_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.responsavel.fields.estado') }}</label>
                <select class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado" id="estado">
                    <option value disabled {{ old('estado', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Responsavel::ESTADO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('estado', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsavel.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cidade">{{ trans('cruds.responsavel.fields.cidade') }}</label>
                <input class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}" type="text" name="cidade" id="cidade" value="{{ old('cidade', '') }}">
                @if($errors->has('cidade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cidade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsavel.fields.cidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bairro">{{ trans('cruds.responsavel.fields.bairro') }}</label>
                <input class="form-control {{ $errors->has('bairro') ? 'is-invalid' : '' }}" type="text" name="bairro" id="bairro" value="{{ old('bairro', '') }}">
                @if($errors->has('bairro'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bairro') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsavel.fields.bairro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rua">{{ trans('cruds.responsavel.fields.rua') }}</label>
                <input class="form-control {{ $errors->has('rua') ? 'is-invalid' : '' }}" type="text" name="rua" id="rua" value="{{ old('rua', '') }}">
                @if($errors->has('rua'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rua') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsavel.fields.rua_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero">{{ trans('cruds.responsavel.fields.numero') }}</label>
                <input class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" type="text" name="numero" id="numero" value="{{ old('numero', '') }}">
                @if($errors->has('numero'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsavel.fields.numero_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="complemento">{{ trans('cruds.responsavel.fields.complemento') }}</label>
                <input class="form-control {{ $errors->has('complemento') ? 'is-invalid' : '' }}" type="text" name="complemento" id="complemento" value="{{ old('complemento', '') }}">
                @if($errors->has('complemento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('complemento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsavel.fields.complemento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.responsavel.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsavel.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero_de_contato">{{ trans('cruds.responsavel.fields.numero_de_contato') }}</label>
                <input class="form-control {{ $errors->has('numero_de_contato') ? 'is-invalid' : '' }}" type="text" name="numero_de_contato" id="numero_de_contato" value="{{ old('numero_de_contato', '') }}">
                @if($errors->has('numero_de_contato'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero_de_contato') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsavel.fields.numero_de_contato_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero_de_contato_2">{{ trans('cruds.responsavel.fields.numero_de_contato_2') }}</label>
                <input class="form-control {{ $errors->has('numero_de_contato_2') ? 'is-invalid' : '' }}" type="text" name="numero_de_contato_2" id="numero_de_contato_2" value="{{ old('numero_de_contato_2', '') }}">
                @if($errors->has('numero_de_contato_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero_de_contato_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsavel.fields.numero_de_contato_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observacoes">{{ trans('cruds.responsavel.fields.observacoes') }}</label>
                <input class="form-control {{ $errors->has('observacoes') ? 'is-invalid' : '' }}" type="text" name="observacoes" id="observacoes" value="{{ old('observacoes', '') }}">
                @if($errors->has('observacoes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observacoes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsavel.fields.observacoes_helper') }}</span>
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
