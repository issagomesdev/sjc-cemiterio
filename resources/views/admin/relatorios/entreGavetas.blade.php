@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Relatórios de Transferências Entre Gavetas
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-relatorios">
                <thead>
                    <tr>
                      <th width="10"> </th>
                      <th>
                          {{ trans('cruds.entreGaveta.fields.responsavel') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreGaveta.fields.falecido') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreGaveta.fields.cemiterio') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreGaveta.fields.ossuario') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreGaveta.fields.gaveta') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreGaveta.fields.tipo_de_destino') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreGaveta.fields.destino') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreGaveta.fields.data_de_transferencia') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreGaveta.fields.assinatura') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreGaveta.fields.created_at') }}
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\EntreLote::TIPO_DE_DESTINO_RADIO as $key => $item)
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
                      </tr>
                </thead>
                <tbody>
                  @foreach($entreGavetas as $key => $entreGaveta)
                      <tr data-entry-id="{{ $entreGaveta->id }}">
                          <td> </td>
                          <td>
                              {{ $entreGaveta->responsavel->nome ?? '' }}
                          </td>
                          <td>
                              {{ $entreGaveta->falecido->nome_do_falecido ?? '' }}
                          </td>
                          <td>
                              {{ $entreGaveta->cemiterio->nome ?? '' }}
                          </td>
                          <td>
                              {{ $entreGaveta->ossuario->indentificacao ?? '' }}
                          </td>
                          <td>
                              {{ $entreGaveta->gaveta->indentificacao ?? '' }}
                          </td>
                          <td>
                              {{ App\Models\EntreGaveta::TIPO_DE_DESTINO_RADIO[$entreGaveta->tipo_de_destino] ?? '' }}
                          </td>
                          <td>
                              @if($entreGaveta->tipo_de_destino == 'Externo') {{ $entreGaveta->destino ?? '' }}
                              @elseif($entreGaveta->tipo_de_destino == 'Interno') {{ $entreGaveta->cemiterio_de_destino->nome ?? '' }} -
                              {{ $entreGaveta->ossuario_de_destino->indentificacao ?? '' }} -
                              {{ $entreGaveta->gaveta_de_destino->indentificacao ?? '' }}
                              @endif
                          </td>
                          </td>
                          <td>
                              {{ $entreGaveta->data_de_transferencia ?? '' }}
                          </td>
                          <td>
                              {{ $entreGaveta->assinatura->name ?? '' }}
                          </td>
                          <td>
                              {{ $entreGaveta->created_at ?? '' }}
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
