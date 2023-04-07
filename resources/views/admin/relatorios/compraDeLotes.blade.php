@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Relatórios de Compras de Lotes
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-relatorios">
                <thead>
                    <tr>
                        <th width="10"> </th>
                        <th>
                            {{ trans('cruds.compraDeLote.fields.responsavel') }}
                        </th>
                        <th>
                            {{ trans('cruds.compraDeLote.fields.numero_dam') }}
                        </th>
                        <th>
                            {{ trans('cruds.compraDeLote.fields.ano_dam') }}
                        </th>
                        <th>
                            {{ trans('cruds.compraDeLote.fields.data_da_aquisicao') }}
                        </th>
                        <th>
                            {{ trans('cruds.compraDeLote.fields.assinatura') }}
                        </th>
                        <th>
                            {{ trans('cruds.compraDeLote.fields.created_at') }}
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
                          <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
                  @foreach($compraDeLotes as $key => $compraDeLote)
                      <tr data-entry-id="{{ $compraDeLote->id }}">
                          <td>

                          </td>
                          <td>
                              {{ $compraDeLote->responsavel->nome ?? '' }}
                          </td>
                          <td>
                              {{ $compraDeLote->numero_dam ?? '' }}
                          </td>
                          <td>
                              {{ $compraDeLote->ano_dam ?? '' }}
                          </td>
                          <td>
                              {{ $compraDeLote->data_da_aquisicao ?? '' }}
                          </td>
                          <td>
                              {{ $compraDeLote->assinatura->name ?? '' }}
                          </td>
                          <td>
                              {{ $compraDeLote->created_at ?? '' }}
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
