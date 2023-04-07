@extends('layouts.admin')
@section('content')
@can('recadastramento_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.recadastramentos.create') }}">
                Lançar Recadastramento
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Registros de Recadastramentos
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover datatable datatable-Recadastramento">
                <thead>
                    <tr>
                        <th class="noExport" width="5%"> </th>
                        <th class="noExport" id="th-body"> </th>
                        <th>
                            {{ trans('cruds.recadastramento.fields.cemiterio') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadastramento.fields.setor') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadastramento.fields.quadra') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadastramento.fields.lote') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadastramento.fields.nome_do_falecido') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadastramento.fields.sexo') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadastramento.fields.cor_raca') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadastramento.fields.causa_da_morte') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadastramento.fields.estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadastramento.fields.cidade') }}
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

                        <td> <p class="fil"> Lote </p>
                            <select class="search" name="lote" id="lote"> <option value>{{ trans('global.all') }}</option> </select>
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

                      <script>
                          $(document).ready(function() {
                          $('#quadra').on('change', function() {
                             var quadraId = $("#quadra option:selected").data('id');
                             if(quadraId) {
                                 $.ajax({
                                     url: '/admin/quadra-lote/'+quadraId,
                                     type: "GET",
                                     data : {"_token":"{{ csrf_token() }}"},
                                     dataType: "json",
                                     success:function(data)
                                     {
                                       if(data){
                                          $('#lote').empty();
                                          $('#lote').append('<option value> Todos </option>');
                                          $.each(data, function(key, lote){
                                              $('select[name="lote"]').append('<option data-id="'+ lote.id +'" value="'+ lote.indentificacao +'">' + lote.indentificacao + '</option>');
                                          });
                                      }else{
                                          $('#lote').empty();
                                          $('#lote').append('<option value> Todos </option>');
                                      }
                                   }
                                 });
                             }else{
                               $('#lote').empty();
                               $('#lote').append('<option value> Todos </option>');
                             }
                          });
                          });
                      </script>

                      @endsection
                      
                        <td class="d"> </td>
                        <td> <p class="fil"> Sexo </p>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Recadastramento::SEXO_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td> <p class="fil"> Cor/Raça </p>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Recadastramento::COR_RACA_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="d"> </td>
                        <td> <p class="fil"> Estado </p>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Recadastramento::ESTADO_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
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
                    @foreach($recadastramentos as $key => $recadastramento)
                        <tr data-entry-id="{{ $recadastramento->id }}">
                          <td> </td>
                          <td>
                            <p> <strong> Cemitério: </strong> {{ $recadastramento->cemiterio->nome ?? '' }} </p>
                            <p> <strong> Setor: </strong> {{ $recadastramento->setor->indentificacao ?? '' }} </p>
                            <p> <strong> Quadra: </strong> {{ $recadastramento->quadra->indentificacao ?? '' }} </p>
                            <p> <strong> Lote: </strong> {{ $recadastramento->lote->indentificacao ?? '' }} </p>
                            <p> <strong> Falecido(a): </strong> {{ $recadastramento->nome_do_falecido ?? '' }} </p>
                            <p> <strong> Sexo: </strong> {{ App\Models\Recadastramento::SEXO_SELECT[$recadastramento->sexo] ?? '' }} </p>
                            <p> <strong> Cor/Raça: </strong> {{ App\Models\Recadastramento::COR_RACA_SELECT[$recadastramento->cor_raca] ?? '' }} </p>
                            <p> <strong> Causa da Morte: </strong> {{ $recadastramento->causa_da_morte ?? '' }} </p>
                            <p> <strong> Estado: </strong> {{ App\Models\Recadastramento::ESTADO_SELECT[$recadastramento->estado] ?? '' }} </p>
                            <p> <strong> Cidade: </strong> {{ $recadastramento->cidade ?? '' }} </p>
                            <p class="cad">
                            cadastrado em {{ $recadastramento->created_at ?? '' }} por {{ $recadastramento->assinatura->name ?? '' }}
                            </p>
                          </td>
                            <td class="invisib">
                                {{ $recadastramento->cemiterio->nome ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $recadastramento->setor->indentificacao ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $recadastramento->quadra->indentificacao ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $recadastramento->lote->indentificacao ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $recadastramento->nome_do_falecido ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ App\Models\Recadastramento::SEXO_SELECT[$recadastramento->sexo] ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ App\Models\Recadastramento::COR_RACA_SELECT[$recadastramento->cor_raca] ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $recadastramento->causa_da_morte ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ App\Models\Recadastramento::ESTADO_SELECT[$recadastramento->estado] ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $recadastramento->cidade ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $recadastramento->assinatura->name ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $recadastramento->created_at ?? '' }}
                            </td>
                                <td class="btnn">
                                 <div class="header">
                                 <div class="dropdown">
                                  <ul class="dropbtn icons btn-right showLeft" onclick="showDropdown{{ $recadastramento->id }}()"> <li></li> <li></li> <li></li> </ul>
                                  <div id="myDropdown{{ $recadastramento->id }}" class="dropdown-content">
                                    @can('recadastramento_show') <a href="{{ route('admin.recadastramentos.show', $recadastramento->id) }}"> <i class="fa fa-user fa-lg"></i> {{ trans('global.view') }} </a> @endcan
                                    @can('recadastramento_edit') <a href="{{ route('admin.recadastramentos.edit', $recadastramento->id) }}"> <i class="fa fa-edit"></i> {{ trans('global.edit') }} </a> @endcan
                                    @can('recadastramento_delete') <form id="delete-{{ $recadastramento->id }}" action="{{ route('admin.recadastramentos.destroy', $recadastramento->id) }}" method="POST">  @method('DELETE') @csrf </form>
                                    <a class="dropdown-item" href="#" onclick="if(confirm('{{ trans('global.areYouSure') }}')) document.getElementById('delete-{{ $recadastramento->id }}').submit()">
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

                                        function showDropdown{{ $recadastramento->id }}() {
                                        document.getElementById("myDropdown{{ $recadastramento->id }}").classList.toggle("dshow");
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
                                      <link rel="stylesheet" href="{{ url('resources/recadastramentos.css') }}">

@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('recadastramento_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.recadastramentos.massDestroy') }}",
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
  let table = $('.datatable-Recadastramento:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
