@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Visualizar Transferência
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.para-gavetas.index') }}">
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
                            {{ trans('cruds.paraGaveta.fields.id') }}
                        </th>
                        <td>
                            {{ $paraGaveta->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.responsavel') }}
                        </th>
                        <td>
                            {{ $paraGaveta->responsavel_nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.falecido') }}
                        </th>
                        <td>
                            {{ $paraGaveta->falecido_nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.cemiterio') }}
                        </th>
                        <td>
                            {{ $paraGaveta->cemiterio->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.setor') }}
                        </th>
                        <td>
                            {{ $paraGaveta->setor->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.quadra') }}
                        </th>
                        <td>
                            {{ $paraGaveta->quadra->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.lote') }}
                        </th>
                        <td>
                            {{ $paraGaveta->lote->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.cemiterio_destino') }}
                        </th>
                        <td>
                            {{ $paraGaveta->cemiterio_destino->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.ossuario_destino') }}
                        </th>
                        <td>
                            {{ $paraGaveta->ossuario_destino->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.gaveta_destino') }}
                        </th>
                        <td>
                            {{ $paraGaveta->gaveta_destino->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.data_de_transferencia') }}
                        </th>
                        <td>
                            {{ $paraGaveta->data_de_transferencia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.observacoes') }}
                        </th>
                        <td>
                            {{ $paraGaveta->observacoes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Por:
                        </th>
                        <td>
                            {{ $paraGaveta->assinatura->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.created_at') }}
                        </th>
                        <td>
                            {{ $paraGaveta->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $paraGaveta->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.para-gavetas.index') }}">
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
