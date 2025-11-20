@extends('backEnd.master')
@section('title')
@lang('accounts.add_income')
@endsection
@section('mainContent')

@php
$grouped_incomes = $grouped_incomes ?? collect();
$__incomeCollection = $__incomeCollection ?? collect();
@endphp

<section class="sms-breadcrumb mb-20">
  <div class="container-fluid">
    <div class="row justify-content-between">
      <h1>@lang('accounts.add_income') </h1>
      <div class="bc-pages">
        <a href="{{ route('dashboard') }}">@lang('common.dashboard')</a>
        <a href="#">@lang('accounts.accounts')</a>
        <a href="#">@lang('accounts.add_income')</a>
      </div>
    </div>
  </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
  <div class="container-fluid p-0">
    @if (isset($add_income))
    @if (userPermission('add_income_store'))
    <div class="row">
      <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
        <a href="{{ route('add_income') }}" class="primary-btn small fix-gr-bg">
          <span class="ti-plus pr-2"></span>
          @lang('common.add')
        </a>
      </div>
    </div>
    @endif
    @endif
    <div class="row">

      <div class="col-lg-4 col-xl-3">
        <div class="row">
          <div class="col-lg-12">
            @if (isset($add_income))
            {{ html()->form('POST', route('add_income_update'))->attributes([
                        'class' => 'form-horizontal',
                        'files' => true,
                        'enctype' => 'multipart/form-data',
                        'id' => 'add-income-update',
                    ])->open() }}
            @else
            @if (userPermission('add_income_store'))
            {{ html()->form('POST', route('add_income_store'))->attributes([
                            'class' => 'form-horizontal',
                            'files' => true,
                            'enctype' => 'multipart/form-data',
                            'id' => 'add-income',
                        ])->open() }}
            @endif
            @endif
            <div class="white-box">
              <div class="main-title">
                <h3 class="mb-15">
                  @if (isset($add_income))
                  @lang('accounts.edit_income')
                  @else
                  @lang('accounts.add_income')
                  @endif
                </h3>
              </div>
              <div class="add-visitor">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="primary_input">
                      <label class="primary_input_label" for="">@lang('common.name') <span class="text-danger">
                          *</span></label>
                      <input class="primary_input_field form-control{{ @$errors->has('name') ? ' is-invalid' : '' }}"
                        type="text" name="name" autocomplete="off"
                        value="{{ isset($add_income) ? $add_income->name : old('name') }}">
                      <input type="hidden" name="id" value="{{ isset($add_income) ? $add_income->id : '' }}">


                      @if ($errors->has('name'))
                      <span class="text-danger">
                        {{ $errors->first('name') }}
                      </span>
                      @endif
                    </div>

                  </div>
                </div>
                <div class="row  mt-15">
                  <div class="col-lg-12">
                    <label class="primary_input_label" for="">@lang('accounts.a_c_Head') <span class="text-danger">
                        *</span></label>
                    <select class="primary_select  form-control{{ @$errors->has('income_head') ? ' is-invalid' : '' }}"
                      name="income_head">
                      <option data-display="@lang('accounts.a_c_Head') *" value="">
                        @lang('accounts.a_c_Head') *</option>
                      @foreach ($income_heads as $income_head)
                      @if (isset($add_income))
                      <option value="{{ @$income_head->id }}"
                        {{ @$add_income->income_head_id == @$income_head->id ? 'selected' : '' }}>
                        {{ @$income_head->head }}</option>
                      @else
                      <option value="{{ @$income_head->id }}"
                        {{ old('income_head') == @$income_head->id ? 'selected' : '' }}>
                        {{ @$income_head->head }}</option>
                      @endif
                      @endforeach
                    </select>
                    @if (@$errors->has('income_head'))
                    <span class="text-danger invalid-select" role="alert">
                      {{ @$errors->first('income_head') }}
                    </span>
                    @endif
                  </div>
                </div>

                <div class="row mt-15">
                  <div class="col-lg-12">
                    <label class="primary_input_label" for="">@lang('accounts.payment_method') <span
                        class="text-danger"> *</span></label>
                    <select
                      class="primary_select  form-control{{ @$errors->has('payment_method') ? ' is-invalid' : '' }}"
                      name="payment_method" id="payment_method">
                      <option data-display="@lang('accounts.payment_method') *" value="">
                        @lang('accounts.payment_method') *</option>
                      @foreach ($payment_methods as $payment_method)
                      @if (isset($add_income))
                      <option data-string="{{ $payment_method->method }}" value="{{ @$payment_method->id }}"
                        {{ @$add_income->payment_method_id == @$payment_method->id ? 'selected' : '' }}>
                        {{ @$payment_method->method }}
                      </option>
                      @else
                      <option data-string="{{ $payment_method->method }}" value="{{ @$payment_method->id }}">
                        {{ @$payment_method->method }}</option>
                      @endif
                      @endforeach
                    </select>
                    @if (@$errors->has('payment_method'))
                    <span class="text-danger invalid-select" role="alert">
                      {{ @$errors->first('payment_method') }}
                    </span>
                    @endif
                  </div>
                </div>
                <div class="row mt-15 d-none" id="bankAccount">
                  <div class="col-lg-12">
                    <label class="primary_input_label" for="">@lang('accounts.bank_accounts') <span class="text-danger">
                        *</span></label>
                    <select class="primary_select  form-control{{ @$errors->has('accounts') ? ' is-invalid' : '' }}"
                      name="accounts">
                      <option data-display="@lang('accounts.bank_accounts') *" value="">
                        @lang('accounts.bank_accounts') *</option>
                      @foreach ($bank_accounts as $bank_account)
                      @if (isset($add_income))
                      <option value="{{ @$bank_account->id }}"
                        {{ @$add_income->account_id == @$bank_account->id ? 'selected' : '' }}>
                        {{ @$bank_account->account_name }}
                        ({{ @$bank_account->bank_name }})</option>
                      @else
                      <option value="{{ @$bank_account->id }}">
                        {{ @$bank_account->account_name }}
                        ({{ @$bank_account->bank_name }})</option>
                      @endif
                      @endforeach
                    </select>
                    @if ($errors->has('accounts'))
                    <span class="text-danger invalid-select" role="alert">
                      {{ @$errors->first('accounts') }}
                    </span>
                    @endif
                  </div>
                </div>


                <div class="row  mt-15">
                  <div class="col-lg-12">
                    <div class="primary_input">
                      <label class="primary_input_label" for="">@lang('admin.date') <span class="text-danger">
                          *</span></label>
                      <div class="primary_datepicker_input">
                        <div class="no-gutters input-right-icon">
                          <div class="col">
                            <div class="">
                              <input
                                class="primary_input_field  primary_input_field date form-control form-control{{ @$errors->has('date') ? ' is-invalid' : '' }}"
                                id="startDate" type="text" placeholder="@lang('common.date') *" name="date"
                                value="{{ isset($add_income) ? date('m/d/Y', strtotime($add_income->date)) : date('m/d/Y') }}">
                            </div>
                          </div>
                          <button class="btn-date" data-id="#startDate" type="button">
                            <label class="m-0 p-0" for="startDate">
                              <i class="ti-calendar" id="start-date-icon"></i>
                            </label>
                          </button>
                        </div>
                      </div>
                      <span class="text-danger">{{ $errors->first('date') }}</span>
                    </div>
                  </div>
                </div>
                <div class="row  mt-15">
                  <div class="col-lg-12">
                    <div class="primary_input">
                      <label class="primary_input_label" for="">@lang('accounts.amount') <span class="text-danger">
                          *</span></label>
                      <input class="primary_input_field form-control{{ @$errors->has('amount') ? ' is-invalid' : '' }}"
                        type="number" step="0.01" min="0" name="amount" autocomplete="off"
                        value="{{ isset($add_income) ? $add_income->amount : old('amount') }}">
                      @if ($errors->has('amount'))
                      <span class="text-danger">
                        {{ $errors->first('amount') }}
                      </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row  mt-15">
                  <div class="col-lg-12">
                    <div class="primary_input">
                      <label class="primary_input_label" for="">@lang('common.description')</label>
                      <textarea class="primary_input_field form-control" cols="0" rows="4"
                        name="description">{{ isset($add_income) ? $add_income->description : old('description') }}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row mt-15">
                  <div class="col-lg-12">
                    <div class="primary_input">
                      <label class="primary_input_label" for="">@lang('common.attach_file')</label>
                      <div class="primary_file_uploader">
                        <input class="primary-input filePlaceholder" type="text" id="placeholderInput"
                          placeholder="@lang('common.attach_file')" readonly>
                        <button class="primary-btn small fix-gr-bg" type="button">
                          <label class="primary-btn small fix-gr-bg" for="browseFile">@lang('common.browse')</label>
                          <input type="file" class="d-none" name="file" id="browseFile">
                        </button>
                      </div>
                      @if ($errors->has('file'))
                      <span class="text-danger">
                        {{ $errors->first('file') }}
                      </span>
                      @endif
                    </div>
                  </div>
                </div>

                @php
                $tooltip = '';
                if (userPermission('add_income_store') || userPermission('add_income_edit')) {
                $tooltip = '';
                } else {
                $tooltip = 'You have no permission to add';
                }
                @endphp

                <div class="row mt-40">
                  <div class="col-lg-12 text-center">
                    <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="{{ @$tooltip }}">
                      <span class="ti-check"></span>
                      @if (@$add_income)
                      @lang('accounts.update_income')
                      @else
                      @lang('accounts.save_income')
                      @endif

                    </button>
                  </div>
                </div>
              </div>
            </div>
            {{ html()->form()->close() }}
          </div>
        </div>
      </div>

      <div class="col-lg-8 col-xl-9">
        <div class="white-box">
          {{-- Income list (grouped view) --}}
          <div class="row align-items-center mb-3">
            <div class="col-6">
              <div class="main-title">
                <h3 class="mb-0">@lang('accounts.income_list')</h3>
              </div>
            </div>
            <div class="col-6 text-right">
              <div class="d-inline-flex flex-wrap justify-content-end">
                <button type="button" class="primary-btn small fix-gr-bg mr-2 mb-2" id="incExportExcel">Export
                  XLSX</button>
                <button type="button" class="primary-btn small fix-gr-bg mr-2 mb-2" id="incExportCSV">Export
                  CSV</button>
                <button type="button" class="primary-btn small fix-gr-bg mr-2 mb-2" id="incExportPDF">Export
                  PDF</button>
                <button type="button" class="primary-btn small fix-gr-bg mb-2" id="incExportPrint">Print</button>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="d-flex justify-content-start align-items-center mb-3 flex-wrap">
                <label class="mb-0 mr-2 font-weight-bold">Group by:</label>
                <select id="incomeGroupBy" class="primary_select" style="min-width:160px;display:inline-block;">
                  <option value="date" selected>@lang('common.date')</option>
                  <option value="name">@lang('common.name')</option>
                  <option value="method">@lang('accounts.payment_method')</option>
                </select>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap">
                <div class="mb-2">
                  <label class="mb-0 mr-2">Show entries</label>
                  <select id="incomePageLength" class="form-control"
                    style="min-width:90px;display:inline-block;"></select>
                </div>
                <div id="incomePagination" class="mb-2"></div>
              </div>

              <div id="incomeDateAccordion" class="mb-20 group-accordion" data-group="date">
                @php
                $buildIncomeDisplayRows = function ($entries, $scopeKey) {
                $displayRows = [];
                $invoiceRowBuckets = [];

                foreach ($entries as $row) {
                $headName = optional($row->ACHead)->head
                ?? optional($row->incomeHeads)->name
                ?? '';
                $invoiceMeta = $row->invoice_meta ?? null;
                $invoiceKey = $invoiceMeta['invoice_db_id'] ?? $row->fees_collection_id ?? null;

                if ($invoiceKey) {
                if (! $invoiceMeta) {
                $invoiceMeta = [
                'invoice_db_id' => $invoiceKey,
                'invoice_number' => is_string($invoiceKey)
                ? $invoiceKey
                : __('fees.invoice').' #'.str_pad((string) $invoiceKey, 6, '0', STR_PAD_LEFT),
                'student_name' => $row->name ?? __('common.unknown'),
                'student_roll' => '',
                'fee_heads' => [],
                'invoice_date' => $row->date,
                'view_url' => null,
                ];
                }

                $bucketKey = $scopeKey.'_' . md5((string) $invoiceKey);

                if (! isset($invoiceRowBuckets[$bucketKey])) {
                $invoiceRowBuckets[$bucketKey] = [
                'meta' => $invoiceMeta,
                'total_amount' => 0,
                'head_names' => [],
                'payment_methods' => [],
                'entries' => 0,
                'rows' => collect(),
                ];
                $displayRows[] = ['type' => 'invoice', 'bucketKey' => $bucketKey];
                }

                $invoiceRowBuckets[$bucketKey]['total_amount'] += (float) $row->amount;

                if ($headName !== '') {
                $invoiceRowBuckets[$bucketKey]['head_names'][$headName] = true;
                }

                $methodLabel = optional($row->paymentMethod)->method;
                if (! empty($methodLabel)) {
                $invoiceRowBuckets[$bucketKey]['payment_methods'][$methodLabel] = true;
                }

                $invoiceRowBuckets[$bucketKey]['rows']->push($row);
                $invoiceRowBuckets[$bucketKey]['entries']++;
                continue;
                }

                $displayRows[] = [
                'type' => 'manual',
                'row' => $row,
                'head_name' => $headName,
                ];
                }

                foreach ($displayRows as $index => $entry) {
                if (($entry['type'] ?? null) === 'invoice') {
                $displayRows[$index]['bucket'] = $invoiceRowBuckets[$entry['bucketKey']] ?? [];
                unset($displayRows[$index]['bucketKey']);
                }
                }

                $sequentialNumber = 1;
                foreach ($displayRows as $index => $entry) {
                $displayRows[$index]['row_number'] = $sequentialNumber++;
                }

                return $displayRows;
                };
                @endphp
                @forelse($grouped_incomes as $dateKey => $incomesForDate)
                @php
                $incCollapseId = 'incDate_' . md5($dateKey);
                $displayDate = date('M d, Y', strtotime($dateKey));
                $totalForDate = $incomesForDate->sum('amount');
                $incomeDisplayRows = $buildIncomeDisplayRows($incomesForDate, 'date_'.$dateKey);
                @endphp
                <div class="card mb-2 border-0 shadow-sm">
                  <div
                    class="card-header bg-gradient-light p-3 cursor-pointer d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#{{ $incCollapseId }}"
                    aria-expanded="{{ $loop->first ? 'true':'false' }}" data-total="{{ $totalForDate }}">
                    <div class="d-flex align-items-center">
                      <i class="ti-angle-down mr-3 collapse-icon"></i>
                      <div>
                        <span class="font-weight-bold text-dark">{{ $displayDate }}</span>
                        <div class="text-muted small">{{ $incomesForDate->count() }} entries</div>
                      </div>
                    </div>
                    <div class="text-right">
                      <div class="amount-display">
                        <span class="currency-symbol">{{ generalSetting()->currency_symbol }}</span>
                        <span
                          class="amount-value font-weight-bold text-primary">{{ number_format($totalForDate,2) }}</span>
                      </div>
                      <span class="badge badge-primary badge-pill">{{ $incomesForDate->count() }}</span>
                    </div>
                  </div>
                  <div id="{{ $incCollapseId }}" class="collapse @if($loop->first) show @endif"
                    data-parent="#incomeDateAccordion">
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped">
                          <thead class="thead-light">
                            <tr>
                              <th style="width:60px" class="text-center">#</th>
                              <th style="min-width:150px">Name</th>
                              <th style="min-width:120px">Payment Method</th>
                              <th style="min-width:140px">Head</th>
                              <th style="min-width:100px" class="text-right">Amount</th>
                              <th style="width:120px" class="text-right">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($incomeDisplayRows as $displayRow)
                            @if(($displayRow['type'] ?? null) === 'invoice')
                            @php
                            $group = $displayRow['bucket'];
                            $meta = $group['meta'] ?? [];
                            $methodNames = array_keys($group['payment_methods'] ?? []);
                            $headLabels = !empty($meta['fee_heads']) ? $meta['fee_heads'] :
                            array_keys($group['head_names'] ?? []);
                            $firstPaymentDate = optional($group['rows']->first())->date ?? $dateKey ?? null;
                            $invoiceExportPayload = [
                            'date' => $firstPaymentDate ? dateConvert($firstPaymentDate) : '',
                            'name' => $meta['student_name'] ?? __('common.unknown'),
                            'identifier' => $meta['student_roll'] ?? '',
                            'payment_method' => count($methodNames) ? implode(', ', $methodNames) : '',
                            'details' => count($headLabels) ? implode(', ', $headLabels) : __('fees.fees_invoice'),
                            'invoice' => $meta['invoice_number'] ?? '',
                            'amount' => round($group['total_amount'] ?? 0, 2),
                            'amount_display' => generalSetting()->currency_symbol .
                            number_format($group['total_amount'] ?? 0,2),
                            'group_scope' => 'date',
                            ];
                            @endphp
                            <tr class="invoice-group-row" data-export='@json($invoiceExportPayload)'>
                              <td class="text-center">
                                <span class="font-weight-600">{{ $displayRow['row_number'] ?? $loop->iteration }}</span>
                              </td>
                              <td class="font-weight-500">
                                <div>{{ $meta['student_name'] ?? __('common.unknown') }}</div>
                                @if(!empty($meta['student_roll']))
                                <div class="text-muted small">@lang('student.roll'): {{ $meta['student_roll'] }}</div>
                                @endif
                                <div class="text-muted small">@lang('fees.invoice_number'):
                                  <span class="font-weight-600">{{ $meta['invoice_number'] ?? __('common.na') }}</span>
                                </div>
                              </td>
                              <td>
                                @if(count($methodNames))
                                <span class="badge badge-outline-info mr-1">{{ $methodNames[0] }}</span>
                                @if(count($methodNames) > 1)
                                <span class="badge badge-light text-muted">+{{ count($methodNames) - 1 }}
                                  more</span>
                                @endif
                                @else
                                <span class="text-muted">—</span>
                                @endif
                              </td>
                              <td class="text-muted">
                                @if(count($headLabels))
                                {{ implode(', ', $headLabels) }}
                                @else
                                @lang('fees.fees_invoice')
                                @endif
                              </td>
                              <td class="text-right font-weight-600" data-amount="{{ $group['total_amount'] ?? 0 }}">
                                {{ generalSetting()->currency_symbol }}{{ number_format($group['total_amount'] ?? 0,2) }}
                              </td>
                              <td class="text-right">
                                @if(userPermission('fees.fees-invoice-view') && !empty($meta['view_url']))
                                <a class="btn btn-sm btn-outline-info d-inline-flex align-items-center"
                                  href="{{ $meta['view_url'] }}" target="_blank">
                                  <span>@lang('common.view')</span>
                                  @if(($group['entries'] ?? 0) > 1)
                                  <span class="badge badge-primary badge-pill ml-2">{{ $group['entries'] ?? 0 }}</span>
                                  @endif
                                </a>
                                @else
                                <span class="text-muted">—</span>
                                @endif
                              </td>
                            </tr>
                            @else
                            @php
                            $row = $displayRow['row'];
                            $headName = $displayRow['head_name'];
                            @endphp
                            @php
                            $manualExportPayload = [
                            'date' => $row->date ? dateConvert($row->date) : '',
                            'name' => $row->name,
                            'identifier' => '',
                            'payment_method' => optional($row->paymentMethod)->method,
                            'details' => $headName,
                            'invoice' => optional($row->invoiceInfo)->invoice_number,
                            'amount' => round($row->amount, 2),
                            'amount_display' => generalSetting()->currency_symbol . number_format($row->amount,2),
                            'group_scope' => 'date',
                            ];
                            @endphp
                            <tr data-export='@json($manualExportPayload)'>
                              <td class="text-center">{{ $displayRow['row_number'] ?? $loop->iteration }}</td>
                              <td class="font-weight-500">{{ $row->name }}</td>
                              <td><span
                                  class="badge badge-outline-info">{{ optional($row->paymentMethod)->method }}</span>
                              </td>
                              <td class="text-muted">{{ $headName }}</td>
                              <td class="text-right font-weight-600" data-amount="{{ $row->amount }}">
                                {{ generalSetting()->currency_symbol }}{{ number_format($row->amount,2) }}</td>
                              <td class="text-right">
                                <div class="action-buttons-wrapper" data-income-id="{{ $row->id }}">
                                  <button class="btn btn-dots-trigger" type="button">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="inline-action-buttons d-none">
                                    @if (userPermission('add_income_edit'))
                                    <a class="btn btn-sm btn-outline-primary action-btn-edit"
                                      href="{{ route('add_income_edit', $row->id) }}" title="Edit">
                                      <i class="ti-pencil-alt"></i>
                                    </a>
                                    @endif
                                    @if (userPermission('add_income_delete'))
                                    <button
                                      class="btn btn-sm btn-outline-danger action-btn-delete income-delete-trigger"
                                      type="button" data-income-id="{{ $row->id }}" title="Delete">
                                      <i class="ti-trash"></i>
                                    </button>
                                    @endif
                                  </div>
                                </div>
                              </td>
                            </tr>
                            @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                @empty
                <p class="text-center text-muted mb-0 py-4">@lang('common.no_data_available')</p>
                @endforelse
              </div>

              {{-- Grouped by Name --}}
              <div id="incomeNameAccordion" class="mb-20 group-accordion d-none" data-group="name">
                @php
                if(!isset($grouped_by_income_name)){
                if(isset($__incomeCollection) && $__incomeCollection instanceof \Illuminate\Support\Collection){
                $grouped_by_income_name = $__incomeCollection->groupBy(function($i){ return $i->name;
                })->sortKeys();
                } else { $grouped_by_income_name = collect(); }
                }
                @endphp
                @foreach(($grouped_by_income_name ?? collect()) as $nameKey => $incomesForName)
                @php
                $incNameCollapseId = 'incName_' . md5($nameKey);
                $displayName = $nameKey ?: __('common.unknown');
                $totalForName = $incomesForName->sum('amount');
                $incomeDisplayRows = $buildIncomeDisplayRows($incomesForName, 'name_'.$nameKey);
                @endphp
                <div class="card mb-2 border-0 shadow-sm">
                  <div
                    class="card-header bg-gradient-light p-3 cursor-pointer d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#{{ $incNameCollapseId }}" aria-expanded="false"
                    data-total="{{ $totalForName }}">
                    <div class="d-flex align-items-center">
                      <i class="ti-angle-down mr-3 collapse-icon"></i>
                      <div>
                        <span class="font-weight-bold text-dark">{{ $displayName }}</span>
                        <div class="text-muted small">{{ $incomesForName->count() }} entries</div>
                      </div>
                    </div>
                    <div class="text-right">
                      <div class="amount-display">
                        <span class="currency-symbol">{{ generalSetting()->currency_symbol }}</span>
                        <span
                          class="amount-value font-weight-bold text-primary">{{ number_format($totalForName,2) }}</span>
                      </div>
                      <span class="badge badge-primary badge-pill">{{ $incomesForName->count() }}</span>
                    </div>
                  </div>
                  <div id="{{ $incNameCollapseId }}" class="collapse" data-parent="#incomeNameAccordion">
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped">
                          <thead class="thead-light">
                            <tr>
                              <th style="width:60px" class="text-center">#</th>
                              <th style="min-width:150px">Name</th>
                              <th style="min-width:120px">Payment Method</th>
                              <th style="min-width:140px">Head</th>
                              <th style="min-width:100px" class="text-right">Amount</th>
                              <th style="width:120px" class="text-right">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($incomeDisplayRows as $displayRow)
                            @if(($displayRow['type'] ?? null) === 'invoice')
                            @php
                            $group = $displayRow['bucket'];
                            $meta = $group['meta'] ?? [];
                            $methodNames = array_keys($group['payment_methods'] ?? []);
                            $headLabels = !empty($meta['fee_heads']) ? $meta['fee_heads'] :
                            array_keys($group['head_names'] ?? []);
                            $firstPaymentDate = optional($group['rows']->first())->date ?? null;
                            $invoiceExportPayload = [
                            'date' => $firstPaymentDate ? dateConvert($firstPaymentDate) : '',
                            'name' => $meta['student_name'] ?? __('common.unknown'),
                            'identifier' => $meta['student_roll'] ?? '',
                            'payment_method' => count($methodNames) ? implode(', ', $methodNames) : '',
                            'details' => count($headLabels) ? implode(', ', $headLabels) : __('fees.fees_invoice'),
                            'invoice' => $meta['invoice_number'] ?? '',
                            'amount' => round($group['total_amount'] ?? 0, 2),
                            'amount_display' => generalSetting()->currency_symbol .
                            number_format($group['total_amount'] ?? 0,2),
                            'group_scope' => 'name',
                            ];
                            @endphp
                            <tr class="invoice-group-row" data-export='@json($invoiceExportPayload)'>
                              <td class="text-center">
                                <span class="font-weight-600">{{ $displayRow['row_number'] ?? $loop->iteration }}</span>
                              </td>
                              <td class="font-weight-500">
                                <div>{{ $meta['student_name'] ?? __('common.unknown') }}</div>
                                @if(!empty($meta['student_roll']))
                                <div class="text-muted small">@lang('student.roll'): {{ $meta['student_roll'] }}</div>
                                @endif
                                <div class="text-muted small">@lang('fees.invoice_number'):
                                  <span class="font-weight-600">{{ $meta['invoice_number'] ?? __('common.na') }}</span>
                                </div>
                              </td>
                              <td>
                                @if(count($methodNames))
                                <span class="badge badge-outline-info mr-1">{{ $methodNames[0] }}</span>
                                @if(count($methodNames) > 1)
                                <span class="badge badge-light text-muted">+{{ count($methodNames) - 1 }}
                                  more</span>
                                @endif
                                @else
                                <span class="text-muted">—</span>
                                @endif
                              </td>
                              <td class="text-muted">
                                @if(count($headLabels))
                                {{ implode(', ', $headLabels) }}
                                @else
                                @lang('fees.fees_invoice')
                                @endif
                              </td>
                              <td class="text-right font-weight-600" data-amount="{{ $group['total_amount'] ?? 0 }}">
                                {{ generalSetting()->currency_symbol }}{{ number_format($group['total_amount'] ?? 0,2) }}
                              </td>
                              <td class="text-right">
                                @if(userPermission('fees.fees-invoice-view') && !empty($meta['view_url']))
                                <a class="btn btn-sm btn-outline-info d-inline-flex align-items-center"
                                  href="{{ $meta['view_url'] }}" target="_blank">
                                  <span>@lang('common.view')</span>
                                  @if(($group['entries'] ?? 0) > 1)
                                  <span
                                    class="badge badge-primary badge-pill ml-2">&sum;{{ $group['entries'] ?? 0 }}</span>
                                  @endif
                                </a>
                                @else
                                <span class="text-muted">—</span>
                                @endif
                              </td>
                            </tr>
                            @else
                            @php
                            $row = $displayRow['row'];
                            $headName = $displayRow['head_name'];
                            @endphp
                            @php
                            $manualExportPayload = [
                            'date' => $row->date ? dateConvert($row->date) : '',
                            'name' => $row->name,
                            'identifier' => '',
                            'payment_method' => optional($row->paymentMethod)->method,
                            'details' => $headName,
                            'invoice' => optional($row->invoiceInfo)->invoice_number,
                            'amount' => round($row->amount, 2),
                            'amount_display' => generalSetting()->currency_symbol . number_format($row->amount,2),
                            'group_scope' => 'name',
                            ];
                            @endphp
                            <tr data-export='@json($manualExportPayload)'>
                              <td class="text-center">{{ $displayRow['row_number'] ?? $loop->iteration }}</td>
                              <td class="font-weight-500">{{ $row->name }}</td>
                              <td><span
                                  class="badge badge-outline-info">{{ optional($row->paymentMethod)->method }}</span>
                              </td>
                              <td class="text-muted">{{ $headName }}</td>
                              <td class="text-right font-weight-600" data-amount="{{ $row->amount }}">
                                {{ generalSetting()->currency_symbol }}{{ number_format($row->amount,2) }}</td>
                              <td class="text-right">
                                <div class="action-buttons-wrapper" data-income-id="{{ $row->id }}">
                                  <button class="btn btn-dots-trigger" type="button">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="inline-action-buttons d-none">
                                    @if (userPermission('add_income_edit'))
                                    <a class="btn btn-sm btn-outline-primary action-btn-edit"
                                      href="{{ route('add_income_edit', $row->id) }}" title="Edit">
                                      <i class="ti-pencil-alt"></i>
                                    </a>
                                    @endif
                                    @if (userPermission('add_income_delete'))
                                    <button
                                      class="btn btn-sm btn-outline-danger action-btn-delete income-delete-trigger"
                                      type="button" data-income-id="{{ $row->id }}" title="Delete">
                                      <i class="ti-trash"></i>
                                    </button>
                                    @endif
                                  </div>
                                </div>
                              </td>
                            </tr>
                            @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>

              {{-- Grouped by Payment Method --}}
              <div id="incomeMethodAccordion" class="mb-20 group-accordion d-none" data-group="method">
                @php
                if(!isset($grouped_by_income_method)){
                if(isset($__incomeCollection) && $__incomeCollection instanceof \Illuminate\Support\Collection){
                $grouped_by_income_method = $__incomeCollection->groupBy(function($i){ return
                optional($i->paymentMethod)->method; })->sortKeys();
                } else { $grouped_by_income_method = collect(); }
                }
                @endphp
                @foreach(($grouped_by_income_method ?? collect()) as $methodKey => $incomesForMethod)
                @php
                $incMethodCollapseId = 'incMethod_' . md5($methodKey);
                $displayMethod = $methodKey ?: __('common.unknown');
                $totalForMethod = $incomesForMethod->sum('amount');
                $incomeDisplayRows = $buildIncomeDisplayRows($incomesForMethod, 'method_'.$methodKey);
                @endphp
                <div class="card mb-2 border-0 shadow-sm">
                  <div
                    class="card-header bg-gradient-light p-3 cursor-pointer d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#{{ $incMethodCollapseId }}" aria-expanded="false"
                    data-total="{{ $totalForMethod }}">
                    <div class="d-flex align-items-center">
                      <i class="ti-angle-down mr-3 collapse-icon"></i>
                      <div>
                        <span class="font-weight-bold text-dark">{{ $displayMethod ?: 'Unknown' }}</span>
                        <div class="text-muted small">{{ $incomesForMethod->count() }} entries</div>
                      </div>
                    </div>
                    <div class="text-right">
                      <div class="amount-display">
                        <span class="currency-symbol">{{ generalSetting()->currency_symbol }}</span>
                        <span
                          class="amount-value font-weight-bold text-primary">{{ number_format($totalForMethod,2) }}</span>
                      </div>
                      <span class="badge badge-primary badge-pill">{{ $incomesForMethod->count() }}</span>
                    </div>
                  </div>
                  <div id="{{ $incMethodCollapseId }}" class="collapse" data-parent="#incomeMethodAccordion">
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped">
                          <thead class="thead-light">
                            <tr>
                              <th style="width:60px" class="text-center">#</th>
                              <th style="min-width:120px">@lang('common.date')</th>
                              <th style="min-width:150px">@lang('common.name')</th>
                              <th style="min-width:140px">@lang('fees.invoice_number')</th>
                              <th style="min-width:140px">@lang('accounts.head')</th>
                              <th style="min-width:100px" class="text-right">@lang('accounts.amount')</th>
                              <th style="width:120px" class="text-right">@lang('common.action')</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($incomeDisplayRows as $displayRow)
                            @if(($displayRow['type'] ?? null) === 'invoice')
                            @php
                            $group = $displayRow['bucket'];
                            $meta = $group['meta'] ?? [];
                            $methodNames = array_keys($group['payment_methods'] ?? []);
                            $headLabels = !empty($meta['fee_heads']) ? $meta['fee_heads'] :
                            array_keys($group['head_names'] ?? []);
                            $firstPaymentDate = optional($group['rows']->first())->date ?? null;
                            $invoiceExportPayload = [
                            'date' => $firstPaymentDate ? dateConvert($firstPaymentDate) : '',
                            'name' => $meta['student_name'] ?? __('common.unknown'),
                            'identifier' => $meta['student_roll'] ?? '',
                            'payment_method' => count($methodNames) ? implode(', ', $methodNames) : $displayMethod,
                            'details' => count($headLabels) ? implode(', ', $headLabels) : __('fees.fees_invoice'),
                            'invoice' => $meta['invoice_number'] ?? '',
                            'amount' => round($group['total_amount'] ?? 0, 2),
                            'amount_display' => generalSetting()->currency_symbol .
                            number_format($group['total_amount'] ?? 0,2),
                            'group_scope' => 'method',
                            ];
                            @endphp
                            <tr class="invoice-group-row" data-export='@json($invoiceExportPayload)'>
                              <td class="text-center">
                                <span class="font-weight-600">{{ $displayRow['row_number'] ?? $loop->iteration }}</span>
                              </td>
                              <td>{{ dateConvert(optional($group['rows']->first())->date) }}</td>
                              <td class="font-weight-500">
                                <div>{{ $meta['student_name'] ?? __('common.unknown') }}</div>
                                @if(!empty($meta['student_roll']))
                                <div class="text-muted small">@lang('student.roll'): {{ $meta['student_roll'] }}</div>
                                @endif
                              </td>
                              <td>
                                @if(!empty($meta['invoice_number']))
                                <span class="badge badge-outline-info">{{ $meta['invoice_number'] }}</span>
                                @else
                                <span class="text-muted">@lang('common.na')</span>
                                @endif
                              </td>
                              <td class="text-muted">
                                @if(count($headLabels))
                                {{ implode(', ', $headLabels) }}
                                @else
                                @lang('fees.fees_invoice')
                                @endif
                              </td>
                              <td class="text-right font-weight-600" data-amount="{{ $group['total_amount'] ?? 0 }}">
                                {{ generalSetting()->currency_symbol }}{{ number_format($group['total_amount'] ?? 0,2) }}
                              </td>
                              <td class="text-right">
                                @if(userPermission('fees.fees-invoice-view') && !empty($meta['view_url']))
                                <a class="btn btn-sm btn-outline-info d-inline-flex align-items-center"
                                  href="{{ $meta['view_url'] }}" target="_blank">
                                  <span>@lang('common.view')</span>
                                  @if(($group['entries'] ?? 0) > 1)
                                  <span
                                    class="badge badge-primary badge-pill ml-2">&sum;{{ $group['entries'] ?? 0 }}</span>
                                  @endif
                                </a>
                                @else
                                <span class="text-muted">—</span>
                                @endif
                              </td>
                            </tr>
                            @else
                            @php
                            $row = $displayRow['row'];
                            $headName = $displayRow['head_name'];
                            @endphp
                            @php
                            $manualExportPayload = [
                            'date' => $row->date ? dateConvert($row->date) : '',
                            'name' => $row->name,
                            'identifier' => '',
                            'payment_method' => optional($row->paymentMethod)->method ?: $displayMethod,
                            'details' => $headName,
                            'invoice' => optional($row->invoiceInfo)->invoice_number,
                            'amount' => round($row->amount, 2),
                            'amount_display' => generalSetting()->currency_symbol . number_format($row->amount,2),
                            'group_scope' => 'method',
                            ];
                            @endphp
                            <tr data-export='@json($manualExportPayload)'>
                              <td class="text-center">{{ $displayRow['row_number'] ?? $loop->iteration }}</td>
                              <td>{{ dateConvert($row->date) }}</td>
                              <td class="font-weight-500">{{ $row->name }}</td>
                              <td>
                                @if(!empty($row->invoiceInfo->invoice_number))
                                <span class="badge badge-outline-info">{{ $row->invoiceInfo->invoice_number }}</span>
                                @else
                                <span class="text-muted">@lang('common.na')</span>
                                @endif
                              </td>
                              <td class="text-muted">{{ $headName }}</td>
                              <td class="text-right font-weight-600" data-amount="{{ $row->amount }}">
                                {{ generalSetting()->currency_symbol }}{{ number_format($row->amount,2) }}</td>
                              <td class="text-right">
                                <div class="action-buttons-wrapper" data-income-id="{{ $row->id }}">
                                  <button class="btn btn-dots-trigger" type="button">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="inline-action-buttons d-none">
                                    @if (userPermission('add_income_edit'))
                                    <a class="btn btn-sm btn-outline-primary action-btn-edit"
                                      href="{{ route('add_income_edit', $row->id) }}" title="Edit">
                                      <i class="ti-pencil-alt"></i>
                                    </a>
                                    @endif
                                    @if (userPermission('add_income_delete'))
                                    <button
                                      class="btn btn-sm btn-outline-danger action-btn-delete income-delete-trigger"
                                      type="button" data-income-id="{{ $row->id }}" title="Delete">
                                      <i class="ti-trash"></i>
                                    </button>
                                    @endif
                                  </div>
                                </div>
                              </td>
                            </tr>
                            @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>

              {{-- Totals summary --}}
              <div id="incomeTotalsSummary" class="mt-3 mb-4">
                <div class="income-totals-bar d-flex flex-wrap align-items-center p-2 rounded shadow-sm">
                  <span class="mr-4"><strong>Page Total:</strong> {{ generalSetting()->currency_symbol }} <span
                      id="incomePageTotalAmount">0.00</span></span>
                  <span class="mr-4"><strong>Grand Total:</strong> {{ generalSetting()->currency_symbol }} <span
                      id="incomeGrandTotalAmount">0.00</span></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>


