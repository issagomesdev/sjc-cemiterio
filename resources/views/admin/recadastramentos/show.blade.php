@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Visualizar Recadastramento
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.recadastramentos.index') }}">
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
                            {{ trans('cruds.recadastramento.fields.id') }}
                        </th>
                        <td>
                            {{ $recadastramento->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.cemiterio') }}
                        </th>
                        <td>
                            {{ $recadastramento->cemiterio->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.setor') }}
                        </th>
                        <td>
                            {{ $recadastramento->setor->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.quadra') }}
                        </th>
                        <td>
                            {{ $recadastramento->quadra->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.lote') }}
                        </th>
                        <td>
                            {{ $recadastramento->lote->indentificacao ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.nome_do_falecido') }}
                        </th>
                        <td>
                            {{ $recadastramento->nome_do_falecido }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.data_de_nascimento') }}
                        </th>
                        <td>
                            {{ $recadastramento->data_de_nascimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.data_de_falecimento') }}
                        </th>
                        <td>
                            {{ $recadastramento->data_de_falecimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.data_de_sepultamento') }}
                        </th>
                        <td>
                            {{ $recadastramento->data_de_sepultamento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.nome_da_mae') }}
                        </th>
                        <td>
                            {{ $recadastramento->nome_da_mae }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.nome_do_pai') }}
                        </th>
                        <td>
                            {{ $recadastramento->nome_do_pai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.sexo') }}
                        </th>
                        <td>
                            {{ App\Models\Recadastramento::SEXO_SELECT[$recadastramento->sexo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.cor_raca') }}
                        </th>
                        <td>
                            {{ App\Models\Recadastramento::COR_RACA_SELECT[$recadastramento->cor_raca] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.certidao_de_obito') }}
                        </th>
                        <td>
                            {{ $recadastramento->certidao_de_obito }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.causa_da_morte') }}
                        </th>
                        <td>
                            {{ $recadastramento->causa_da_morte }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.naturalidade') }}
                        </th>
                        <td>
                            {{ $recadastramento->naturalidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.estado') }}
                        </th>
                        <td>
                            {{ App\Models\Recadastramento::ESTADO_SELECT[$recadastramento->estado] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.cidade') }}
                        </th>
                        <td>
                            {{ $recadastramento->cidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.bairro') }}
                        </th>
                        <td>
                            {{ $recadastramento->bairro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.rua') }}
                        </th>
                        <td>
                            {{ $recadastramento->rua }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.numero') }}
                        </th>
                        <td>
                            {{ $recadastramento->numero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.anexos') }}
                        </th>
                        <td>
                          @if(is_countable($recadastramento->anexos) && count($recadastramento->anexos) > 0)
                          <ul>
                            @foreach($recadastramento->anexos as $key => $media)
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
                            {{ trans('cruds.recadastramento.fields.observacoes') }}
                        </th>
                        <td>
                            {{ $recadastramento->observacoes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Por:
                        </th>
                        <td>
                            {{ $recadastramento->assinatura->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.created_at') }}
                        </th>
                        <td>
                            {{ $recadastramento->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadastramento.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $recadastramento->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.recadastramentos.index') }}">
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
