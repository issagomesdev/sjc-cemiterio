@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Atualizar Cemitério
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cemiterios.update", [$cemiterio->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="foto_do_cemiterio"> Foto do Cemitério </label>
                <div class="needsclick dropzone {{ $errors->has('foto_do_cemiterio') ? 'is-invalid' : '' }}" id="foto_do_cemiterio-dropzone">
                </div>
                @if($errors->has('foto_do_cemiterio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('foto_do_cemiterio') }}
                    </div>
                @endif
                <span class="help-block"> </span>
            </div>
            <div class="form-group">
                <label for="nome" class="required">{{ trans('cruds.cemiterio.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $cemiterio->nome) }}" required>
                @if($errors->has('nome'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cemiterio.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.cemiterio.fields.estado') }}</label>
                <select class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado" id="estado">
                    <option value disabled {{ old('estado', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Cemiterio::ESTADO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('estado', $cemiterio->estado) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cemiterio.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cidade">{{ trans('cruds.cemiterio.fields.cidade') }}</label>
                <input class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}" type="text" name="cidade" id="cidade" value="{{ old('cidade', $cemiterio->cidade) }}">
                @if($errors->has('cidade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cidade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cemiterio.fields.cidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bairro">{{ trans('cruds.cemiterio.fields.bairro') }}</label>
                <input class="form-control {{ $errors->has('bairro') ? 'is-invalid' : '' }}" type="text" name="bairro" id="bairro" value="{{ old('bairro', $cemiterio->bairro) }}">
                @if($errors->has('bairro'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bairro') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cemiterio.fields.bairro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rua">{{ trans('cruds.cemiterio.fields.rua') }}</label>
                <input class="form-control {{ $errors->has('rua') ? 'is-invalid' : '' }}" type="text" name="rua" id="rua" value="{{ old('rua', $cemiterio->rua) }}">
                @if($errors->has('rua'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rua') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cemiterio.fields.rua_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero">{{ trans('cruds.cemiterio.fields.numero') }}</label>
                <input class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" type="number" name="numero" id="numero" value="{{ old('numero', $cemiterio->numero) }}" step="1">
                @if($errors->has('numero'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cemiterio.fields.numero_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="complemento">{{ trans('cruds.cemiterio.fields.complemento') }}</label>
                <input class="form-control {{ $errors->has('complemento') ? 'is-invalid' : '' }}" type="text" name="complemento" id="complemento" value="{{ old('complemento', $cemiterio->complemento) }}">
                @if($errors->has('complemento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('complemento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cemiterio.fields.complemento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.cemiterio.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $cemiterio->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cemiterio.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero_de_contato">{{ trans('cruds.cemiterio.fields.numero_de_contato') }}</label>
                <input class="form-control {{ $errors->has('numero_de_contato') ? 'is-invalid' : '' }}" type="text" name="numero_de_contato" id="numero_de_contato" value="{{ old('numero_de_contato', $cemiterio->numero_de_contato) }}">
                @if($errors->has('numero_de_contato'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero_de_contato') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cemiterio.fields.numero_de_contato_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero_de_contato_2">{{ trans('cruds.cemiterio.fields.numero_de_contato_2') }}</label>
                <input class="form-control {{ $errors->has('numero_de_contato_2') ? 'is-invalid' : '' }}" type="text" name="numero_de_contato_2" id="numero_de_contato_2" value="{{ old('numero_de_contato_2', $cemiterio->numero_de_contato_2) }}">
                @if($errors->has('numero_de_contato_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero_de_contato_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cemiterio.fields.numero_de_contato_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observacoes">{{ trans('cruds.cemiterio.fields.observacoes') }}</label>
                <textarea class="form-control {{ $errors->has('observacoes') ? 'is-invalid' : '' }}" name="observacoes" id="observacoes">{{ old('observacoes', $cemiterio->observacoes) }}</textarea>
                @if($errors->has('observacoes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observacoes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cemiterio.fields.observacoes_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.fotoDoCemiterioDropzone = {
    url: '{{ route('admin.cemiterios.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="foto_do_cemiterio"]').remove()
      $('form').append('<input type="hidden" name="foto_do_cemiterio" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto_do_cemiterio"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($cemiterio) && $cemiterio->foto_do_cemiterio)
      var file = {!! json_encode($cemiterio->foto_do_cemiterio) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto_do_cemiterio" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection
