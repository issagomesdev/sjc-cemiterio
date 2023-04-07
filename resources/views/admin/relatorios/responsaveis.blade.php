@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Relatórios de Responsáveis
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-relatorios">
                <thead>
                    <tr>
                        <th width="10"> </th>
                        <th>
                            {{ trans('cruds.responsavel.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavel.fields.parentesco') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavel.fields.sexo') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavel.fields.cnpj') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavel.fields.estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavel.fields.cidade') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavel.fields.bairro') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavel.fields.rua') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavel.fields.numero') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavel.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavel.fields.numero_de_contato') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavel.fields.assinatura') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavel.fields.created_at') }}
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
                                @foreach(App\Models\Responsavel::PARENTESCO_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Responsavel::SEXO_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Responsavel::ESTADO_SELECT as $key => $item)
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
                  @foreach($responsaveis as $key => $responsavel)
                       <tr data-entry-id="{{ $responsavel->id }}">
                           <td>

                           </td>
                           <td>
                               {{ $responsavel->nome ?? '' }}
                           </td>
                           <td>
                               {{ App\Models\Responsavel::PARENTESCO_SELECT[$responsavel->parentesco] ?? '' }}
                           </td>
                           <td>
                               {{ App\Models\Responsavel::SEXO_SELECT[$responsavel->sexo] ?? '' }}
                           </td>
                           <td>
                               {{ $responsavel->cpf_cnpj ?? '' }}
                           </td>
                           <td>
                               {{ App\Models\Responsavel::ESTADO_SELECT[$responsavel->estado] ?? '' }}
                           </td>
                           <td>
                               {{ $responsavel->cidade ?? '' }}
                           </td>
                           <td>
                               {{ $responsavel->bairro ?? '' }}
                           </td>
                           <td>
                               {{ $responsavel->rua ?? '' }}
                           </td>
                           <td>
                               {{ $responsavel->numero ?? '' }}
                           </td>
                           <td>
                               {{ $responsavel->email ?? '' }}
                           </td>
                           <td>
                               {{ $responsavel->numero_de_contato ?? '' }}
                           </td>
                           <td>
                               {{ $responsavel->assinatura->name ?? '' }}
                           </td>
                           <td>
                               {{ $responsavel->created_at ?? '' }}
                           </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ url('resources/relatorios/responsaveis.css') }}">

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
