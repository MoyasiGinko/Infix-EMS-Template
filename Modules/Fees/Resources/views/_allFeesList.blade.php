@push('css')
<link rel="stylesheet" href="{{ url('Modules\Fees\Resources\assets\css\feesStyle.css') }}" />
@endpush
@push('css')
<style>
.fees-invoice-card {
  position: relative;
  border-radius: 18px;
  background: #ffffff;
  box-shadow: 0 24px 60px rgba(15, 23, 42, 0.08);
  overflow: hidden;
}

.fees-invoice-card__header {
  background: linear-gradient(135deg, #4338ca, #5b21b6);
  color: #fff;
  padding: 28px;
  display: flex;
  flex-direction: column;
  gap: 18px;
}

.fees-invoice-card__title h3 {
  margin: 0;
  font-size: 22px;
  font-weight: 700;
  letter-spacing: 0.02em;
}

.fees-invoice-toolbar {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
}

.fees-invoice-toolbar__left,
.fees-invoice-toolbar__right {
  display: flex;
  align-items: center;
  gap: 14px;
  flex-wrap: wrap;
}

.fees-invoice-length {
  display: flex;
  align-items: center;
  gap: 12px;
  background: rgba(255, 255, 255, 0.12);
  border-radius: 999px;
  padding: 8px 12px;
  border: 1px solid rgba(255, 255, 255, 0.18);
}

.fees-invoice-length label {
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  margin: 0;
  font-weight: 600;
  opacity: 0.85;
}

#feesInvoiceLength {
  appearance: none;
  -webkit-appearance: none;
  border: none;
  background: transparent;
  color: #fff;
  font-weight: 600;
  font-size: 13px;
  cursor: pointer;
  padding-right: 22px;
}

#feesInvoiceLength option {
  color: #1f2937;
}

.fees-invoice-length::after {
  content: '\25BE';
  font-size: 10px;
  color: #fff;
  opacity: 0.7;
  pointer-events: none;
}

.fees-invoice-search {
  position: relative;
  min-width: 240px;
  flex: 1 1 240px;
}

.fees-invoice-search span {
  position: absolute;
  left: 16px;
  top: 50%;
  transform: translateY(-50%);
  color: rgba(59, 130, 246, 0.9);
  font-size: 14px;
}

.fees-invoice-search input {
  width: 100%;
  border-radius: 999px;
  border: none;
  padding: 10px 18px 10px 42px;
  font-weight: 600;
  background: rgba(255, 255, 255, 0.95);
  color: #1e293b;
  box-shadow: 0 14px 34px rgba(15, 23, 42, 0.18);
  transition: all 0.25s ease;
}

.fees-invoice-search input::placeholder {
  color: rgba(71, 85, 105, 0.7);
}

.fees-invoice-search input:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3), 0 14px 36px rgba(15, 23, 42, 0.2);
  background: #fff;
}

.fees-invoice-card__body {
  padding: 28px 28px 34px;
}

.fees-tool-btn {
  border: 1px solid rgba(255, 255, 255, 0.26);
  background: rgba(255, 255, 255, 0.16);
  color: #f8fafc;
  font-weight: 600;
  border-radius: 999px;
  padding: 9px 18px;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  box-shadow: 0 10px 28px rgba(79, 70, 229, 0.24);
  transition: all 0.25s ease;
}

.fees-tool-btn .icon {
  font-size: 16px;
}

.fees-tool-btn:hover,
.fees-tool-btn:focus {
  color: #fff;
  background: rgba(255, 255, 255, 0.32);
  border-color: rgba(255, 255, 255, 0.4);
  text-decoration: none;
}

.fees-tool-dropdown .dropdown-menu {
  min-width: 220px;
  padding: 12px 10px;
  border-radius: 14px;
  border: 1px solid rgba(79, 70, 229, 0.12);
  box-shadow: 0 28px 60px rgba(79, 70, 229, 0.22);
}

