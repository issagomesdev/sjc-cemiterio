@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Relatórios de Ossuários 
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-relatorios">
                <thead>
                    <tr>
                        <th width="10"> </th>
                        <th>
                           {{ trans('cruds.ossuario.fields.cemiterio') }}
                       </th>
                       <th>
                           {{ trans('cruds.ossuario.fields.indentificacao') }}
                       </th>
                       <th>
                           {{ trans('cruds.ossuario.fields.assinatura') }}
                       </th>
                       <th>
                           {{ trans('cruds.ossuario.fields.created_at') }}
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
                  @foreach($ossuarios as $key => $ossuario)
                      <tr data-entry-id="{{ $ossuario->id }}">
                          <td>

                          </td>
                          <td>
                              {{ $ossuario->cemiterio->nome ?? '' }}
                          </td>
                          <td>
                              {{ $ossuario->indentificacao ?? '' }}
                          </td>
                          <td>
                              {{ $ossuario->assinatura->name ?? '' }}
                          </td>
                          <td>
                              {{ $ossuario->created_at ?? '' }}
                          </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ url('resources/relatorios/ossuarios.css') }}">

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
