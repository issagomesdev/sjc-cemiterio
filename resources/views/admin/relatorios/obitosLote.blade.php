@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Relatórios de Óbitos em Lotes
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-relatorios">
                <thead>
                    <tr>
                        <th width="10"> </th>
                        <th>
                            {{ trans('cruds.obito.fields.responsavel') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.cemiterio') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.setor') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.quadra') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.lote') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.numero_dam') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.ano_dam') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.nome_do_falecido') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.data_de_nascimento') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.data_de_falecimento') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.data_de_sepultamento') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.nome_da_mae') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.nome_do_pai') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.sexo') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.cor_raca') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.certidao_de_obito') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.causa_da_morte') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.naturalidade') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.cidade') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.bairro') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.rua') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.numero') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.situacao') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.assinatura') }}
                        </th>
                        <th>
                            {{ trans('cruds.obito.fields.created_at') }}
                        </th>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($responsaveis as $key => $item)
                                    <option value="{{ $item->nome }}">{{ $item->nome }}</option>
                                @endforeach
                            </select>
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
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Obito::SEXO_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Obito::COR_RACA_SELECT as $key => $item)
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
                                @foreach(App\Models\Obito::ESTADO_SELECT as $key => $item)
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
                          <select class="search" strict="true">
                              <option value>{{ trans('global.all') }}</option>
                              <option value="Ativo"> Ativo </option>
                              <option value="Transferido"> Transferido </option>
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
                  @foreach($obitos as $key => $obito)
                      <tr data-entry-id="{{ $obito->id }}">
                          <td>

                          </td>
                          <td>
                              {{ $obito->responsavel->nome ?? '' }}
                          </td>
                          <td>
                              {{ $obito->cemiterio->nome ?? '' }}
                          </td>
                          <td>
                              {{ $obito->setor->indentificacao ?? '' }}
                          </td>
                          <td>
                              {{ $obito->quadra->indentificacao ?? '' }}
                          </td>
                          <td>
                              {{ $obito->lote->indentificacao ?? '' }}
                          </td>
                          <td>
                              {{ $obito->numero_dam ?? '' }}
                          </td>
                          <td>
                              {{ $obito->ano_dam ?? '' }}
                          </td>
                          <td>
                              {{ $obito->nome_do_falecido ?? '' }}
                          </td>
                          <td>
                              {{ $obito->data_de_nascimento ?? '' }}
                          </td>
                          <td>
                              {{ $obito->data_de_falecimento ?? '' }}
                          </td>
                          <td>
                              {{ $obito->data_de_sepultamento ?? '' }}
                          </td>
                          <td>
                              {{ $obito->nome_da_mae ?? '' }}
                          </td>
                          <td>
                              {{ $obito->nome_do_pai ?? '' }}
                          </td>
                          <td>
                              {{ App\Models\Obito::SEXO_SELECT[$obito->sexo] ?? '' }}
                          </td>
                          <td>
                              {{ App\Models\Obito::COR_RACA_SELECT[$obito->cor_raca] ?? '' }}
                          </td>
                          <td>
                              {{ $obito->certidao_de_obito ?? '' }}
                          </td>
                          <td>
                              {{ $obito->causa_da_morte ?? '' }}
                          </td>
                          <td>
                              {{ $obito->naturalidade ?? '' }}
                          </td>
                          <td>
                              {{ App\Models\Obito::ESTADO_SELECT[$obito->estado] ?? '' }}
                          </td>
                          <td>
                              {{ $obito->cidade ?? '' }}
                          </td>
                          <td>
                              {{ $obito->bairro ?? '' }}
                          </td>
                          <td>
                              {{ $obito->rua ?? '' }}
                          </td>
                          <td>
                              {{ $obito->numero ?? '' }}
                          </td>
                          <td>
                              {{ $obito->situacao ?? '' }}
                          </td>
                          <td>
                              {{ $obito->assinatura->name ?? '' }}
                          </td>
                          <td>
                              {{ $obito->created_at ?? '' }}
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