.fees-tool-dropdown .dropdown-item {
  border-radius: 10px;
  padding: 10px 12px;
  font-weight: 600;
  font-size: 13px;
  color: #1f2937;
  display: flex;
  align-items: center;
  gap: 10px;
  transition: all 0.2s ease;
}

.fees-tool-dropdown .dropdown-item:hover {
  background: rgba(79, 70, 229, 0.12);
  color: #312e81;
}

.fees-tool-dropdown .dropdown-item .export-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 26px;
  height: 26px;
  border-radius: 8px;
  background: rgba(79, 70, 229, 0.12);
  color: #4f46e5;
  font-size: 14px;
}

.fees-tool-dropdown .dropdown-item .export-icon i,
.fees-tool-dropdown .dropdown-item .export-icon span {
  color: inherit !important;
  font-size: 14px;
}

.fees-column-toggle {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  width: 100%;
  font-size: 13px;
  font-weight: 600;
  color: #1f2937;
}

.fees-column-toggle input {
  width: 20px;
  height: 20px;
  accent-color: #4f46e5;
  cursor: pointer;
}

.fees-column-toggle input:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

.modern-datatable {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
}

.modern-datatable table.modern-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
}

.modern-datatable table.modern-table thead th {
  border-top: none;
  border-bottom: none;
  background: #f8f7ff;
  padding: 16px 18px;
  font-size: 12px;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  font-weight: 700;
  color: #312e81;
}

.modern-datatable table.modern-table tbody td {
  border-top: 1px solid #e5e7ff;
  padding: 16px 18px;
  font-size: 14px;
  font-weight: 500;
  color: #1e293b;
  background: #fff;
}

.modern-datatable table.modern-table tbody tr:nth-child(even) td {
  background: #f9f9ff;
}

.modern-datatable table.modern-table tbody tr:hover td {
  background: #eef2ff;
}

.fees-invoice-card.is-loading .modern-datatable::after {
  content: '';
  position: absolute;
  inset: 0;
  background: rgba(248, 250, 255, 0.75);
  backdrop-filter: blur(1.5px);
  z-index: 5;
}

.fees-invoice-card.is-loading .modern-datatable::before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 44px;
  height: 44px;
  border-radius: 50%;
  border: 4px solid rgba(79, 70, 229, 0.24);
  border-top-color: #4f46e5;
  transform: translate(-50%, -50%);
  animation: feesSpin 0.8s linear infinite;
  z-index: 6;
}

#feesInvoiceRefresh.loading {
  position: relative;
  color: transparent;
}

#feesInvoiceRefresh.loading::after {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 16px;
  height: 16px;
  border-radius: 50%;
  border: 2px solid rgba(255, 255, 255, 0.6);
  border-top-color: #fff;
  transform: translate(-50%, -50%);
  animation: feesSpin 0.7s linear infinite;
}

@keyframes feesSpin {
  from {
    transform: translate(-50%, -50%) rotate(0deg);
  }
  to {
    transform: translate(-50%, -50%) rotate(360deg);
  }
}

@media (max-width: 1200px) {
  .fees-invoice-toolbar__right {
    flex: 1 1 100%;
    justify-content: flex-start;
  }
}

@media (max-width: 992px) {
  .fees-invoice-toolbar {
    flex-direction: column;
    align-items: stretch;
  }
  .fees-invoice-toolbar__left,
  .fees-invoice-toolbar__right {
    width: 100%;
    justify-content: space-between;
  }
  .fees-tool-btn {
    width: 100%;
    justify-content: center;
  }
}

@media (max-width: 768px) {
  .fees-invoice-card__header {
    padding: 22px;
  }
  .fees-invoice-length {
    width: 100%;
    justify-content: space-between;
  }
  .fees-invoice-toolbar__right {
    flex-direction: column;
    align-items: stretch;
    gap: 12px;
  }
  .fees-invoice-search {
    min-width: 0;
  }
  .fees-invoice-search input {
    padding: 12px 18px 12px 42px;
  }
  .fees-tool-dropdown .dropdown-menu {
    width: 100%;
  }
  .fees-invoice-card__body {
    padding: 22px 16px 28px;
  }
}