{{-- delete income modal here  --}}

<div class="modal fade admin-query" id="deleteIncomeModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('common.delete_income')</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <div class="text-center">
          <h4>@lang('common.are_you_sure_to_delete')</h4>
        </div>

        <div class="mt-40 d-flex justify-content-between">
          <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('common.cancel')</button>
          {{ html()->form('POST', route('add_income_delete'))->attribute('enctype', 'multipart/form-data')->open() }}
          <input type="hidden" name="id" value="">
          <button class="primary-btn fix-gr-bg" type="submit">@lang('common.delete')</button>
          {{ html()->form()->close() }}
        </div>
      </div>

    </div>
  </div>
</div>


@endsection
{{-- Removed server-side DataTable includes; using custom grouped view like expenses --}}
@include('backEnd.partials.data_table_js') {{-- keep assets for export buttons (pdfmake, etc.) --}}

@include('backEnd.partials.date_picker_css_js')

@push('script')
<script type="text/javascript">
function deleteIncome(id) {
  var m = $('#deleteIncomeModal');
  m.find('input[name=id]').val(id);
  m.modal('show');
}

const incomeCurrencySymbol = <?php echo json_encode(generalSetting()->currency_symbol); ?>;
const incomeAmountFormatter = (typeof Intl !== 'undefined' && Intl.NumberFormat) ?
  new Intl.NumberFormat(undefined, {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  }) :
  null;

function formatIncomeAmount(value) {
  const numeric = Number(value);
  const safeValue = isNaN(numeric) ? 0 : numeric;
  if (incomeAmountFormatter) {
    return (incomeCurrencySymbol || '') + incomeAmountFormatter.format(safeValue);
  }
  return (incomeCurrencySymbol || '') + safeValue.toFixed(2);
}

function escapeIncomeHtml(value) {
  const map = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    "'": '&#39;'
  };
  return (value ?? '').toString().replace(/[&<>"']/g, function(ch) {
    return map[ch] || ch;
  });
}
// Toggle icon rotation like expense view
$(document).on('show.bs.collapse',
  '#incomeDateAccordion .collapse, #incomeNameAccordion .collapse, #incomeMethodAccordion .collapse',
  function() {
    $(this).prev('.card-header').find('i.ti-angle-down').addClass('rotated');
  });
$(document).on('hide.bs.collapse',
  '#incomeDateAccordion .collapse, #incomeNameAccordion .collapse, #incomeMethodAccordion .collapse',
  function() {
    $(this).prev('.card-header').find('i.ti-angle-down').removeClass('rotated');
  });

// Hybrid pagination & grouping (copied/adapted from expense implementation)
(function() {
  const lengthKey = 'incomeGroups_pageLength';
  const validLengths = [10, 25, 50, 100, 250, 500, 10000];
  const urlParams = new URLSearchParams(window.location.search);
  let urlLen = parseInt(urlParams.get('inc_show_entries'));
  if (!validLengths.includes(urlLen)) urlLen = null;
  let saved = parseInt(localStorage.getItem(lengthKey) || '10');
  if (!validLengths.includes(saved)) saved = 10;
  const pageLength = urlLen || saved;
  const $lengthSelect = $('#incomePageLength');
  // Populate select
  $lengthSelect.empty();
  validLengths.forEach(v => {
    $lengthSelect.append('<option value="' + v + '" ' + (v === pageLength ? 'selected' : '') + '>' + v +
      '</option>');
  });
  $lengthSelect.val(pageLength);

  function currentAccordion() {
    const g = $('#incomeGroupBy').val();
    return $('.group-accordion[data-group="' + g + '"]');
  }

  function allCards() {
    return currentAccordion().children('.card');
  }

  function totalCards() {
    return allCards().length;
  }

  function render() {
    const len = parseInt($lengthSelect.val());
    const $cards = allCards();
    $cards.hide();
    let pageParam = parseInt(urlParams.get('inc_page') || '1');
    if (isNaN(pageParam) || pageParam < 1) pageParam = 1;
    const totalPages = Math.max(1, Math.ceil(totalCards() / len));
    if (pageParam > totalPages) pageParam = totalPages;
    const start = (pageParam - 1) * len;
    const end = start + len;
    $cards.slice(start, end).show();
    buildPager(pageParam, totalPages);
    updateIncomePageTotal();
  }

  function buildPager(current, totalPages) {
    const $p = $('#incomePagination');
    if (totalPages <= 1) {
      $p.empty();
      return;
    }
    let html = '<ul class="pagination pagination-sm mb-0">';

    function pageLink(p, label, disabled = false, active = false) {
      if (disabled) return '<li class="page-item disabled"><span class="page-link">' + label + '</span></li>';
      if (active) return '<li class="page-item active"><span class="page-link">' + label + '</span></li>';
      return '<li class="page-item"><a class="page-link" href="#" data-page="' + p + '">' + label + '</a></li>';
    }
    html += pageLink(current - 1, '&laquo;', current === 1);
    const windowSize = 5;
    let start = Math.max(1, current - Math.floor(windowSize / 2));
    let end = start + windowSize - 1;
    if (end > totalPages) {
      end = totalPages;
      start = Math.max(1, end - windowSize + 1);
    }
    if (start > 1) {
      html += pageLink(1, '1', false, current === 1);
      if (start > 2) html += '<li class="page-item disabled"><span class="page-link">…</span></li>';
    }
    for (let p = start; p <= end; p++) {
      html += pageLink(p, '' + p, false, p === current);
    }
    if (end < totalPages) {
      if (end < totalPages - 1) html += '<li class="page-item disabled"><span class="page-link">…</span></li>';
      html += pageLink(totalPages, '' + totalPages, false, current === totalPages);
    }
    html += pageLink(current + 1, '&raquo;', current === totalPages);
    html += '</ul>';
    $p.html(html);
  }
  $('#incomePagination').on('click', 'a.page-link', function(e) {
    e.preventDefault();
    const newPage = parseInt($(this).data('page'));
    if (!newPage) return;
    urlParams.set('inc_page', newPage);
    const params = urlParams.toString();
    const newUrl = window.location.pathname + (params ? '?' + params : '');
    window.history.replaceState({}, '', newUrl);
    render();
    document.getElementById('incomeDateAccordion').scrollIntoView({
      behavior: 'smooth'
    });
  });
  $lengthSelect.on('change', function() {
    const len = parseInt(this.value);
    if (!validLengths.includes(len)) return;
    localStorage.setItem(lengthKey, len);
    if (len === 10) urlParams.delete('inc_show_entries');
    else urlParams.set('inc_show_entries', len);
    urlParams.delete('inc_page');
    const params = urlParams.toString();
    const newUrl = window.location.pathname + (params ? '?' + params : '');
    window.history.replaceState({}, '', newUrl);
    render();
  });
  $('#incomeGroupBy').on('change', function() {
    const group = $(this).val();
    $('.group-accordion').addClass('d-none');
    $('.group-accordion[data-group="' + group + '"]').removeClass('d-none');
    urlParams.delete('inc_page');
    const params = urlParams.toString();
    const newUrl = window.location.pathname + (params ? '?' + params : '');
    window.history.replaceState({}, '', newUrl);
    render();
  });
  render();
  computeGrandTotalIncome();
})();

