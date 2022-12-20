@extends('layouts.admin')
@section('content')
@can('loan_master_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.loan-masters.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.loanMaster.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.loanMaster.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-LoanMaster">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.bank') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.product') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.subproduct') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.customer') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.stage') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.application_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.loan_account_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.loan_tenure') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.is_self_connector') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.dme_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.dme_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.dme_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.sanctioned_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.sanctioned_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.disbursement_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.loanMaster.fields.disbursement_amount') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($bank_masters as $key => $item)
                                <option value="{{ $item->bankname }}">{{ $item->bankname }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($product_masters as $key => $item)
                                <option value="{{ $item->product_name }}">{{ $item->product_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($product_masters as $key => $item)
                                <option value="{{ $item->product_name }}">{{ $item->product_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($customers as $key => $item)
                                <option value="{{ $item->firstname }}">{{ $item->firstname }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($stage_masters as $key => $item)
                                <option value="{{ $item->stage }}">{{ $item->stage }}</option>
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
                            @foreach(App\Models\LoanMaster::IS_SELF_CONNECTOR_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($users as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($users as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($users as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('loan_master_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.loan-masters.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.loan-masters.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'bank_bankname', name: 'bank.bankname' },
{ data: 'product_product_name', name: 'product.product_name' },
{ data: 'subproduct_product_name', name: 'subproduct.product_name' },
{ data: 'customer_firstname', name: 'customer.firstname' },
{ data: 'stage_stage', name: 'stage.stage' },
{ data: 'application_no', name: 'application_no' },
{ data: 'loan_account_no', name: 'loan_account_no' },
{ data: 'amount', name: 'amount' },
{ data: 'loan_tenure', name: 'loan_tenure' },
{ data: 'is_self_connector', name: 'is_self_connector' },
{ data: 'dme_1_name', name: 'dme_1.name' },
{ data: 'dme_2_name', name: 'dme_2.name' },
{ data: 'dme_3_name', name: 'dme_3.name' },
{ data: 'sanctioned_date', name: 'sanctioned_date' },
{ data: 'sanctioned_amount', name: 'sanctioned_amount' },
{ data: 'disbursement_date', name: 'disbursement_date' },
{ data: 'disbursement_amount', name: 'disbursement_amount' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-LoanMaster').DataTable(dtOverrideGlobals);
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
});

</script>
@endsection