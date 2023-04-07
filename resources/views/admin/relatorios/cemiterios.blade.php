@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Relatórios de Cemitérios
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-relatorios">
                <thead>
                    <tr>
                        <th width="10"> </th>
                        <th>
                            {{ trans('cruds.cemiterio.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.cemiterio.fields.estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.cemiterio.fields.cidade') }}
                        </th>
                        <th>
                            {{ trans('cruds.cemiterio.fields.bairro') }}
                        </th>
                        <th>
                            {{ trans('cruds.cemiterio.fields.rua') }}
                        </th>
                        <th>
                            {{ trans('cruds.cemiterio.fields.numero') }}
                        </th>
                        <th>
                            {{ trans('cruds.cemiterio.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.cemiterio.fields.numero_de_contato') }}
                        </th>
                        <th>
                            {{ trans('cruds.cemiterio.fields.assinatura') }}
                        </th>
                        <th>
                            {{ trans('cruds.cemiterio.fields.created_at') }}
                        </th>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Cemiterio::ESTADO_SELECT as $key => $item)
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
                    @foreach($cemiterios as $key => $cemiterio)
                        <tr data-entry-id="{{ $cemiterio->id }}">
                            <td> </td>
                            <td>
                              {{ $cemiterio->nome ?? '' }}
                          </td>
                          <td>
                              {{ App\Models\Cemiterio::ESTADO_SELECT[$cemiterio->estado] ?? '' }}
                          </td>
                          <td>
                              {{ $cemiterio->cidade ?? '' }}
                          </td>
                          <td>
                              {{ $cemiterio->bairro ?? '' }}
                          </td>
                          <td>
                              {{ $cemiterio->rua ?? '' }}
                          </td>
                          <td>
                              {{ $cemiterio->numero ?? '' }}
                          </td>
                          <td>
                              {{ $cemiterio->email ?? '' }}
                          </td>
                          <td>
                              {{ $cemiterio->numero_de_contato ?? '' }}
                          </td>
                          <td>
                              {{ $cemiterio->assinatura->name ?? '' }}
                          </td>
                          <td>
                              {{ $cemiterio->created_at ?? '' }}
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
