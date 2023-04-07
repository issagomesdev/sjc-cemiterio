@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Visualizar Óbito em Gaveta
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.obitos-gavetas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.id') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.responsavel') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->responsavel->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.cemiterio') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->cemiterio->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.ossuario') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->ossuario->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.gaveta') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->gaveta->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.numero_dam') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->numero_dam }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.ano_dam') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->ano_dam }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.nome_do_falecido') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->nome_do_falecido }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.data_de_nascimento') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->data_de_nascimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.data_de_falecimento') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->data_de_falecimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.data_de_sepultamento') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->data_de_sepultamento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.nome_da_mae') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->nome_da_mae }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.nome_do_pai') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->nome_do_pai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.sexo') }}
                        </th>
                        <td>
                            {{ App\Models\ObitosGaveta::SEXO_SELECT[$obitosGaveta->sexo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.cor_raca') }}
                        </th>
                        <td>
                            {{ App\Models\ObitosGaveta::COR_RACA_SELECT[$obitosGaveta->cor_raca] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.certidao_de_obito') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->certidao_de_obito }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.causa_da_morte') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->causa_da_morte }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.naturalidade') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->naturalidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.estado') }}
                        </th>
                        <td>
                            {{ App\Models\ObitosGaveta::ESTADO_SELECT[$obitosGaveta->estado] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.cidade') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->cidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.bairro') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->bairro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.rua') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->rua }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.numero') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->numero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.anexos') }}
                        </th>
                        <td>
                            @foreach($obitosGaveta->anexos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.observacoes') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->observacoes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Por:
                        </th>
                        <td>
                            {{ $obitosGaveta->assinatura->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.created_at') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obitosGaveta.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $obitosGaveta->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.obitos-gavetas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
