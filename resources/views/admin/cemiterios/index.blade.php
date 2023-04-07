@extends('layouts.admin')
@section('content')
@can('cemiterio_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.cemiterios.create') }}">
                Cadastrar Cemitério
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Registros de Cemitérios
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover datatable datatable-Cemiterio">
                <thead>
                    <tr>
                        <th class="noExport" width="5%"> </th>
                        <th class="noExport" id="th-body"> </th>
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
                            {{ trans('cruds.cemiterio.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.cemiterio.fields.numero_de_contato') }}
                        </th>
                        <th>
                            Por:
                        </th>
                        <th>
                            Em:
                        </th>
                        <th class="noExport">
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                       <td> </td>
                       <td> </td>
                       <td class="d"> </td>
                        <td> <p class="fil"> Estado </p>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Cemiterio::ESTADO_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="d"> </td>
                        <td class="d"> </td>
                        <td class="d"> </td>
                        <td class="d"> </td>
                        <td class="d"> </td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cemiterios as $key => $cemiterio)
                        <tr data-entry-id="{{ $cemiterio->id }}">
                          <td> </td>
                          <td>
                            <p> <strong>Nome:</strong> {{ $cemiterio->nome ?? '' }} </p>
                            <p> <strong>Estado:</strong> {{ App\Models\Cemiterio::ESTADO_SELECT[$cemiterio->estado] ?? '' }} </p>
                            <p> <strong>Cidade:</strong> {{ $cemiterio->cidade ?? '' }} </p>
                            <p> <strong>E-mail:</strong> {{ $cemiterio->email ?? '' }} </p>
                            <p> <strong>Numero:</strong> {{ $cemiterio->numero_de_contato ?? '' }} </p>
                            <p class="cad">
                            cadastrado em {{ $cemiterio->created_at ?? '' }} por {{ $cemiterio->assinatura->name ?? '' }}
                            </p>
                          </td>
                            <td class="invisib">
                                {{ $cemiterio->nome ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ App\Models\Cemiterio::ESTADO_SELECT[$cemiterio->estado] ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $cemiterio->cidade ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $cemiterio->email ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $cemiterio->numero_de_contato ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $cemiterio->assinatura->name ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $cemiterio->created_at ?? '' }}
                            </td>
                            <td class="btnn">
                                  <div class="header">
                                  <div class="dropdown">
                                    <ul class="dropbtn icons btn-right showLeft" onclick="showDropdown{{ $cemiterio->id }}()"> <li></li> <li></li> <li></li> </ul>
                                    <div id="myDropdown{{ $cemiterio->id }}" class="dropdown-content">
                                    @can('cemiterio_show') <a href="{{ route('admin.cemiterios.show', $cemiterio->id) }}"> <i class="fa fa-user fa-lg"></i> {{ trans('global.view') }} </a> @endcan
                                    @can('cemiterio_edit') <a href="{{ route('admin.cemiterios.edit', $cemiterio->id) }}"> <i class="fa fa-edit"></i> {{ trans('global.edit') }} </a> @endcan
                                    @can('cemiterio_delete') <form id="delete-{{ $cemiterio->id }}" action="{{ route('admin.cemiterios.destroy', $cemiterio->id) }}" method="POST">  @method('DELETE') @csrf </form>
                                    <a class="dropdown-item" href="#" onclick="if(confirm('{{ trans('global.areYouSure') }}')) document.getElementById('delete-{{ $cemiterio->id }}').submit()">
                                    <i class="fa fa-trash"> </i> {{ trans('global.delete') }} </a> @endcan
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

                                function showDropdown{{ $cemiterio->id }}() {
                                document.getElementById("myDropdown{{ $cemiterio->id }}").classList.toggle("dshow");
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
                                <link rel="stylesheet" href="{{ url('resources/cemiterio.css') }}">



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('cemiterio_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cemiterios.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Cemiterio:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
