@extends('layouts.admin')
@section('content')
@can('lote_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.lotes.create') }}">
                Cadastrar Lote
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Registro de Lotes
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover datatable datatable-Lote">
                <thead>
                    <tr>
                        <th class="noExport" width="5%"> </th>
                        <th class="noExport" id="th-body"> </th>
                        <th>
                            {{ trans('cruds.lote.fields.cemiterio') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.setor') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.quadra') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.tipo_de_lote') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.comprimento') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.altura') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.indentificacao') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.lote_vazio') }}
                        </th>
                        <th>
                            {{ trans('cruds.lote.fields.reservado') }}
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

                        <td> <p class="fil"> Quadra </p>
                            <select class="search" name="quadra" id="quadra"> <option value>{{ trans('global.all') }}</option> </select>
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
                                              $('select[name="setor"]').append('<option data-id="'+ setor.id +'" value="'+ setor.indentificacao +'">' + setor.indentificacao + '</option>');
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

                      <script>
                          $(document).ready(function() {
                          $('#setor').on('change', function() {
                             var setorId = $("#setor option:selected").data('id');
                             if(setorId) {
                                 $.ajax({
                                     url: '/admin/setor-quadra/'+setorId,
                                     type: "GET",
                                     data : {"_token":"{{ csrf_token() }}"},
                                     dataType: "json",
                                     success:function(data)
                                     {
                                       if(data){
                                          $('#quadra').empty();
                                          $('#quadra').append('<option value> Todos </option>');
                                          $.each(data, function(key, quadra){
                                              $('select[name="quadra"]').append('<option data-id="'+ quadra.id +'" value="'+ quadra.indentificacao +'">' + quadra.indentificacao + '</option>');
                                          });
                                      }else{
                                          $('#quadra').empty();
                                          $('#quadra').append('<option value> Todos </option>');
                                      }
                                   }
                                 });
                             }else{
                               $('#quadra').empty();
                               $('#quadra').append('<option value> Todos </option>');
                             }
                          });
                          });
                      </script>

                      @endsection

                        <td> <p class="fil"> Tipo de Lote </p>
                            <select class="search" strict="true" style="width: 100px;">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Lote::TIPO_DE_LOTE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="d"> </td>
                        <td class="d"> </td>
                        <td class="d"> </td>
                        <td> <p class="fil"> Lote Vazio? </p>
                            <select class="search" strict="true" style="width: 100px;">
                                <option value>{{ trans('global.all') }}</option>
                                <option value="Sim"> Sim </option>
                                <option value="Não"> Não </option>
                            </select>
                        </td>
                          <td> <p class="fil"> Reservado? </p>
                            <select class="search" strict="true" style="width: 100px;">
                                <option value>{{ trans('global.all') }}</option>
                                <option value="Sim"> Sim </option>
                                <option value="Não"> Não </option>
                            </select>
                        </td>
                        <td class="d"> </td>
                        <td class="d"> </td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lotes as $key => $lote)
                        <tr data-entry-id="{{ $lote->id }}">
                          <td> </td>
                          <td>
                            <p> <strong> Cemitério:</strong> {{ $lote->cemiterio->nome ?? '' }} </p>
                            <p> <strong> Setor: </strong> {{ $lote->setor->indentificacao ?? '' }} </p>
                            <p> <strong> Quadra: </strong> {{ $lote->quadra->indentificacao ?? '' }} </p>
                            <p> <strong> Tipo de Lote: </strong> {{ App\Models\Lote::TIPO_DE_LOTE_SELECT[$lote->tipo_de_lote] ?? '' }} </p>
                            <p> <strong> Medidas: </strong> Comprimento: {{ $lote->comprimento ?? '' }} | Altura: {{ $lote->altura ?? '' }} </p>
                            <p> <strong> Identificação: </strong> {{ $lote->indentificacao ?? '' }} </p>
                            <p> <strong> Lote Vazio? </strong> {{ $lote->lote_vazio ?? '' }} </p>
                            <p> <strong> Reservado? </strong> {{ $lote->reservado ?? '' }} </p>
                            <p class="cad">
                            cadastrado em {{ $lote->created_at ?? '' }} por {{ $lote->assinatura->name ?? '' }}
                            </p>
                          </td>
                            <td class="invisib">
                                {{ $lote->cemiterio->nome ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $lote->setor->indentificacao ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $lote->quadra->indentificacao ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ App\Models\Lote::TIPO_DE_LOTE_SELECT[$lote->tipo_de_lote] ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $lote->comprimento ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $lote->altura ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $lote->indentificacao ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $lote->lote_vazio ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $lote->reservado ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $lote->assinatura->name ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $lote->created_at ?? '' }}
                            </td>
                                <td class="btnn">
                                   <div class="header">
                                   <div class="dropdown">
                                     <ul class="dropbtn icons btn-right showLeft" onclick="showDropdown{{ $lote->id }}()"> <li></li> <li></li> <li></li> </ul>
                                     <div id="myDropdown{{ $lote->id }}" class="dropdown-content">
                                     @can('lote_show') <a href="{{ route('admin.lotes.show', $lote->id) }}"> <i class="fa fa-user fa-lg"></i> {{ trans('global.view') }} </a> @endcan
                                     @can('lote_edit') <a href="{{ route('admin.lotes.edit', $lote->id) }}"> <i class="fa fa-edit"></i> {{ trans('global.edit') }} </a> @endcan
                                     @can('lote_delete') <form id="delete-{{ $lote->id }}" action="{{ route('admin.lotes.destroy', $lote->id) }}" method="POST"> @method('DELETE') @csrf </form>
                                     <a class="dropdown-item" href="#" onclick="if(confirm('{{ trans('global.areYouSure') }}')) document.getElementById('delete-{{ $lote->id }}').submit()">
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

                                function showDropdown{{ $lote->id }}() {
                                document.getElementById("myDropdown{{ $lote->id }}").classList.toggle("dshow");
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
                              <link rel="stylesheet" href="{{ url('resources/lote.css') }}">
                              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('lote_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.lotes.massDestroy') }}",
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
  let table = $('.datatable-Lote:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