@media (prefers-reduced-motion: reduce) {
  .fees-invoice-card,
  .fees-tool-btn,
  .fees-invoice-search input,
  .modern-datatable table.modern-table tbody tr:hover td {
    transition: none !important;
    animation: none !important;
  }
}
</style>
@endpush
@if (!userPermission('fees.fees-invoice-store'))
@push('css')
<style>
div#table_id_wrapper {
  margin-top: 40px;
}
</style>
@endpush
@endif
<section class="sms-breadcrumb mb-20">
  <div class="container-fluid">
    <div class="row justify-content-between">
      <h1>@lang('fees::feesModule.fees_invoice')</h1>
      <div class="bc-pages">
        <a href="{{ route('dashboard') }}">@lang('common.dashboard')</a>
        <a href="#">@lang('fees.fees')</a>
        <a href="#">@lang('fees::feesModule.fees_invoice')</a>
      </div>
    </div>
  </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
  <div class="container-fluid p-0">
    <div class="white-box">
      @if (isset($role) && $role == 'admin')
      @if (userPermission('fees.fees-invoice-store'))
      <div class="row">
        <div class="col-lg-12 text-left col-md-12">
          <a href="{{ route('fees.fees-invoice') }}" class="primary-btn small fix-gr-bg">
            <span class="ti-plus pr-2"></span>
            @lang('common.add')
          </a>
        </div>
      </div>
      @endif
      @elseif (isset($role) && $role == 'lms')
      @if (userPermission('fees.fees-invoice-store'))
      <div class="row">
        <div class="col-lg-12 text-left col-md-12">
          <a href="{{ route('fees.fees-invoice') }}" class="primary-btn small fix-gr-bg">
            <span class="ti-plus pr-2"></span>
            @lang('common.add')
          </a>
        </div>
      </div>
      @endif
      @endif
      <div class="row mt-40">

        @if ((isset($role) && $role == 'admin') || $role == 'lms')
        <div class="col-12">
          <div class="fees-invoice-card">
            <div class="fees-invoice-card__header">
              <div class="fees-invoice-card__title">
                <h3>@lang('fees::feesModule.fees_invoice')</h3>
              </div>
              <div class="fees-invoice-toolbar">
                <div class="fees-invoice-toolbar__left">
                  <div class="fees-invoice-length">
                    <label for="feesInvoiceLength">{{ __('Rows') }}</label>
                    <select id="feesInvoiceLength">
                      <option value="10">10</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                      <option value="250">250</option>
                      <option value="500">500</option>
                      <option value="10000">All (10k)</option>
                    </select>
                  </div>
                </div>
                <div class="fees-invoice-toolbar__right">
                  <div class="fees-invoice-search">
                    <span class="ti-search"></span>
                    <input type="text" id="feesInvoiceSearch" placeholder="{{ __('Search invoices, students or roll') }}">
                  </div>
                  <div class="dropdown fees-tool-dropdown">
                    <button class="fees-tool-btn dropdown-toggle" type="button" id="feesInvoiceExportToggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="icon ti-download"></span>
                      <span>{{ __('Export') }}</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="feesInvoiceExportToggle" id="feesInvoiceExportMenu">
                      <span class="dropdown-item text-muted small">{{ __('Loading...') }}</span>
                    </div>
                  </div>
                  <div class="dropdown fees-tool-dropdown">
                    <button class="fees-tool-btn dropdown-toggle" type="button" id="feesInvoiceColumnToggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="icon ti-layout"></span>
                      <span>{{ __('Columns') }}</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="feesInvoiceColumnToggle" id="feesInvoiceColumnMenu">
                    </div>
                  </div>
                  <button class="fees-tool-btn" type="button" id="feesInvoiceRefresh">
                    <span class="icon ti-reload"></span>
                    <span>{{ __('Refresh') }}</span>
                  </button>
                </div>
              </div>
            </div>
            <div class="fees-invoice-card__body">
              <x-table>
                <div class="modern-datatable table-responsive">
                  <table id="table_id" class="table data-table modern-table" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>@lang('common.sl')</th>
                        <th>@lang('common.student')</th>
                        <th>@lang('student.roll_no')</th>
                        <th>@lang('accounts.amount')</th>
                        <th>@lang('fees::feesModule.waiver')</th>
                        <th>@lang('fees.fine')</th>
                        <th>@lang('fees.paid')</th>
                        <th>@lang('accounts.balance')</th>
                        <th>@lang('common.status')</th>
                        <th>@lang('common.date')</th>
                        <th>@lang('common.action')</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </x-table>
            </div>
          </div>
        </div>
        @else
        <div class="col-lg-12 student-details up_admin_visitor mt-0">
          <ul class="nav nav-tabs tabs_scroll_nav mt-0 ml-0" role="tablist">
            @foreach ($records as $key => $record)
            <li class="nav-item mb-0">
              <a class="nav-link mb-0 @if ($key == 0) active @endif " href="#tab{{ $key }}" role="tab"
                data-toggle="tab">{{ moduleStatusCheck('University') ? $record->unSemesterLabel->name : $record->class->class_name }}
                ({{ $record->section->section_name }}) @if(shiftEnable())
                @if($record->shift)[{{@$record->shift->shift_name}}]@endif @endif
              </a>
            </li>
            @endforeach
          </ul>

          <div class="tab-content" style="margin-top:70px">
            @foreach ($records as $key => $record)
            <div role="tabpanel" class="tab-pane fade  @if ($key == 0) active show @endif" id="tab{{ $key }}">
              <x-table>
                <table id="table_id" class="table" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>@lang('common.sl')</th>
                      <th>@lang('common.student')</th>
                      <th>@if(shiftEnable()) @lang('admin.class_Sec_shift') @else @lang('student.class_section') @endif
                      </th>
                      <th>@lang('accounts.amount')</th>
                      <th>@lang('fees::feesModule.waiver')</th>
                      <th>@lang('fees.fine')</th>
                      <th>@lang('fees.paid')</th>
                      <th>@lang('accounts.balance')</th>
                      <th>@lang('common.status')</th>
                      <th>@lang('common.date')</th>
                      <th>@lang('common.action')</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($record->feesInvoice as $key => $studentInvoice)
                    @php
                    $amount = $studentInvoice->Tamount;
                    $weaver = $studentInvoice->Tweaver;
                    $fine = $studentInvoice->Tfine;
                    $paid_amount = $studentInvoice->Tpaidamount;
                    $sub_total = $studentInvoice->Tsubtotal;
                    $balance = $amount + $fine - ($paid_amount + $weaver);
                    @endphp
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>
                        <a href="{{ route('fees.fees-invoice-view', ['id' => $studentInvoice->id, 'state' => 'view']) }}"
                          target="_blank">
                          {{ @$studentInvoice->studentInfo->full_name }}
                        </a>
                      </td>
                      <td>{{ @$studentInvoice->recordDetail->class->class_name }}
                        ({{ @$studentInvoice->recordDetail->section->section_name }})
                        @if(shiftEnable())[{{ '(' . @$studentInvoice->recordDetail->shift != '' ? @$studentInvoice->recordDetail->shift->name : '' . ')' }}]@endif
                      </td>
                      <td>{{ $amount }}</td>
                      <td>{{ $weaver }}</td>
                      <td>{{ $fine }}</td>
                      <td>{{ $paid_amount }}</td>
                      <td>{{ $balance }}</td>
                      <td>
                        @if ($balance == 0)
                        <button class="primary-btn small bg-success text-white border-0">@lang('fees.paid')</button>
                        @elseif ($paid_amount > 0)
                        <button class="primary-btn small bg-warning text-white border-0">@lang('fees.partial')</button>
                        @else
                        <button class="primary-btn small bg-danger text-white border-0">@lang('fees.unpaid')</button>
                        @endif
                      </td>
                      <td>{{ dateConvert($studentInvoice->create_date) }}</td>
                      <td>
                        <x-drop-down>
                          <a class="dropdown-item"
                            href="{{ route('fees.fees-invoice-view', ['id' => $studentInvoice->id, 'state' => 'view']) }}">@lang('common.view')</a>
                          @if ($balance != 0)
                          <a class="dropdown-item"
                            href="{{ route('fees.student-fees-payment', $studentInvoice->id) }}">@lang('inventory.add_payment')</a>
                          @endif
                        </x-drop-down>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </x-table>
            </div>
            @endforeach
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</section>

