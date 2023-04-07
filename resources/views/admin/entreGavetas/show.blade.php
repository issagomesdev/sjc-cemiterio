@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Visualizar Transferência
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.entre-gavetas.index') }}">
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
                            {{ trans('cruds.entreGaveta.fields.id') }}
                        </th>
                        <td>
                            {{ $EntreGaveta->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreGaveta.fields.responsavel') }}
                        </th>
                        <td>
                            {{ $EntreGaveta->responsavel_nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreGaveta.fields.falecido') }}
                        </th>
                        <td>
                            {{ $EntreGaveta->falecido_nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreGaveta.fields.cemiterio') }}
                        </th>
                        <td>
                            {{ $EntreGaveta->cemiterio->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreGaveta.fields.ossuario') }}
                        </th>
                        <td>
                            {{ $EntreGaveta->ossuario->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreGaveta.fields.gaveta') }}
                        </th>
                        <td>
                            {{ $EntreGaveta->gaveta->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreGaveta.fields.tipo_de_destino') }}
                        </th>
                        <td>
                            {{ App\Models\EntreGaveta::TIPO_DE_DESTINO_RADIO[$EntreGaveta->tipo_de_destino] ?? '' }}
                        </td>
                    </tr>
                    @if($EntreGaveta->tipo_de_destino == 'Externo')
                    <tr>
                        <th>
                            {{ trans('cruds.entreGaveta.fields.destino') }}
                        </th>
                        <td>
                            {{ $EntreGaveta->destino }}
                        </td>
                    </tr>
                    @else
                    <tr>
                        <th>
                            {{ trans('cruds.entreGaveta.fields.cemiterio_de_destino') }}
                        </th>
                        <td>
                            {{ $EntreGaveta->cemiterio_de_destino->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreGaveta.fields.ossuario_de_destino') }}
                        </th>
                        <td>
                            {{ $EntreGaveta->ossuario_de_destino->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreGaveta.fields.gaveta_de_destino') }}
                        </th>
                        <td>
                            {{ $EntreGaveta->gaveta_de_destino->indentificacao ?? '' }}
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <th>
                            {{ trans('cruds.entreGaveta.fields.data_de_transferencia') }}
                        </th>
                        <td>
                            {{ $EntreGaveta->data_de_transferencia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreGaveta.fields.observacoes') }}
                        </th>
                        <td>
                            {{ $EntreGaveta->observacoes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Por:
                        </th>
                        <td>
                            {{ $EntreGaveta->assinatura->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreGaveta.fields.created_at') }}
                        </th>
                        <td>
                            {{ $EntreGaveta->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entreGaveta.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $EntreGaveta->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.entre-gavetas.index') }}">
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
