@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Visualizar Óbito em Setor
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.obitos-lotes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table id="example" class="table table-striped table-hover table-bordered">
              <thead>
                  <tr>
                    <th class="sorting sorting_desc" tabindex="0" aria-controls="export" rowspan="1" colspan="1" aria-label=" " style="width: 100%;" aria-sort="none"> </th>
                    <th class="sorting sorting_desc" tabindex="0" aria-controls="export" rowspan="1" colspan="1" aria-label=" " style="width: 100%;" aria-sort="none"> </th>
                  </tr>
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.id') }}
                        </th>
                        <td>
                            {{ $obito->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.responsavel') }}
                        </th>
                        <td>
                            {{ $obito->responsavel->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.cemiterio') }}
                        </th>
                        <td>
                            {{ $obito->cemiterio->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.setor') }}
                        </th>
                        <td>
                            {{ $obito->setor->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.quadra') }}
                        </th>
                        <td>
                            {{ $obito->quadra->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.lote') }}
                        </th>
                        <td>
                            {{ $obito->lote->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.numero_dam') }}
                        </th>
                        <td>
                            {{ $obito->numero_dam }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.ano_dam') }}
                        </th>
                        <td>
                            {{ $obito->ano_dam }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.nome_do_falecido') }}
                        </th>
                        <td>
                            {{ $obito->nome_do_falecido }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.data_de_nascimento') }}
                        </th>
                        <td>
                            {{ $obito->data_de_nascimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.data_de_falecimento') }}
                        </th>
                        <td>
                            {{ $obito->data_de_falecimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.data_de_sepultamento') }}
                        </th>
                        <td>
                            {{ $obito->data_de_sepultamento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.nome_da_mae') }}
                        </th>
                        <td>
                            {{ $obito->nome_da_mae }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.nome_do_pai') }}
                        </th>
                        <td>
                            {{ $obito->nome_do_pai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.sexo') }}
                        </th>
                        <td>
                            {{ App\Models\Obito::SEXO_SELECT[$obito->sexo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.cor_raca') }}
                        </th>
                        <td>
                            {{ App\Models\Obito::COR_RACA_SELECT[$obito->cor_raca] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.certidao_de_obito') }}
                        </th>
                        <td>
                            {{ $obito->certidao_de_obito }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.causa_da_morte') }}
                        </th>
                        <td>
                            {{ $obito->causa_da_morte }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.naturalidade') }}
                        </th>
                        <td>
                            {{ $obito->naturalidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.estado') }}
                        </th>
                        <td>
                            {{ App\Models\Obito::ESTADO_SELECT[$obito->estado] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.cidade') }}
                        </th>
                        <td>
                            {{ $obito->cidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.bairro') }}
                        </th>
                        <td>
                            {{ $obito->bairro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.rua') }}
                        </th>
                        <td>
                            {{ $obito->rua }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.numero') }}
                        </th>
                        <td>
                            {{ $obito->numero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.anexos') }}
                        </th>
                        <td>
                            @if(is_countable($obito->anexos) && count($obito->anexos) > 0)
                            <ul>
                              @foreach($obito->anexos as $key => $media)
                                <li> <a href="{{ $media->getUrl() }}" target="_blank"> {{ $media->file_name }} </a> </li>
                              @endforeach
                              </ul>
                              @else
                              Não há arquivos relacionados a esse registro
                              @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.observacoes') }}
                        </th>
                        <td>
                            {{ $obito->observacoes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Situação
                        </th>
                        <td>
                            {{ $obito->situacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Por
                        </th>
                        <td>
                            {{ $obito->assinatura->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.created_at') }}
                        </th>
                        <td>
                            {{ $obito->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.obito.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $obito->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.obitos-lotes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <script>

    $(document).ready( function() {
$('#example').dataTable( {

"lengthMenu": [[ -1, 10, 25, 50], ["All", 10, 25, 50]],
dom: 'B',
order: [],
buttons: [

        {
            extend: 'copy',
            text: 'Copiar'
        },

        {
            extend: 'excel',
            text: 'Excel'
        },

        {
            extend: 'csv',
            text: 'CSV'
        },

        {
            extend: 'pdf',
            text: 'PDF'
        },

        {
            extend: 'print',
            text: 'Imprimir',
            autoPrint: true
        }
    ],
} );
} );

$(document).ready(function() {
var oTable = $('#example').dataTable();

// Highlight every second row
oTable.$('oOpts.order=current');
} );



</script>

<style>

table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
    padding: 10px;
    opacity: 0; }

  table.dataTable.no-footer {
    border-bottom:1px solid #d8dbe0; }

    .dataTables_filter {
      display: none; }


.table-bordered, .table-bordered td, .table-bordered th {
border: 1px solid;
border-color: #ffffff;
}


input.chk {
    margin: 10px;
    width: 50px;
    height: 16px;
}

td {
    width: 50%;
}

</style>

@endsection
