@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Visualizar Responsável
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.responsaveis.index') }}">
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
                            {{ trans('cruds.responsavel.fields.id') }}
                        </th>
                        <td>
                            {{ $responsaveis->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.nome') }}
                        </th>
                        <td>
                            {{ $responsaveis->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.parentesco') }}
                        </th>
                        <td>
                            {{ App\Models\Responsavel::PARENTESCO_SELECT[$responsaveis->parentesco] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.sexo') }}
                        </th>
                        <td>
                            {{ App\Models\Responsavel::SEXO_SELECT[$responsaveis->sexo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            CPF/CNPJ
                        </th>
                        <td>
                            {{ $responsaveis->cpf_cnpj }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.estado') }}
                        </th>
                        <td>
                            {{ App\Models\Responsavel::ESTADO_SELECT[$responsaveis->estado] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.cidade') }}
                        </th>
                        <td>
                            {{ $responsaveis->cidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.bairro') }}
                        </th>
                        <td>
                            {{ $responsaveis->bairro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.rua') }}
                        </th>
                        <td>
                            {{ $responsaveis->rua }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.numero') }}
                        </th>
                        <td>
                            {{ $responsaveis->numero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.complemento') }}
                        </th>
                        <td>
                            {{ $responsaveis->complemento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.email') }}
                        </th>
                        <td>
                            {{ $responsaveis->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.numero_de_contato') }}
                        </th>
                        <td>
                            {{ $responsaveis->numero_de_contato }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.numero_de_contato_2') }}
                        </th>
                        <td>
                            {{ $responsaveis->numero_de_contato_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.observacoes') }}
                        </th>
                        <td>
                            {{ $responsaveis->observacoes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Por:
                        </th>
                        <td>
                            {{ $responsaveis->assinatura->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.created_at') }}
                        </th>
                        <td>
                            {{ $responsaveis->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavel.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $responsaveis->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.responsaveis.index') }}">
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
