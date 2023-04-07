@extends('layouts.admin')
@section('content')
@can('quadra_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.quadras.create') }}">
                Cadastrar Quadra
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Registros de Quadras
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover datatable datatable-Quadra">
                <thead>
                    <tr>
                        <th class="noExport" width="5%"> </th>
                        <th class="noExport" id="th-body"> </th>
                        <th>
                            {{ trans('cruds.quadra.fields.cemiterio') }}
                        </th>
                        <th>
                            {{ trans('cruds.quadra.fields.setor') }}
                        </th>
                        <th>
                            {{ trans('cruds.quadra.fields.indentificacao') }}
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
                        <td> <p class="fil"> Cemitério </p>
                            <select class="search" name="" id="cemiterio">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($cemiterios as $key => $item)
                                  <option data-id="{{ $item->id }}" value="{{ $item->nome }}">{{ $item->nome }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td> <p class="fil"> Setor </p>
                            <select class="search" name="setor" id="setor"> <option value>{{ trans('global.all') }}</option> </select>
                        </td>

                        @section('scripts')
                        @parent

                      <script>
                          $(document).ready(function() {
                          $('#cemiterio').on('change', function() {
                             var cemiterioID = $("#cemiterio option:selected").data('id');
                             if(cemiterioID) {
                                 $.ajax({
                                     url: '/admin/cemiterio-setor/'+cemiterioID,
                                     type: "GET",
                                     data : {"_token":"{{ csrf_token() }}"},
                                     dataType: "json",
                                     success:function(data)
                                     {
                                       if(data){
                                          $('#setor').empty();
                                          $('#setor').append('<option value> Todos </option>');
                                          $.each(data, function(key, setor){
                                              $('select[name="setor"]').append('<option value="'+ setor.indentificacao +'">' + setor.indentificacao + '</option>');
                                          });
                                      }else{
                                          $('#setor').empty();
                                          $('#setor').append('<option value> Todos </option>');
                                      }
                                   }
                                 });
                             }else{
                               $('#setor').empty();
                               $('#setor').append('<option value> Todos </option>');
                             }
                          });
                          });
                      </script>

                      @endsection

                        <td class="d"> </td>
                        <td class="d"> </td>
                        <td class="d"> </td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quadras as $key => $quadra)
                        <tr data-entry-id="{{ $quadra->id }}">
                          <td> </td>
                          <td>
                            <p> <strong> Cemitério:</strong> {{ $quadra->cemiterio->nome ?? '' }} </p>
                            <p> <strong> Setor: </strong> {{ $quadra->setor->indentificacao ?? '' }} </p>
                            <p> <strong> Identificação: </strong> {{ $quadra->indentificacao ?? '' }} </p>
                            <p class="cad">
                            cadastrado em {{ $quadra->created_at ?? '' }} por {{ $quadra->assinatura->name ?? '' }}
                            </p>
                          </td>
                            <td class="invisib">
                                {{ $quadra->cemiterio->nome ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $quadra->setor->indentificacao ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $quadra->indentificacao ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $quadra->assinatura->name ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $quadra->created_at ?? '' }}
                            </td>
                            <td class="btnn">
                               <div class="header">
                               <div class="dropdown">
                                 <ul class="dropbtn icons btn-right showLeft" onclick="showDropdown{{ $quadra->id }}()"> <li></li> <li></li> <li></li> </ul>
                                 <div id="myDropdown{{ $quadra->id }}" class="dropdown-content">
                                 @can('quadra_show') <a href="{{ route('admin.quadras.show', $quadra->id) }}"> <i class="fa fa-user fa-lg"></i> {{ trans('global.view') }} </a> @endcan
                                 @can('quadra_edit') <a href="{{ route('admin.quadras.edit', $quadra->id) }}"> <i class="fa fa-edit"></i> {{ trans('global.edit') }} </a> @endcan
                                 @can('quadra_delete') <form id="delete-{{ $quadra->id }}" action="{{ route('admin.quadras.destroy', $quadra->id) }}" method="POST">  @method('DELETE') @csrf </form>
                                 <a class="dropdown-item" href="#" onclick="if(confirm('{{ trans('global.areYouSure') }}')) document.getElementById('delete-{{ $quadra->id }}').submit()">
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

                            function showDropdown{{ $quadra->id }}() {
                            document.getElementById("myDropdown{{ $quadra->id }}").classList.toggle("dshow");
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
                          <link rel="stylesheet" href="{{ url('resources/quadra.css') }}">
                          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('quadra_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.quadras.massDestroy') }}",
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
  let table = $('.datatable-Quadra:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
