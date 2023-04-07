@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Relatórios de Lotes
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-relatorios">
                <thead>
                    <tr>
                        <th width="10"> </th>
                        <th>
                            {{ trans('cruds.lote.fields.cemiterio') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.setor') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.quadra') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.tipo_de_lote') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.comprimento') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.altura') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.indentificacao') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.lote_vazio') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.reservado') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.assinatura') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.created_at') }}
                        </th>
                    </tr>
                    <tr>
                        <td> </td>
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
                                    <option value="{{ $item->indentificacao }}">{{ $item->indentificacao }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($quadras as $key => $item)
                                    <option value="{{ $item->indentificacao }}">{{ $item->indentificacao }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Lote::TIPO_DE_LOTE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                          <select class="search" strict="true">
                              <option value>{{ trans('global.all') }}</option>
                              <option value="Sim"> Sim </option>
                              <option value="Não"> Não </option>
                          </select>
                        </td>
                        <td>
                          <select class="search" strict="true">
                              <option value>{{ trans('global.all') }}</option>
                              <option value="Sim"> Sim </option>
                              <option value="Não"> Não </option>
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
                  @foreach($lotes as $key => $lote)
                        <tr data-entry-id="{{ $lote->id }}">
                            <td> </td>
                            <td>
                                {{ $lote->cemiterio->nome ?? '' }}
                            </td>
                            <td>
                                {{ $lote->setor->indentificacao ?? '' }}
                            </td>
                            <td>
                                {{ $lote->quadra->indentificacao ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Lote::TIPO_DE_LOTE_SELECT[$lote->tipo_de_lote] ?? '' }}
                            </td>
                            <td>
                                {{ $lote->comprimento ?? '' }}
                            </td>
                            <td>
                                {{ $lote->altura ?? '' }}
                            </td>
                            <td>
                                {{ $lote->indentificacao ?? '' }}
                            </td>
                            <td>
                                {{ $lote->lote_vazio ?? '' }}
                            </td>
                            <td>
                                {{ $lote->reservado ?? '' }}
                            </td>
                            <td>
                                {{ $lote->assinatura->name ?? '' }}
                            </td>
                            <td>
                                {{ $lote->created_at ?? '' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ url('resources/relatorios/lotes.css') }}">

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
