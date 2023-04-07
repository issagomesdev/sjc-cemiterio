@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Registros de Transferências Para Ossuários
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover datatable datatable-ParaGaveta">
                <thead>
                    <tr>
                        <th class="noExport" width="5%"> </th>
                        <th class="noExport" id="th-body"> </th>
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
                            {{ trans('cruds.paraGaveta.fields.data_de_transferencia') }}
                        </th>
                        <th>
                            Por:
                        </th>
                        <th>
                            Data
                        </th>
                        <th class="noExport">
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td class="d"> </td>
                        <td class="d"> </td>
                        <td> <p class="fil"> Cemitério </p>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($cemiterios as $key => $item)
                                    <option value="{{ $item->nome }}">{{ $item->nome }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="d"> </td>
                        <td class="d"> </td>
                        <td class="d"> </td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paraGavetas as $key => $paraGaveta)
                        <tr data-entry-id="{{ $paraGaveta->id }}">
                          <td> </td>
                          <td>
                            <p> <strong> Responsável:</strong> {{ $paraGaveta->responsavel_nome ?? '' }} </p>
                            <p> <strong> Falecido(a): </strong> {{ $paraGaveta->falecido_nome ?? '' }} </p>
                            <p> <strong> Cemiterio: </strong> {{ $paraGaveta->cemiterio->nome ?? '' }} </p>
                            <p> <strong> Data de Tranferencia: </strong> {{ $paraGaveta->data_de_transferencia ?? '' }} </p>
                            <p class="cad">
                            cadastrado em {{ $paraGaveta->created_at ?? '' }} por {{ $paraGaveta->assinatura->name ?? '' }}
                            </p>
                          </td>
                            <td class="invisib">
                                {{ $paraGaveta->responsavel_nome ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $paraGaveta->falecido_nome ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $paraGaveta->cemiterio->nome ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $paraGaveta->data_de_transferencia ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $paraGaveta->assinatura->name ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $paraGaveta->created_at ?? '' }}
                            </td>
                                <td class="btnn">
                                     <div class="header">
                                     <div class="dropdown">
                                      <ul class="dropbtn icons btn-right showLeft" onclick="showDropdown{{ $paraGaveta->id }}()"> <li></li> <li></li> <li></li> </ul>
                                      <div id="myDropdown{{ $paraGaveta->id }}" class="dropdown-content">
                                        @can('para_gaveta_show') <a href="{{ route('admin.para-gavetas.show', $paraGaveta->id) }}"> <i class="fa fa-user fa-lg"></i> {{ trans('global.view') }} </a> @endcan
                                      </div>
                                      </div>
                                      </div>
                                    </td>
                                    </tr>
                                            @section('scripts')
                                            @parent

                                            <script>

                                            function changeLanguage(language) {
                                            var element = document.getElementById("url");
                                            element.value = language;
                                            element.innerHTML = language;
                                            }

                                            function showDropdown{{ $paraGaveta->id }}() {
                                            document.getElementById("myDropdown{{ $paraGaveta->id }}").classList.toggle("dshow");
                                            }

                                            // Close the dropdown if the user clicks outside of it
                                            window.onclick = function(event) {
                                            if (!event.target.matches(".dropbtn")) {
                                            var dropdowns = document.getElementsByClassName("dropdown-content");
                                            var i;
                                            for (i = 0; i < dropdowns.length; i++) {
                                              var openDropdown = dropdowns[i];
                                              if (openDropdown.classList.contains("dshow")) {
                                                            openDropdown.classList.remove("dshow");
                                              }
                                            }
                                            }
                                            };

                                          </script>
                                          @endsection
                                          @endforeach
                                          </tbody>
                                          </table>
                                          </div>
                                          </div>
                                          </div>

                                          <link rel="stylesheet" href="{{ url('css/hide-menu.css') }}">
                                          <link rel="stylesheet" href="{{ url('resources/paraGaveta.css') }}">

@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('para_ossuario_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.para-gavetas.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 6, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-ParaGaveta:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