function computeGrandTotalIncome() {
  let grand = 0;
  $('.group-accordion[data-group]:not(.d-none) .card-header[data-total]').each(function() {
    const v = parseFloat($(this).data('total'));
    if (!isNaN(v)) grand += v;
  });
  if (!grand && $('#incomeGrandTotalAmount').length) {
    $('.group-accordion .card-header[data-total]').each(function() {
      const v = parseFloat($(this).data('total'));
      if (!isNaN(v)) grand += v;
    });
  }
  $('#incomeGrandTotalAmount').text(grand.toLocaleString(undefined, {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  }));
  return grand;
}

function updateIncomePageTotal() {
  const $acc = $('.group-accordion:not(.d-none)');
  let page = 0;
  $acc.children('.card:visible').each(function() {
    const v = parseFloat($(this).find('> .card-header').data('total'));
    if (!isNaN(v)) page += v;
  });
  $('#incomePageTotalAmount').text(page.toLocaleString(undefined, {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  }));
  computeGrandTotalIncome();
}
document.addEventListener('click', function(e) {
  var trigger = e.target.closest('.income-delete-trigger');
  if (trigger) {
    e.preventDefault();
    var id = trigger.getAttribute('data-income-id');
    if (id) deleteIncome(id);
  }
});

// Custom Action Dropdown Handler for Income
document.addEventListener('click', function(e) {
  // New inline action buttons handler
  var dotsBtn = e.target.closest('.btn-dots-trigger');

  if (dotsBtn) {
    e.preventDefault();
    e.stopPropagation();

    var wrapper = dotsBtn.closest('.action-buttons-wrapper');
    var dotsButton = wrapper.querySelector('.btn-dots-trigger');
    var inlineButtons = wrapper.querySelector('.inline-action-buttons');

    // Hide dots button and show inline buttons
    dotsButton.classList.add('d-none');
    inlineButtons.classList.remove('d-none');

    return;
  }

  // Close all expanded buttons when clicking outside
  if (!e.target.closest('.action-buttons-wrapper')) {
    document.querySelectorAll('.action-buttons-wrapper').forEach(wrapper => {
      var dotsButton = wrapper.querySelector('.btn-dots-trigger');
      var inlineButtons = wrapper.querySelector('.inline-action-buttons');

      if (dotsButton && inlineButtons) {
        dotsButton.classList.remove('d-none');
        inlineButtons.classList.add('d-none');
      }
    });
  }

  var actionBtn = e.target.closest('.btn-custom-action');

  if (actionBtn) {
    e.preventDefault();
    e.stopPropagation();

    // Close all other dropdowns
    document.querySelectorAll('.action-dropdown-wrapper.show').forEach(wrapper => {
      if (wrapper !== actionBtn.parentElement) {
        wrapper.classList.remove('show');
      }
    });

    // Toggle current dropdown
    actionBtn.parentElement.classList.toggle('show');

    return;
  }

  // Close dropdown when clicking outside
  if (!e.target.closest('.action-dropdown-wrapper')) {
    document.querySelectorAll('.action-dropdown-wrapper.show').forEach(wrapper => {
      wrapper.classList.remove('show');
    });
  }
});

