<meta charset="UTF-8"/>
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Registro da Auditoria
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Audit">
                <thead>
                    <tr>
                        <th width="10" class="noExport"> </th>
                        <th>
                            Ação
                        </th>
                        <th>
                            Autor da Ação
                        </th>
                        <th>
                            Local
                        </th>
                        <th>
                            Registro Afetado
                        </th>
                        <th>
                            Host
                        </th>
                        <th>
                            Data
                        </th>
                        <th class="noExport">
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($auditLogs as $key => $auditLog)
                        <tr data-entry-id="{{ $auditLog->id }}">
                            <td> </td>
                            <td>
                                {{ $auditLog->ação ?? '' }}
                            </td>
                            <td>
                              {{ $auditLog->autor_da_acao->name ?? '' }} 
                            </td>
                            <td>
                                {{ $auditLog->local ?? '' }}
                            </td>
                            <td>
                                 {{ $auditLog->registro }}
                            </td>
                            <td>
                                {{ $auditLog->host ?? '' }}
                            </td>
                            <td>
                                {{ $auditLog->created_at ?? '' }}
                            </td>
                            <td>
                                @can('audit_log_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.audit-logs.show', $auditLog->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



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
  let table = $('.datatable-Audit:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
