@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Relatórios de Transferências Entre Lotes
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-relatorios">
                <thead>
                    <tr>
                      <th width="10"> </th>
                      <th>
                          {{ trans('cruds.entreLote.fields.responsavel') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreLote.fields.falecido') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreLote.fields.cemiterio') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreLote.fields.setor') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreLote.fields.quadra') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreLote.fields.lote') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreLote.fields.tipo_de_destino') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreLote.fields.destino') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreLote.fields.data_de_transferencia') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreLote.fields.assinatura') }}
                      </th>
                      <th>
                          {{ trans('cruds.entreLote.fields.created_at') }}
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
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($lotes as $key => $item)
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
                  @foreach($entreLotes as $key => $entreLote)
                      <tr data-entry-id="{{ $entreLote->id }}">
                          <td> </td>
                          <td>
                              {{ $entreLote->responsavel->nome ?? '' }}
                          </td>
                          <td>
                              {{ $entreLote->falecido->nome_do_falecido ?? '' }}
                          </td>
                          <td>
                              {{ $entreLote->cemiterio->nome ?? '' }}
                          </td>
                          <td>
                              {{ $entreLote->setor->indentificacao ?? '' }}
                          </td>
                          <td>
                              {{ $entreLote->quadra->indentificacao ?? '' }}
                          </td>
                          <td>
                              {{ $entreLote->lote->indentificacao ?? '' }}
                          </td>
                          <td>
                              {{ App\Models\EntreLote::TIPO_DE_DESTINO_RADIO[$entreLote->tipo_de_destino] ?? '' }}
                          </td>
                          <td>
                              @if($entreLote->tipo_de_destino == 'Externo') {{ $entreLote->destino ?? '' }}
                              @elseif($entreLote->tipo_de_destino == 'Interno') {{ $entreLote->cemiterio_destino->nome ?? '' }} -
                              {{ $entreLote->setor_destino->indentificacao ?? '' }} -
                              {{ $entreLote->quadra_destino->indentificacao ?? '' }} -
                              {{ $entreLote->lote_destino->indentificacao ?? '' }}
                              @endif
                          </td>
                          </td>
                          <td>
                              {{ $entreLote->data_de_transferencia ?? '' }}
                          </td>
                          <td>
                              {{ $entreLote->assinatura->name ?? '' }}
                          </td>
                          <td>
                              {{ $entreLote->created_at ?? '' }}
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