// Export logic (adapted)
$(function() {
  function fallbackIncomePayload(rowEl, groupScope) {
    const $tds = $(rowEl).find('td');
    if (!$tds.length) return null;
    const textAt = index => ($tds.eq(index).text() || '').trim();
    const amountCell = $tds.filter('[data-amount]').first();
    let amount = amountCell.length ? parseFloat(amountCell.data('amount')) : NaN;
    if (isNaN(amount)) {
      const fallbackText = textAt(Math.max(0, $tds.length - 2));
      const numeric = parseFloat(fallbackText.replace(/[^0-9.,-]/g, '').replace(/,/g, ''));
      amount = isNaN(numeric) ? 0 : numeric;
    }
    const payload = {
      date: groupScope === 'method' ? textAt(1) : '',
      name: groupScope === 'method' ? textAt(2) : textAt(1),
      identifier: '',
      payment_method: groupScope === 'method' ?
        $('#incomeMethodAccordion').find('> .card:visible').first().find('.card-header .font-weight-bold').text()
        .trim() : textAt(2),
      details: groupScope === 'method' ? textAt(4) : textAt(3),
      amount: isNaN(amount) ? 0 : amount,
      amount_display: formatIncomeAmount(isNaN(amount) ? 0 : amount)
    };
    return payload;
  }

  function parseIncomeExportPayload(rowEl, groupScope) {
    const raw = rowEl.getAttribute('data-export');
    let payload = null;
    if (raw) {
      try {
        payload = JSON.parse(raw);
      } catch (err) {
        console.warn('Income export payload parse failed', err);
      }
    }
    if (!payload) {
      payload = fallbackIncomePayload(rowEl, groupScope);
    }
    if (!payload) return null;
    const normalizedAmount = Number(payload.amount);
    payload.amount = isNaN(normalizedAmount) ? 0 : normalizedAmount;
    payload.amount_display = payload.amount_display || formatIncomeAmount(payload.amount);
    payload.date = payload.date || '';
    payload.name = payload.name || '';
    payload.identifier = payload.identifier || '';
    payload.payment_method = payload.payment_method || '';
    payload.details = payload.details || payload.head || payload.invoice || '';
    return payload;
  }

  function collectIncomeRows() {
    const group = $('#incomeGroupBy').val();
    const rows = [];
    $('.group-accordion[data-group="' + group + '"]').find('tbody tr').each(function() {
      const payload = parseIncomeExportPayload(this, group);
      if (!payload) return;
      rows.push({
        date: payload.date,
        name: payload.name,
        identifier: payload.identifier,
        payment_method: payload.payment_method,
        details: payload.details,
        amount: payload.amount,
        amount_display: payload.amount_display || formatIncomeAmount(payload.amount)
      });
    });
    return rows;
  }

  function buildIncomeExportTable(rows) {
    let grand = 0;
    rows.forEach(r => {
      const v = Number(r.amount);
      if (!isNaN(v)) grand += v;
    });
    const $c = $('#incomeExportContainer');
    $c.empty();
    const id = 'incomeExportTable';
    let html = '<table id="' + id +
      '" class="table table-sm"><thead><tr><th>Date</th><th>Name</th><th>Identifier</th><th>Payment Method</th><th>Details</th><th class="text-right">Amount</th></tr></thead><tbody>';
    rows.forEach(r => {
      html += '<tr><td>' + escapeIncomeHtml(r.date) + '</td><td>' + escapeIncomeHtml(r.name) + '</td><td>' +
        escapeIncomeHtml(r.identifier) + '</td><td>' + escapeIncomeHtml(r.payment_method) + '</td><td>' +
        escapeIncomeHtml(r.details) + '</td><td class="text-right">' +
        escapeIncomeHtml(r.amount_display || formatIncomeAmount(r.amount)) + '</td></tr>';
    });
    html +=
      '</tbody><tfoot><tr style="font-weight:bold;background:#f5f5f5;"><td colspan="5" class="text-right">Total</td><td class="text-right">' +
      escapeIncomeHtml(formatIncomeAmount(grand)) + '</td></tr></tfoot></table>';
    $c.append(html);
    return {
      id,
      grand
    };
  }
  let dtInstance = null;

  function ensureDT(id) {
    if (dtInstance) {
      try {
        dtInstance.destroy();
      } catch (e) {}
      dtInstance = null;
    }
    if (!$.fn || !$.fn.DataTable) {
      console.error('DataTables not loaded');
      return;
    }
    try {
      dtInstance = $('#' + id).DataTable({
        paging: false,
        searching: false,
        info: false,
        ordering: false,
        dom: 'Bfrtip',
        buttons: [{
          extend: 'excelHtml5',
          title: $('#logo_title').val() || 'Incomes',
          footer: true
        }, {
          extend: 'csvHtml5',
          title: $('#logo_title').val() || 'Incomes',
          footer: true,
          bom: true,
          charset: 'utf-8'
        }, {
          extend: 'pdfHtml5',
          title: $('#logo_title').val() || 'Incomes',
          orientation: 'landscape',
          pageSize: 'A4',
          footer: true,
          customize: function(doc) {
            doc.defaultStyle.font = (window._banglaFontReady ? 'BanglaFont' : 'DejaVuSans');
          }
        }, {
          extend: 'print',
          title: $('#logo_title').val() || 'Incomes',
          footer: true
        }]
      });
    } catch (e) {
      console.error('Income DataTable init failed', e);
      dtInstance = null;
    }
  }
  async function loadBanglaFontIncome() {
    if (window._banglaFontReady) return true;
    if (typeof pdfMake === 'undefined' || !pdfMake.addFileToVFS) return false;
    const fontFiles = ['NotoSansBengali-Regular.ttf', 'NotoSansBengali-Bold.ttf'];
    const roots = [];
    const app = (window.APP_URL ? window.APP_URL.replace(/\/$/, '') : '');
    ['/fonts/', '/public/fonts/'].forEach(p => {
      roots.push(app + p);
      if (!app) roots.push(p);
    });
    try {
      for (const file of fontFiles) {
        let loaded = false;
        for (const r of roots) {
          try {
            const res = await fetch(r + file, {
              cache: 'reload'
            });
            if (res.ok) {
              const buf = await res.arrayBuffer();
              let bin = '';
              const bytes = new Uint8Array(buf);
              for (let i = 0; i < bytes.length; i++) {
                bin += String.fromCharCode(bytes[i]);
              }
              pdfMake.addFileToVFS(file, btoa(bin));
              loaded = true;
              break;
            }
          } catch (_) {}
        }
        if (!loaded) return false;
      }
      pdfMake.fonts = pdfMake.fonts || {};
      pdfMake.fonts.BanglaFont = {
        normal: 'NotoSansBengali-Regular.ttf',
        bold: 'NotoSansBengali-Bold.ttf',
        italics: 'NotoSansBengali-Regular.ttf',
        bolditalics: 'NotoSansBengali-Bold.ttf'
      };
      window._banglaFontReady = true;
      return true;
    } catch (e) {
      return false;
    }
  }

  function escapeCsv(value) {
    return (value ?? '').toString().replace(/"/g, '""');
  }

  function manualCSV(rows) {
    let csv = '"Date","Name","Identifier","Payment Method","Details","Amount"\n';
    rows.forEach(r => {
      const amountNumeric = Number(r.amount);
      const amount = isNaN(amountNumeric) ? '0.00' : amountNumeric.toFixed(2);
      csv += '"' + escapeCsv(r.date) + '","' + escapeCsv(r.name) + '","' + escapeCsv(r.identifier) + '","' +
        escapeCsv(r.payment_method) + '","' + escapeCsv(r.details) + '","' + amount + '"\n';
    });
    const blob = new Blob(['\uFEFF' + csv], {
      type: 'text/csv;charset=utf-8;'
    });
    const a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = ($('#logo_title').val() || 'Incomes') + '.csv';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
  }

  function manualPrint(id) {
    const w = window.open('', '_blank');
    if (!w) {
      alert('Popup blocked');
      return;
    }
    w.document.write('<html><head><title>' + ($('#logo_title').val() || 'Incomes') +
      '</title><style>table{width:100%;border-collapse:collapse;}th,td{border:1px solid #444;padding:4px;font-size:12px;}tfoot td{font-weight:bold;}</style></head><body>' +
      document.getElementById(id).outerHTML + '</body></html>');
    w.document.close();
    w.focus();
    w.print();
    setTimeout(() => {
      try {
        w.close();
      } catch (_) {}
    }, 500);
  }

  async function trigger(type) {
    const rows = collectIncomeRows();
    if (type === 'pdf' && !window._banglaFontReady) {
      await loadBanglaFontIncome();
    }
    const exportTable = buildIncomeExportTable(rows);
    const id = exportTable.id;
    ensureDT(id);
    if (!dtInstance) {
      if (type === 'csv') return manualCSV(rows);
      if (type === 'print') return manualPrint(id);
      if (type === 'excel') {
        console.warn('Excel fallback -> CSV');
        return manualCSV(rows);
      }
      if (type === 'pdf') {
        return alert('PDF export assets missing.');
      }
      return;
    }
    try {
      if (type === 'excel') dtInstance.button(0).trigger();
      else if (type === 'csv') dtInstance.button(1).trigger();
      else if (type === 'pdf') dtInstance.button(2).trigger();
      else if (type === 'print') dtInstance.button(3).trigger();
    } catch (e) {
      console.error('Income export trigger failed', e);
      if (type === 'csv') manualCSV(rows);
      else if (type === 'print') manualPrint(id);
    }
  }
  $('#incExportExcel').on('click', () => trigger('excel'));
  $('#incExportCSV').on('click', () => trigger('csv'));
  $('#incExportPDF').on('click', () => trigger('pdf'));
  $('#incExportPrint').on('click', () => trigger('print'));
  if (typeof updateIncomePageTotal === 'function') {
    updateIncomePageTotal();
  }
});
</script>
<style>
/* Professional Card and Accordion Styling */
#incomeDateAccordion .card-header,
#incomeNameAccordion .card-header,
#incomeMethodAccordion .card-header {
  cursor: pointer;
  transition: all 0.3s ease;
  border-left: 4px solid #007bff;
}

#incomeDateAccordion .card-header:hover,
#incomeNameAccordion .card-header:hover,
#incomeMethodAccordion .card-header:hover {
  background: linear-gradient(45deg, #f8f9ff 0%, #e8f0ff 100%) !important;
  border-left: 4px solid #0056b3;
  transform: translateX(2px);
}

/* Collapse Icon Styling */
.collapse-icon {
  transition: transform 0.3s ease;
  color: #007bff;
  font-size: 16px;
}

#incomeDateAccordion i.ti-angle-down.rotated,
#incomeNameAccordion i.ti-angle-down.rotated,
#incomeMethodAccordion i.ti-angle-down.rotated {
  transform: rotate(180deg);
}

/* Amount Display Styling */
.amount-display {
  display: flex;
  align-items: baseline;
  margin-bottom: 4px;
}

.currency-symbol {
  font-size: 14px;
  color: #6c757d;
  margin-right: 2px;
}

.amount-value {
  font-size: 16px;
  letter-spacing: 0.5px;
}

/* Gradient Backgrounds */
.bg-gradient-light {
  background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
}

/* Table Professional Styling */
.group-accordion table {
  border-collapse: separate;
  border-spacing: 0;
}

.group-accordion table thead th {
  background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
  font-weight: 600;
  border-bottom: 2px solid #cbd5e0;
  color: #2d3748;
  text-transform: uppercase;
  font-size: 11px;
  letter-spacing: 0.5px;
  padding: 12px 8px;
}

