@extends('layouts.admin')
@section('content')
@can('setore_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.setores.create') }}">
                Cadastrar Setor
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Registros de Setores
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover datatable datatable-Setore">
                <thead>
                    <tr>
                        <th class="noExport" width="5%"> </th>
                        <th class="noExport" id="th-body"> </th>
                        <th>
                            {{ trans('cruds.setore.fields.cemiterio') }}
                        </th>
                        <th>
                            {{ trans('cruds.setore.fields.indentificacao') }}
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
                        <td><p class="fil"> Cemitério </p>
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
                    @foreach($setores as $key => $setore)
                        <tr data-entry-id="{{ $setore->id }}">
                          <td> </td>
                          <td>
                            <p> <strong> Cemitério: </strong> {{ $setore->cemiterio->nome ?? '' }} </p>
                            <p> <strong> Identificação: </strong>  {{ $setore->indentificacao ?? '' }} </p>
                            <p class="cad">
                            cadastrado em {{ $setore->created_at ?? '' }} por {{ $setore->assinatura->name ?? '' }}
                            </p>
                          </td>
                            <td class="invisib">
                                {{ $setore->cemiterio->nome ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $setore->indentificacao ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $setore->assinatura->name ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $setore->created_at ?? '' }}
                            </td>
                            <td class="btnn">
                                      <div class="header">
                                      <div class="dropdown">
                                        <ul class="dropbtn icons btn-right showLeft" onclick="showDropdown{{ $setore->id }}()"> <li></li> <li></li> <li></li> </ul>
                                        <div id="myDropdown{{ $setore->id }}" class="dropdown-content">
                                        @can('setore_show') <a href="{{ route('admin.setores.show', $setore->id) }}"> <i class="fa fa-user fa-lg"></i> {{ trans('global.view') }} </a> @endcan
                                        @can('setore_edit') <a href="{{ route('admin.setores.edit', $setore->id) }}"> <i class="fa fa-edit"></i> {{ trans('global.edit') }} </a> @endcan
                                        @can('setore_delete') <form id="delete-{{ $setore->id }}" action="{{ route('admin.setores.destroy', $setore->id) }}" method="POST">  @method('DELETE') @csrf </form>
                                        <a class="dropdown-item" href="#" onclick="if(confirm('{{ trans('global.areYouSure') }}')) document.getElementById('delete-{{ $setore->id }}').submit()">
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

                                    function showDropdown{{ $setore->id }}() {
                                    document.getElementById("myDropdown{{ $setore->id }}").classList.toggle("dshow");
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
                                    <link rel="stylesheet" href="{{ url('resources/setor.css') }}">

@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('setore_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.setores.massDestroy') }}",
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
  let table = $('.datatable-Setore:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
