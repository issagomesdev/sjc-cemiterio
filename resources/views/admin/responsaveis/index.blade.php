@extends('layouts.admin')
@section('content')
@can('responsavel_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.responsaveis.create') }}">
                Cadastrar Responsável
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Registros de Responsáveis
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover datatable datatable-Responsavel">
                <thead>
                    <tr>
                        <th class="noExport" width="5%"> </th>
                        <th class="noExport" id="th-body"> </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Parentesco
                        </th>
                        <th>
                            Sexo
                        </th>
                        <th>
                            CPF/CNPJ
                        </th>
                        <th>
                            Estado
                        </th>
                        <th>
                            Cidade
                        </th>
                        <th>
                            E-mail
                        </th>
                        <th>
                            Numero de Contato
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
                        <td> <p class="fil"> Parentesco </p>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Responsavel::PARENTESCO_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td> <p class="fil"> Sexo </p>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Responsavel::SEXO_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="d"> </td>
                        <td> <p class="fil"> Estado </p>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Responsavel::ESTADO_SELECT as $key => $item)
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
                    @foreach($responsaveis as $key => $responsavel)
                        <tr data-entry-id="{{ $responsavel->id }}">
                          <td> </td>
                          <td>
                            <p> <strong> Nome:</strong> {{ $responsavel->nome ?? '' }} </p>
                            <p> <strong> Parentesco: </strong> {{ App\Models\Responsavel::PARENTESCO_SELECT[$responsavel->parentesco] ?? '' }} </p>
                            <p> <strong> Sexo: </strong> {{ App\Models\Responsavel::SEXO_SELECT[$responsavel->sexo] ?? '' }} </p>
                            <p> <strong> CPF/CNPJ: </strong> {{ $responsavel->cpf_cnpj ?? '' }} </p>
                            <p> <strong> Estado: </strong> {{ App\Models\Responsavel::ESTADO_SELECT[$responsavel->estado] ?? '' }} </p>
                            <p> <strong> Cidade: </strong> {{ $responsavel->cidade ?? '' }} </p>
                            <p> <strong> E-mail: </strong> {{ $responsavel->email ?? '' }} </p>
                            <p> <strong> Numero de Contato: </strong> {{ $responsavel->numero_de_contato ?? '' }} </p>
                            <p class="cad">
                            cadastrado em {{ $responsavel->created_at ?? '' }} por {{ $responsavel->assinatura->name ?? '' }}
                            </p>
                          </td>
                            <td class="invisib">
                                {{ $responsavel->nome ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ App\Models\Responsavel::PARENTESCO_SELECT[$responsavel->parentesco] ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ App\Models\Responsavel::SEXO_SELECT[$responsavel->sexo] ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $responsavel->cpf_cnpj ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ App\Models\Responsavel::ESTADO_SELECT[$responsavel->estado] ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $responsavel->cidade ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $responsavel->email ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $responsavel->numero_de_contato ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $responsavel->assinatura->name ?? '' }}
                            </td>
                            <td class="invisib">
                                {{ $responsavel->created_at ?? '' }}
                            </td>
                            <td class="btnn">
                             <div class="header">
                             <div class="dropdown">
                              <ul class="dropbtn icons btn-right showLeft" onclick="showDropdown{{ $responsavel->id }}()"> <li></li> <li></li> <li></li> </ul>
                              <div id="myDropdown{{ $responsavel->id }}" class="dropdown-content">
                                @can('responsavel_show') <a href="{{ route('admin.responsaveis.show', $responsavel->id) }}"> <i class="fa fa-user fa-lg"></i> {{ trans('global.view') }} </a> @endcan
                                @can('responsavel_edit') <a href="{{ route('admin.responsaveis.edit', $responsavel->id) }}"> <i class="fa fa-edit"></i> {{ trans('global.edit') }} </a> @endcan
                                <!-- @can('compra_de_lote_create') <a href="{{ route('admin.compra-de-lotes.create', [$responsavel->id]) }}"> <i class="fas fa-money-check-alt"></i> Lançar <br> Compra  de <br> Lote </a> @endcan -->
                                @can('responsavel_delete') <form id="delete-{{ $responsavel->id }}" action="{{ route('admin.responsaveis.destroy', $responsavel->id) }}" method="POST">  @method('DELETE') @csrf </form>
                                <a class="dropdown-item" href="#" onclick="if(confirm('{{ trans('global.areYouSure') }}')) document.getElementById('delete-{{ $responsavel->id }}').submit()">
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

                                    function showDropdown{{ $responsavel->id }}() {
                                    document.getElementById("myDropdown{{ $responsavel->id }}").classList.toggle("dshow");
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
                                  <link rel="stylesheet" href="{{ url('resources/responsaveis.css') }}">

@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('responsavel_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.responsaveis.massDestroy') }}",
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
  let table = $('.datatable-Responsavel:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