{{-- Delete Modal Start --}}
<div class="modal fade admin-query" id="deleteFeesPayment">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('fees::feesModule.delete_fees_invoice')</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <div class="text-center">
          <h4>@lang('common.are_you_sure_to_delete')</h4>
        </div>
        <div class="mt-40 d-flex justify-content-between">
          <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('common.cancel')</button>
          {{ html()->form('POST', route('fees.fees-invoice-delete'))->open() }}
          <input type="hidden" name="feesInvoiceId" value="">
          <button class="primary-btn fix-gr-bg" type="submit">@lang('common.delete')</button>
          {{ html()->form()->close() }}
        </div>
      </div>
    </div>
  </div>
</div>
{{-- Delete Modal End --}}

{{-- View Fees Modal Start --}}
<div class="modal fade admin-query" id="viewFeesPayment">
  <div class="modal-dialog modal-dialog-centered max_modal">
    <div class="modal-content">
    </div>
  </div>
</div>
{{-- View Fees Modal End --}}

@include('backEnd.partials.data_table_js_fees_list')
@include('backEnd.partials.server_side_datatable')
<script>
function feesInvoiceDelete(id) {
  var modal = $('#deleteFeesPayment');
  modal.find('input[name=feesInvoiceId]').val(id)
  modal.modal('show');
}

function viewPaymentDetailModal(id) {
  $('#viewFeesPayment').modal('show');
  let invoiceId = id;
  $.ajax({
    url: "{{ route('fees.fees-view-payment') }}",
    method: "POST",
    data: {
      invoiceId: invoiceId
    },
    success: function(response) {
      $('#viewFeesPayment .modal-content').html(response);
    },
  });
}
$(document).ready(function() {
  const $dataTable = $('.data-table');
  if (!$dataTable.length) {
    return;
  }

  const lengthKey = 'feesInvoice_pageLength';
  const validLengths = [10, 50, 100, 250, 500, 10000];
  const maxLen = 10000;
  const urlParams = new URLSearchParams(window.location.search);
  let urlLen = parseInt(urlParams.get('show_entries'), 10);
  if (urlLen === -1) {
    urlLen = maxLen;
  }
  if (!validLengths.includes(urlLen)) {
    urlLen = null;
  }

  let savedLength = parseInt(localStorage.getItem(lengthKey) || '10', 10);
  if (savedLength === -1) {
    savedLength = maxLen;
  }
  if (!validLengths.includes(savedLength)) {
    savedLength = 10;
  }

  const initialLength = urlLen !== null ? urlLen : savedLength;

  const $card = $('.fees-invoice-card');
  const $lengthSelect = $('#feesInvoiceLength');
  const $searchInput = $('#feesInvoiceSearch');
  const $refreshBtn = $('#feesInvoiceRefresh');
  const $columnMenu = $('#feesInvoiceColumnMenu');
  const $exportMenu = $('#feesInvoiceExportMenu');

  if ($lengthSelect.length && !isNaN(initialLength)) {
    $lengthSelect.val(String(initialLength));
  }

  const noExportsMessage = "<span class=\"dropdown-item text-muted small\">{{ __('No export actions available') }}</span>";
  const noColumnsMessage = "<span class=\"dropdown-item text-muted small\">{{ __('No columns available') }}</span>";

  const dt = $dataTable.DataTable({
    processing: true,
    serverSide: true,
    ajax: $.fn.dataTable.pipeline({
      url: "{{ url('fees/fees-invoice-datatable') }}",
      data: {},
      pages: "{{ generalSetting()->ss_page_load }}"
    }),
    columns: [
      { data: 'DT_RowIndex', name: 'id' },
      { data: 'student_name', name: 'student_name', orderable: false, searchable: true },
      { data: 'roll_no', name: 'roll_no', orderable: false, searchable: true },
      { data: 'amount', name: 'amount', orderable: false, searchable: false },
      { data: 'weaver', name: 'weaver', orderable: false, searchable: false },
      { data: 'fine', name: 'fine', orderable: false, searchable: false },
      { data: 'paid_amount', name: 'paid_amount', orderable: false, searchable: false },
      { data: 'balance', name: 'balance', orderable: false, searchable: false },
      { data: 'status', name: 'status', orderable: false, searchable: false },
      { data: 'create_date', name: 'create_date', orderable: true, searchable: false },
      { data: 'action', name: 'action', orderable: false, searchable: false },
    ],
    bLengthChange: false,
    lengthMenu: [
      [10, 50, 100, 250, 500, 10000],
      [10, 50, 100, 250, 500, '10000']
    ],
    pageLength: initialLength,
    bDestroy: true,
    language: {
      processing: "<span class='sr-only'>{{ __('Processing') }}</span>",
      paginate: {
        next: "<i class='ti-arrow-right'></i>",
        previous: "<i class='ti-arrow-left'></i>",
      },
      emptyTable: "{{ __('No data available in table') }}",
      zeroRecords: "{{ __('No matching records found') }}"
    },
    dom: "Brtip",
    buttons: [{
        extend: "copyHtml5",
        text: '<i class="fa fa-files-o"></i>',
        title: $("#logo_title").val(),
        titleAttr: window.jsLang('copy_table'),
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
      },
      {
        extend: "excelHtml5",
        text: '<i class="fa fa-file-excel-o"></i>',
        titleAttr: window.jsLang('export_to_excel'),
        title: $("#logo_title").val(),
        margin: [10, 10, 10, 0],
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
      },
      {
        extend: "csvHtml5",
        text: '<i class="fa fa-file-text-o"></i>',
        titleAttr: window.jsLang('export_to_csv'),
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fa fa-file-pdf-o"></i>',
        title: $("#logo_title").val(),
        titleAttr: window.jsLang('export_to_pdf'),
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
        orientation: "landscape",
        pageSize: "A4",
        margin: [0, 0, 0, 12],
        alignment: "center",
        header: true,
        customize: function(doc) {
          doc.content[1].margin = [100, 0, 100, 0];
          doc.content.splice(1, 0, {
            margin: [0, 0, 0, 12],
            alignment: "center",
            image: "data:image/png;base64," + $("#logo_img").val(),
          });
          doc.defaultStyle = {
            font: 'DejaVuSans'
          }
        },
      },
      {
        extend: "print",
        text: '<i class="fa fa-print"></i>',
        titleAttr: window.jsLang('print'),
        title: $("#logo_title").val(),
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
      },
      {
        extend: "colvis",
        text: '<i class="fa fa-columns"></i>',
        postfixButtons: ["colvisRestore"],
      },
    ],
    columnDefs: [{
      visible: false,
    }],
    responsive: true,
    drawCallback: function(settings) {
      const api = this.api();
      const currentLength = api.page.len();
      localStorage.setItem(lengthKey, currentLength);
      const params = new URLSearchParams(window.location.search);
      if (currentLength === 10) {
        params.delete('show_entries');
      } else {
        params.set('show_entries', currentLength);
      }
      const queryString = params.toString();
      const newUrl = window.location.pathname + (queryString ? '?' + queryString : '');
      window.history.replaceState({}, '', newUrl);
      if ($lengthSelect.length) {
        $lengthSelect.val(String(currentLength));
      }
    },
  });

  dt.on('preXhr.dt', function(e, settings, data) {
    if (data.length > maxLen) {
      data.start = 0;
      data.length = maxLen;
    }
  });

  if (urlLen && urlLen !== dt.page.len()) {
    dt.page.len(urlLen).draw(false);
  }

  if ($lengthSelect.length) {
    $lengthSelect.on('change', function() {
      const newLength = parseInt($(this).val(), 10);
      if (!isNaN(newLength) && validLengths.includes(newLength)) {
        dt.page.len(newLength).draw();
      }
    });
  }

  if ($searchInput.length) {
    let searchTimer = null;
    $searchInput.on('input', function() {
      const value = this.value;
      clearTimeout(searchTimer);
      searchTimer = setTimeout(function() {
        dt.search(value).draw();
      }, 250);
    });

    $searchInput.on('keydown', function(e) {
      if (e.key === 'Escape') {
        $(this).val('');
        dt.search('').draw();
      }
    });
  }

  if ($refreshBtn.length) {
    $refreshBtn.on('click', function() {
      const $btn = $(this);
      if ($btn.hasClass('loading')) {
        return;
      }
      $btn.addClass('loading');
      if (typeof dt.clearPipeline === 'function') {
        dt.clearPipeline();
      }
      dt.ajax.reload(function() {
        $btn.removeClass('loading');
      }, false);
      setTimeout(function() {
        $btn.removeClass('loading');
      }, 1200);
    });
  }

  dt.on('xhr.dt', function() {
    $refreshBtn.removeClass('loading');
  });

  dt.on('processing.dt', function(e, settings, processing) {
    if ($card.length) {
      $card.toggleClass('is-loading', processing);
    }
  });

  function rebuildExportMenu() {
    if (!$exportMenu.length) {
      return;
    }
    const $dtButtons = $('#table_id_wrapper .dt-buttons');
    $exportMenu.empty();
    if (!$dtButtons.length) {
      $exportMenu.append(noExportsMessage);
      return;
    }
    $dtButtons.find('a, button').each(function() {
      const $original = $(this);
      const $item = $('<button type="button" class="dropdown-item d-flex align-items-center"></button>');
    const $iconHolder = $('<span class="export-icon mr-2"></span>');
    $iconHolder.html($original.html());
    const label = $original.attr('title') || $original.data('title') || $original.text().trim() || "{{ __('Export') }}";
      const $labelSpan = $('<span class="font-weight-semibold"></span>').text(label);
      $item.append($iconHolder).append($labelSpan);
      $item.on('click', function() {
        $original.trigger('click');
      });
      $exportMenu.append($item);
    });
    if (!$exportMenu.children().length) {
      $exportMenu.append(noExportsMessage);
    }
    $dtButtons.hide();
  }

  function buildColumnMenu() {
    if (!$columnMenu.length) {
      return;
    }
    $columnMenu.empty();
    dt.columns().every(function(index) {
      const column = this;
      const headerText = $(column.header()).text().trim();
      if (!headerText) {
        return;
      }
      const columnId = `fees-column-${index}`;
      const locked = index === 0;
      const checked = column.visible();
      const disabledAttr = locked ? 'disabled' : '';
      const checkedAttr = checked ? 'checked' : '';
      const template = `
        <label class="dropdown-item fees-column-toggle" for="${columnId}">
          <span>${headerText}</span>
          <input type="checkbox" id="${columnId}" data-column="${index}" ${checkedAttr} ${disabledAttr}>
        </label>
      `;
      $columnMenu.append(template);
    });
    if (!$columnMenu.children().length) {
      $columnMenu.append(noColumnsMessage);
    }
  }

  dt.on('init.dt', function() {
    rebuildExportMenu();
    buildColumnMenu();
    if ($searchInput.length) {
      $searchInput.val(dt.search());
    }
  });

  dt.on('column-visibility.dt', function(e, settings, column, state) {
    const $input = $columnMenu.find(`input[data-column="${column}"]`);
    if ($input.length && !$input.prop('disabled')) {
      $input.prop('checked', state);
    }
  });

  if ($columnMenu.length) {
    $columnMenu.on('change', 'input[data-column]', function() {
      const columnIndex = parseInt($(this).data('column'), 10);
      if (isNaN(columnIndex)) {
        return;
      }
      dt.column(columnIndex).visible($(this).is(':checked'));
    });
  }
});
</script>