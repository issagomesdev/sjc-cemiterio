@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Relatórios de Transferências Para Gavetas
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-relatorios">
                <thead>
                    <tr>
                        <th width="10"> </th>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.responsavel') }}
                        </th>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.falecido') }}
                        </th>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.cemiterio') }}
                        </th>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.setor') }}
                        </th>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.quadra') }}
                        </th>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.lote') }}
                        </th>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.data_de_transferencia') }}
                        </th>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.cemiterio_destino') }}
                        </th>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.ossuario_destino') }}
                        </th>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.gaveta_destino') }}
                        </th>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.assinatura') }}
                        </th>
                        <th>
                            {{ trans('cruds.paraGaveta.fields.created_at') }}
                        </th>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                          <select class="search">
                              <option value>{{ trans('global.all') }}</option>
                              @foreach($cemiterios as $key => $item)
                                  <option value="{{ $item->nome }}">{{ $item->nome }}</option>
                              @endforeach
                          </select>
                        </td>
                        <td>
                          <select class="search">
                              <option value>{{ trans('global.all') }}</option>
                              @foreach($setores as $key => $item)
                                  <option value="{{ $item->nome }}">{{ $item->nome }}</option>
                              @endforeach
                          </select>
                        </td>
                        <td>
                          <select class="search">
                              <option value>{{ trans('global.all') }}</option>
                              @foreach($quadras as $key => $item)
                                  <option value="{{ $item->nome }}">{{ $item->nome }}</option>
                              @endforeach
                          </select>
                        </td>
                        <td>
                          <select class="search">
                              <option value>{{ trans('global.all') }}</option>
                              @foreach($lotes as $key => $item)
                                  <option value="{{ $item->nome }}">{{ $item->nome }}</option>
                              @endforeach
                          </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                          <select class="search">
                              <option value>{{ trans('global.all') }}</option>
                              @foreach($cemiterios as $key => $item)
                                  <option value="{{ $item->nome }}">{{ $item->nome }}</option>
                              @endforeach
                          </select>
                        </td>
                        <td>
                          <select class="search">
                              <option value>{{ trans('global.all') }}</option>
                              @foreach($ossuarios as $key => $item)
                                  <option value="{{ $item->indentificacao }}">{{ $item->indentificacao }}</option>
                              @endforeach
                          </select>
                        </td>
                        <td>
                          <select class="search">
                              <option value>{{ trans('global.all') }}</option>
                              @foreach($gaveta as $key => $item)
                                  <option value="{{ $item->indentificacao }}">{{ $item->indentificacao }}</option>
                              @endforeach
                          </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                     </tr>
                </thead>
                <tbody>
                    @foreach($paraGavetas as $key => $paraGaveta)
                        <tr data-entry-id="{{ $paraGaveta->id }}">
                            <td> </td>
                            <td>
                              {{ $paraGaveta->responsavel_nome ?? '' }}
                          </td>
                          <td>
                              {{ $paraGaveta->falecido_nome ?? '' }}
                          </td>
                          <td>
                              {{ $paraGaveta->cemiterio->nome ?? '' }}
                          </td>
                          <td>
                              {{ $paraGaveta->setor->indentificacao ?? '' }}
                          </td>
                          <td>
                              {{ $paraGaveta->quadra->indentificacao ?? '' }}
                          </td>
                          <td>
                              {{ $paraGaveta->lote->indentificacao ?? '' }}
                          </td>
                          <td>
                              {{ $paraGaveta->data_de_transferencia ?? '' }}
                          </td>
                          <td>
                              {{ $paraGaveta->cemiterio_destino->nome ?? '' }}
                          </td>
                          <td>
                              {{ $paraGaveta->ossuario_destino->indentificacao ?? '' }}
                          </td>
                          <td>
                              {{ $paraGaveta->gaveta_destino->indentificacao ?? '' }}
                          </td>
                          <td>
                              {{ $paraGaveta->assinatura->name ?? '' }}
                          </td>
                          <td>
                              {{ $paraGaveta->created_at ?? '' }}
                          </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ url('resources/relatorios/cemiterios.css') }}">

@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-relatorios:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection
