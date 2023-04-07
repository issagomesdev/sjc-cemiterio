@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Visualizar Transferência
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.entre-lotes.index') }}">
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
                            {{ trans('cruds.entreLote.fields.id') }}
                        </th>
                        <td>
                            {{ $entreLote->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.responsavel') }}
                        </th>
                        <td>
                            {{ $entreLote->responsavel_nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.falecido') }}
                        </th>
                        <td>
                            {{ $entreLote->falecido_nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.cemiterio') }}
                        </th>
                        <td>
                            {{ $entreLote->cemiterio->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.setor') }}
                        </th>
                        <td>
                            {{ $entreLote->setor->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.quadra') }}
                        </th>
                        <td>
                            {{ $entreLote->quadra->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.lote') }}
                        </th>
                        <td>
                            {{ $entreLote->lote->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.tipo_de_destino') }}
                        </th>
                        <td>
                            {{ App\Models\EntreLote::TIPO_DE_DESTINO_RADIO[$entreLote->tipo_de_destino] ?? '' }}
                        </td>
                    </tr>
                    @if($entreLote->tipo_de_destino == 'Externo')
                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.destino') }}
                        </th>
                        <td>
                            {{ $entreLote->destino }}
                        </td>
                    </tr>
                    @else
                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.cemiterio_destino') }}
                        </th>
                        <td>
                            {{ $entreLote->cemiterio_destino->nome ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.setor_destino') }}
                        </th>
                        <td>
                            {{ $entreLote->setor_destino->indentificacao ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.quadra_destino') }}
                        </th>
                        <td>
                            {{ $entreLote->quadra_destino->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.lote_destino') }}
                        </th>
                        <td>
                            {{ $entreLote->lote_destino->indentificacao ?? '' }}
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.data_de_transferencia') }}
                        </th>
                        <td>
                            {{ $entreLote->data_de_transferencia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.observacoes') }}
                        </th>
                        <td>
                            {{ $entreLote->observacoes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Por:
                        </th>
                        <td>
                            {{ $entreLote->assinatura->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.created_at') }}
                        </th>
                        <td>
                            {{ $entreLote->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreLote.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $entreLote->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.entre-lotes.index') }}">
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