.group-accordion table tbody td {
  vertical-align: middle;
  padding: 12px 8px;
  border-bottom: 1px solid #e2e8f0;
}

.group-accordion table tbody tr {
  transition: background-color 0.2s ease;
}

.group-accordion table tbody tr:nth-child(even) {
  background: #fbfcfd;
}

.group-accordion table tbody tr:hover {
  background: linear-gradient(135deg, #f0f8ff 0%, #e6f3ff 100%);
  transform: scale(1.001);
}

.invoice-group-row {
  background: linear-gradient(135deg, #f9fff9 0%, #f0fff4 100%);
  border-left: 4px solid #28a745;
}

.invoice-group-row td {
  vertical-align: middle;
}

.invoice-group-row .badge-light {
  background: #f1f5f9;
  border: 1px solid #e2e8f0;
}

/* Card Styling */
.group-accordion .card {
  border: 1px solid #e2e8f0;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
  transition: all 0.3s ease;
}

.group-accordion .card:hover {
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  transform: translateY(-1px);
}

/* Badge Styling */
.badge-primary {
  background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
  border: none;
  font-weight: 500;
}

.badge-outline-info {
  color: #17a2b8;
  border: 1px solid #17a2b8;
  background: rgba(23, 162, 184, 0.1);
  font-weight: 500;
}

/* Button Styling */
.btn-outline-secondary {
  border: 1px solid #6c757d;
  color: #6c757d;
  background: white;
  transition: all 0.2s ease;
}

.btn-outline-secondary:hover {
  background: #6c757d;
  color: white;
  transform: translateY(-1px);
}

/* Dropdown Styling */
.dropdown-menu {
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  border-radius: 6px;
  z-index: 1050 !important;
  position: absolute !important;
}

.dropdown {
  position: relative;
  z-index: 999;
}

.dropdown.show .dropdown-menu {
  z-index: 1060 !important;
}

/* Custom Action Button & Dropdown */
/* Custom Action Buttons for Income */
.action-buttons-wrapper {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: flex-end;
  gap: 6px;
}

.btn-dots-trigger {
  background: transparent;
  border: 1px solid #e0e6ed;
  color: #495057;
  padding: 6px 12px;
  border-radius: 4px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  font-size: 16px;
  line-height: 1;
  min-width: 36px;
  height: 32px;
  transition: all 0.2s ease;
}

.btn-dots-trigger:hover {
  background-color: #f8f9fa;
  border-color: #adb5bd;
  color: #495057;
}

.inline-action-buttons {
  display: flex;
  align-items: center;
  gap: 4px;
  animation: slideIn 0.2s ease-out;
}

.inline-action-buttons .btn {
  min-width: 32px;
  height: 32px;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
  border-radius: 4px;
  transition: all 0.2s ease;
}

.inline-action-buttons .btn:hover {
  transform: translateY(-1px);
}

@keyframes slideIn {
  from {
    opacity: 0;
    transform: translateX(10px);
  }

  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.action-dropdown-wrapper {
  position: relative !important;
  z-index: 1000 !important;
}

.btn-custom-action {
  width: 32px;
  height: 32px;
  border-radius: 6px;
  border: 1px solid #e2e8f0;
  background: white;
  color: #6c757d;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
  transition: all 0.2s ease;
  position: relative;
  z-index: 1001 !important;
}

.btn-custom-action:hover {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
  border-color: #007bff;
  color: #007bff;
  transform: translateY(-1px);
  box-shadow: 0 2px 8px rgba(0, 123, 255, 0.15);
}

.btn-custom-action:focus {
  outline: none;
  box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.2);
}

.custom-dropdown-menu {
  position: absolute;
  top: 100%;
  right: 0;
  z-index: 1100 !important;
  display: none;
  min-width: 160px;
  padding: 6px 0;
  margin: 2px 0 0 0;
  background-color: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 8px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
  opacity: 0;
  transform: translateY(-5px) scale(0.95);
  transition: all 0.2s ease;
}

.action-dropdown-wrapper.show .custom-dropdown-menu {
  display: block;
  opacity: 1;
  transform: translateY(0) scale(1);
}

.custom-dropdown-item {
  display: flex;
  align-items: center;
  width: 100%;
  padding: 8px 16px;
  color: #495057;
  text-decoration: none;
  background-color: transparent;
  border: 0;
  transition: all 0.2s ease;
}

.custom-dropdown-item:hover {
  color: #007bff;
  background-color: rgba(0, 123, 255, 0.08);
  text-decoration: none;
}

.custom-dropdown-item.text-danger:hover {
  color: #dc3545 !important;
  background-color: rgba(220, 53, 69, 0.08);
}

.custom-dropdown-item i {
  width: 16px;
  margin-right: 8px;
  font-size: 14px;
}

.custom-dropdown-item span {
  font-size: 13px;
  font-weight: 500;
}

.dropdown-item {
  padding: 8px 16px;
  transition: all 0.2s ease;
}

.dropdown-item:hover {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.dropdown-item.text-danger:hover {
  background: linear-gradient(135deg, #fff5f5 0%, #fed7d7 100%);
  color: #c53030 !important;
}

/* Typography */
.font-weight-500 {
  font-weight: 500;
}

.font-weight-600 {
  font-weight: 600;
}

/* Totals Bar */
.income-totals-bar {
  background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
  border: 1px solid #cbd5e0;
  border-radius: 8px;
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.06);
}

/* Pagination */
#incomePagination ul.pagination {
  margin-bottom: 0;
}

.pagination .page-item .page-link {
  border: 1px solid #dee2e6;
  color: #495057;
  transition: all 0.2s ease;
}

.pagination .page-item .page-link:hover {
  background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
  border-color: #adb5bd;
  transform: translateY(-1px);
}

.pagination .page-item.active .page-link {
  background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
  border-color: #007bff;
}

/* Export Buttons */
.primary-btn.small {
  padding: 6px 12px;
  line-height: 1.3;
  font-size: 13px;
  border-radius: 4px;
  transition: all 0.2s ease;
}

.primary-btn.small:hover {
  transform: translateY(-1px);
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
}

/* Responsive Design */
@media (max-width: 768px) {
  .group-accordion table {
    font-size: 12px;
  }

  .card-header {
    padding: 8px 12px !important;
  }

  .amount-value {
    font-size: 14px;
  }
}
</style>
@endpush