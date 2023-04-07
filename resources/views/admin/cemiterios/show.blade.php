@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Visualizar Cemitério
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cemiterios.index') }}">
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
                      <th style="background-color: white;">
                        @if($cemiterio->foto_do_cemiterio)
                            <a href="{{ $cemiterio->foto_do_cemiterio->getUrl() }}" target="_blank" style="display: inline-block">
                                <img src="{{ $cemiterio->foto_do_cemiterio->getUrl() }}" style=" width: 600px; height: auto;">
                            </a>
                            @else
                            <a href="{{ url('null/nullphoto.png') }}" target="_blank" style="display: inline-block">
                                <img src="{{ url('null/nullphoto.png') }}" style=" width: 200px; height: auto;">
                            </a>
                        @endif
                   </th>
                    <td style="background-color: white;"> </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.id') }}
                        </th>
                        <td>
                            {{ $cemiterio->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.nome') }}
                        </th>
                        <td>
                            {{ $cemiterio->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.estado') }}
                        </th>
                        <td>
                            {{ App\Models\Cemiterio::ESTADO_SELECT[$cemiterio->estado] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.cidade') }}
                        </th>
                        <td>
                            {{ $cemiterio->cidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.bairro') }}
                        </th>
                        <td>
                            {{ $cemiterio->bairro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.rua') }}
                        </th>
                        <td>
                            {{ $cemiterio->rua }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.numero') }}
                        </th>
                        <td>
                            {{ $cemiterio->numero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.complemento') }}
                        </th>
                        <td>
                            {{ $cemiterio->complemento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.email') }}
                        </th>
                        <td>
                            {{ $cemiterio->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.numero_de_contato') }}
                        </th>
                        <td>
                            {{ $cemiterio->numero_de_contato }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.numero_de_contato_2') }}
                        </th>
                        <td>
                            {{ $cemiterio->numero_de_contato_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.observacoes') }}
                        </th>
                        <td>
                            {{ $cemiterio->observacoes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.assinatura') }}
                        </th>
                        <td>
                            {{ $cemiterio->assinatura->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.created_at') }}
                        </th>
                        <td>
                            {{ $cemiterio->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cemiterio.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $cemiterio->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cemiterios.index') }}">
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
