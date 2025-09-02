@extends('backEnd.master')
@section('title')
@lang('accounts.add_expense')
@endsection
@section('mainContent')
@php
$setting = app('school_info');
if (!empty(@$setting->currency_symbol)) {
@$currency = @$setting->currency_symbol;
} else {
@$currency = '$';
}
@endphp

<section class="sms-breadcrumb mb-20">
  <div class="container-fluid">
    <div class="row justify-content-between">
      <h1>@lang('accounts.add_expense') </h1>
      <div class="bc-pages">
        <a href="{{ route('dashboard') }}">@lang('common.dashboard') </a>
        <a href="#">@lang('accounts.accounts')</a>
        <a href="#">@lang('accounts.add_expense')</a>
      </div>
    </div>
  </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
  <div class="container-fluid p-0">
    @if (isset($add_expense))
    @if (userPermission('add-expense-store'))
    <div class="row">
      <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
        <a href="{{ route('add-expense') }}" class="primary-btn small fix-gr-bg">
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
            @if (isset($add_expense))
            {{ html()->form('PUT', route('add-expense-update', @$add_expense->id))->attributes([
                                        'class' => 'form-horizontal',
                                        'files' => true,
                                        'enctype' => 'multipart/form-data',
                                        'id' => 'add-expense-update',
                                    ])->open() }}
            @else
            @if (userPermission('add-expense-store'))
            {{ html()->form('POST', route('add-expense-store'))->attributes([
                                            'class' => 'form-horizontal',
                                            'files' => true,
                                            'enctype' => 'multipart/form-data',
                                            'id' => 'add-expense',
                                        ])->open() }}
            @endif
            @endif

            <div class="white-box">
              <div class="main-title">

                <h3 class="mb-15">
                  @if (isset($add_expense))
                  @lang('accounts.edit_expense')
                  @else
                  @lang('accounts.add_expense')
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
                        value="{{ isset($add_expense) ? $add_expense->name : old('name') }}">
                      <input type="hidden" name="id" value="{{ isset($add_expense) ? $add_expense->id : '' }}">


                      @if (@$errors->has('name'))
                      <span class="text-danger">
                        <strong>{{ @$errors->first('name') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row  mt-15">
                  <div class="col-lg-12">
                    <label class="primary_input_label" for="">@lang('accounts.a_c_Head') <span class="text-danger">
                        *</span></label>
                    <select class="primary_select  form-control{{ @$errors->has('expense_head') ? ' is-invalid' : '' }}"
                      name="expense_head">
                      <option data-display="@lang('accounts.a_c_Head') *" value="">
                        @lang('accounts.a_c_Head') *</option>
                      @foreach ($expense_heads as $expense_head)
                      @if (isset($add_expense))
                      <option value="{{ @$expense_head->id }}"
                        {{ @$add_expense->expense_head_id == @$expense_head->id ? 'selected' : '' }}>
                        {{ @$expense_head->head }}</option>
                      @else
                      <option value="{{ @$expense_head->id }}"
                        {{ old('expense_head') == @$expense_head->id ? 'selected' : '' }}>
                        {{ @$expense_head->head }}</option>
                      @endif
                      @endforeach
                    </select>
                    @if ($errors->has('expense_head'))
                    <span class="text-danger invalid-select" role="alert">
                      <strong>{{ @$errors->first('expense_head') }}</strong>
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
                      @if (isset($add_expense))
                      <option data-string="{{ $payment_method->method }}" value="{{ @$payment_method->id }}"
                        {{ @$add_expense->payment_method_id == @$payment_method->id ? 'selected' : '' }}>
                        {{ @$payment_method->method }}</option>
                      @else
                      <option data-string="{{ $payment_method->method }}" value="{{ @$payment_method->id }}"
                        {{ old('payment_method') == @$payment_method->id ? 'selected' : '' }}>
                        {{ @$payment_method->method }}</option>
                      @endif
                      @endforeach
                    </select>
                    @if ($errors->has('payment_method'))
                    <span class="text-danger invalid-select" role="alert">
                      <strong>{{ @$errors->first('payment_method') }}</strong>
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
                      @if (isset($add_expense))
                      <option value="{{ @$bank_account->id }}"
                        {{ @$add_expense->account_id == @$bank_account->id ? 'selected' : '' }}>
                        {{ @$bank_account->account_name }}
                        ({{ @$bank_account->bank_name }})
                      </option>
                      @else
                      <option value="{{ @$bank_account->id }}">
                        {{ @$bank_account->account_name }}
                        ({{ @$bank_account->bank_name }})</option>
                      @endif
                      @endforeach
                    </select>
                    @if ($errors->has('accounts'))
                    <span class="text-danger invalid-select" role="alert">
                      <strong>{{ @$errors->first('accounts') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="row mt-15">

                  <div class="col-lg-12">
                    <div class="primary_input">
                      <label class="primary_input_label" for="">@lang('admin.date')<span class="text-danger">
                          *</span></label>
                      <div class="primary_datepicker_input">
                        <div class="no-gutters input-right-icon">
                          <div class="col">
                            <div class="">
                              <input
                                class="primary_input_field  primary_input_field date form-control form-control{{ @$errors->has('date') ? ' is-invalid' : '' }}"
                                id="startDate" type="text" placeholder="@lang('common.date') " name="date"
                                value="{{ isset($add_expense) ? date('m/d/Y', strtotime($add_expense->date)) : date('m/d/Y') }}">
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
                      <input oninput="numberCheckWithDot(this)"
                        class="primary_input_field form-control{{ @$errors->has('amount') ? ' is-invalid' : '' }}"
                        type="text" name="amount" step="0.1" autocomplete="off"
                        value="{{ isset($add_expense) ? $add_expense->amount : old('amount') }}">


                      @if ($errors->has('amount'))
                      <span class="text-danger">
                        <strong>{{ @$errors->first('amount') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row mt-25">

                  <div class="col-lg-12 mt-15">
                    <div class="primary_input">
                      <div class="primary_file_uploader">
                        <input class="primary_input_field" type="text" id="placeholderInput"
                          placeholder="{{ isset($add_expense) ? ($add_expense->file != '' ? getFilePath3($add_expense->file) : trans('common.file')) : trans('common.file') }}"
                          readonly>
                        <button class="" type="button">
                          <label class="primary-btn small fix-gr-bg" for="browseFile">{{ __('common.browse') }}</label>
                          <input type="file" class="d-none" name="file" id="browseFile">
                        </button>
                      </div>
                    </div>
                    <code>(PDF,DOC,DOCX,JPG,JPEG,PNG,TXT are allowed for upload)</code>
                    @if ($errors->has('file'))
                    <span class="text-danger d-block">
                      {{ $errors->first('file') }}
                    </span>
                    @endif
                  </div>
                </div>
                <div class="row mt-25">
                  <div class="col-lg-12">
                    <div class="primary_input">
                      <label class="primary_input_label" for="">@lang('common.description')
                        <span></span></label>
                      <textarea class="primary_input_field form-control" cols="0" rows="4"
                        name="description">{{ isset($add_expense) ? $add_expense->description : old('description') }}</textarea>


                    </div>
                  </div>
                </div>
                @php
                $tooltip = '';
                if (userPermission('add-expense-store') || userPermission('add-expense-edit')) {
                $tooltip = '';
                } else {
                $tooltip = 'You have no permission to add';
                }
                @endphp
                <div class="row mt-40">
                  <div class="col-lg-12 text-center">
                    <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="{{ $tooltip }}">
                      <span class="ti-check"></span>
                      @if (isset($add_expense))
                      @lang('accounts.update_expense')
                      @else
                      @lang('accounts.save_expense')
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
          <div class="row align-items-center mb-3">
            <div class="col-6">
              <div class="main-title">
                <h3 class="mb-0">@lang('accounts.expense_list')</h3>
              </div>
            </div>
            <div class="col-6 text-right">
              <div class="d-inline-flex flex-wrap justify-content-end">
                <button type="button" class="primary-btn small fix-gr-bg mr-2 mb-2" id="expExportExcel">
                  @lang('common.export') XLSX
                </button>
                <button type="button" class="primary-btn small fix-gr-bg mr-2 mb-2" id="expExportCSV">
                  @lang('common.export') CSV
                </button>
                <!-- <button type="button" class="primary-btn small fix-gr-bg mr-2 mb-2" id="expExportPDF">
                  @lang('common.export') PDF
                </button> -->
                <button type="button" class="primary-btn small fix-gr-bg mb-2" id="expExportPrint">
                  @lang('common.print')
                </button>
              </div>
            </div>
          </div>

          {{-- Group view selector + grouped accordions with hybrid page selector --}}
          <div class="row">
            <div class="col-lg-12">

              <div class="d-flex justify-content-start align-items-center mb-3 flex-wrap">
                <label class="mb-0 mr-2 font-weight-bold">Group by:</label>
                <select id="expenseGroupBy" class="primary_select" style="min-width:160px;display:inline-block;">
                  <option value="date" selected>@lang('common.date')</option>
                  <option value="head">@lang('accounts.a_c_Head')</option>
                  <option value="method">@lang('accounts.payment_method')</option>
                </select>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap">
                <div class="mb-2">
                  <label class="mb-0 mr-2">Show</label>
                  <select id="expensePageLength" class="form-control" style="min-width:90px;display:inline-block;">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="250">250</option>
                    <option value="500">500</option>
                    <option value="10000">10000</option>
                  </select>
                  <span>entries</span>
                </div>
                <div id="expensePagination" class="mb-2"></div>
              </div>

              <div id="expenseExportContainer"
                style="position:absolute;left:-9999px;top:-9999px;width:1px;height:1px;overflow:hidden;"></div>
              <div id="expenseDateAccordion" class="mb-20 group-accordion" data-group="date">
                @php
                // Fallback if controller did not pass grouped_expenses
                if(!isset($grouped_expenses) && isset($add_expenses)){
                $grouped_expenses = $add_expenses->groupBy(function($e){ return $e->date; })->sortKeysDesc();
                }
                @endphp
                @forelse($grouped_expenses as $dateKey => $expensesForDate)
                @php
                $collapseId = 'expDate_' . md5($dateKey);
                $displayDate = date('M d, Y', strtotime($dateKey));
                $totalForDate = $expensesForDate->sum('amount');
                @endphp
                <div class="card mb-2 border-0 shadow-sm">
                  <div
                    class="card-header bg-gradient-light p-3 cursor-pointer d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#{{ $collapseId }}"
                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="{{ $collapseId }}"
                    data-total="{{ $totalForDate }}">
                    <div class="d-flex align-items-center">
                      <i class="ti-angle-down mr-3 collapse-icon"></i>
                      <div>
                        <span class="font-weight-bold text-dark">{{ $displayDate }}</span>
                        <div class="text-muted small">{{ $expensesForDate->count() }} entries</div>
                      </div>
                    </div>
                    <div class="text-right">
                      <div class="amount-display">
                        <span class="currency-symbol">{{ generalSetting()->currency_symbol }}</span>
                        <span
                          class="amount-value font-weight-bold text-primary">{{ number_format($totalForDate,2) }}</span>
                      </div>
                      <span class="badge badge-primary badge-pill">{{ $expensesForDate->count() }}</span>
                    </div>
                  </div>
                  <div id="{{ $collapseId }}" class="collapse @if($loop->first) show @endif"
                    data-parent="#expenseDateAccordion">
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped">
                          <thead class="thead-light">
                            <tr>
                              <th style="width:60px" class="text-center">#</th>
                              <th style="min-width:150px">@lang('common.name')</th>
                              <th style="min-width:120px">@lang('accounts.payment_method')</th>
                              <th style="min-width:140px">@lang('accounts.a_c_Head')</th>
                              <th style="min-width:100px" class="text-right">@lang('accounts.amount')</th>
                              <th style="width:120px" class="text-right">@lang('common.action')</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($expensesForDate as $index => $expense)
                            <tr>
                              <td class="text-center">{{ $index + 1 }}</td>
                              <td class="font-weight-500">{{ $expense->name }}</td>
                              <td><span
                                  class="badge badge-outline-info">{{ optional($expense->paymentMethod)->method }}</span>
                              </td>
                              <td class="text-muted">{{ optional($expense->ACHead)->head }}</td>
                              <td class="text-right font-weight-600">
                                {{ generalSetting()->currency_symbol }}{{ number_format($expense->amount,2) }}</td>
                              <td class="text-right">
                                <div class="dropdown CRM_dropdown">
                                  <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                    id="dropdownMenuButton{{ $expense->id }}" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    @lang('common.select')
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right"
                                    aria-labelledby="dropdownMenuButton{{ $expense->id }}">
                                    @if(userPermission('add-expense-edit'))
                                    <a class="dropdown-item" href="{{ route('add-expense-edit', $expense->id) }}">
                                      <i class="ti-pencil-alt mr-2"></i>@lang('common.edit')
                                    </a>
                                    @endif
                                    @if(userPermission('add-expense-delete'))
                                    <a class="dropdown-item text-danger expense-delete-trigger" href="#"
                                      data-expense-id="{{ $expense->id }}">
                                      <i class="ti-trash mr-2"></i>@lang('common.delete')
                                    </a>
                                    @endif
                                  </div>
                                </div>
                              </td>
                            </tr>
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
              {{-- Grouped by A/C Head --}}
              <div id="expenseHeadAccordion" class="mb-20 group-accordion d-none" data-group="head">
                @foreach(($grouped_by_head ?? collect()) as $headKey => $expensesForHead)
                @php
                $collapseId = 'expHead_' . md5($headKey);
                $displayHead = $headKey;
                $totalForHead = $expensesForHead->sum('amount');
                @endphp
                <div class="card mb-2 border-0 shadow-sm">
                  <div
                    class="card-header bg-gradient-light p-3 cursor-pointer d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#{{ $collapseId }}" aria-expanded="false"
                    aria-controls="{{ $collapseId }}" data-total="{{ $totalForHead }}">
                    <div class="d-flex align-items-center">
                      <i class="ti-angle-down mr-3 collapse-icon"></i>
                      <div>
                        <span class="font-weight-bold text-dark">{{ $displayHead }}</span>
                        <div class="text-muted small">{{ $expensesForHead->count() }} entries</div>
                      </div>
                    </div>
                    <div class="text-right">
                      <div class="amount-display">
                        <span class="currency-symbol">{{ generalSetting()->currency_symbol }}</span>
                        <span
                          class="amount-value font-weight-bold text-primary">{{ number_format($totalForHead,2) }}</span>
                      </div>
                      <span class="badge badge-primary badge-pill">{{ $expensesForHead->count() }}</span>
                    </div>
                  </div>
                  <div id="{{ $collapseId }}" class="collapse" data-parent="#expenseHeadAccordion">
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped">
                          <thead class="thead-light">
                            <tr>
                              <th style="width:60px" class="text-center">#</th>
                              <th style="min-width:150px">@lang('common.name')</th>
                              <th style="min-width:120px">@lang('accounts.payment_method')</th>
                              <th style="min-width:140px">@lang('accounts.a_c_Head')</th>
                              <th style="min-width:100px" class="text-right">@lang('accounts.amount')</th>
                              <th style="width:120px" class="text-right">@lang('common.action')</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($expensesForHead as $index => $expense)
                            <tr>
                              <td class="text-center">{{ $index + 1 }}</td>
                              <td class="font-weight-500">{{ $expense->name }}</td>
                              <td><span
                                  class="badge badge-outline-info">{{ optional($expense->paymentMethod)->method }}</span>
                              </td>
                              <td class="text-muted">{{ optional($expense->ACHead)->head }}</td>
                              <td class="text-right font-weight-600">
                                {{ generalSetting()->currency_symbol }}{{ number_format($expense->amount,2) }}</td>
                              <td class="text-right">
                                <div class="dropdown CRM_dropdown">
                                  <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">@lang('common.select')</button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    @if(userPermission('add-expense-edit'))
                                    <a class="dropdown-item" href="{{ route('add-expense-edit', $expense->id) }}">
                                      <i class="ti-pencil-alt mr-2"></i>@lang('common.edit')
                                    </a>
                                    @endif
                                    @if(userPermission('add-expense-delete'))
                                    <a class="dropdown-item text-danger expense-delete-trigger" href="#"
                                      data-expense-id="{{ $expense->id }}">
                                      <i class="ti-trash mr-2"></i>@lang('common.delete')
                                    </a>
                                    @endif
                                  </div>
                                </div>
                              </td>
                            </tr>
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
              <div id="expenseMethodAccordion" class="mb-20 group-accordion d-none" data-group="method">
                @foreach(($grouped_by_method ?? collect()) as $methodKey => $expensesForMethod)
                @php
                $collapseId = 'expMethod_' . md5($methodKey);
                $displayMethod = $methodKey;
                $totalForMethod = $expensesForMethod->sum('amount');
                @endphp
                <div class="card mb-2 border-0 shadow-sm">
                  <div
                    class="card-header bg-gradient-light p-3 cursor-pointer d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#{{ $collapseId }}" aria-expanded="false"
                    aria-controls="{{ $collapseId }}" data-total="{{ $totalForMethod }}">
                    <div class="d-flex align-items-center">
                      <i class="ti-angle-down mr-3 collapse-icon"></i>
                      <div>
                        <span class="font-weight-bold text-dark">{{ $displayMethod }}</span>
                        <div class="text-muted small">{{ $expensesForMethod->count() }} entries</div>
                      </div>
                    </div>
                    <div class="text-right">
                      <div class="amount-display">
                        <span class="currency-symbol">{{ generalSetting()->currency_symbol }}</span>
                        <span
                          class="amount-value font-weight-bold text-primary">{{ number_format($totalForMethod,2) }}</span>
                      </div>
                      <span class="badge badge-primary badge-pill">{{ $expensesForMethod->count() }}</span>
                    </div>
                  </div>
                  <div id="{{ $collapseId }}" class="collapse" data-parent="#expenseMethodAccordion">
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped">
                          <thead class="thead-light">
                            <tr>
                              <th style="width:60px" class="text-center">#</th>
                              <th style="min-width:150px">@lang('common.name')</th>
                              <th style="min-width:120px">@lang('accounts.payment_method')</th>
                              <th style="min-width:140px">@lang('accounts.a_c_Head')</th>
                              <th style="min-width:100px" class="text-right">@lang('accounts.amount')</th>
                              <th style="width:120px" class="text-right">@lang('common.action')</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($expensesForMethod as $index => $expense)
                            <tr>
                              <td class="text-center">{{ $index + 1 }}</td>
                              <td class="font-weight-500">{{ $expense->name }}</td>
                              <td><span
                                  class="badge badge-outline-info">{{ optional($expense->paymentMethod)->method }}</span>
                              </td>
                              <td class="text-muted">{{ optional($expense->ACHead)->head }}</td>
                              <td class="text-right font-weight-600">
                                {{ generalSetting()->currency_symbol }}{{ number_format($expense->amount,2) }}</td>
                              <td class="text-right">
                                <div class="dropdown CRM_dropdown">
                                  <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">@lang('common.select')</button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    @if(userPermission('add-expense-edit'))
                                    <a class="dropdown-item" href="{{ route('add-expense-edit', $expense->id) }}">
                                      <i class="ti-pencil-alt mr-2"></i>@lang('common.edit')
                                    </a>
                                    @endif
                                    @if(userPermission('add-expense-delete'))
                                    <a class="dropdown-item text-danger expense-delete-trigger" href="#"
                                      data-expense-id="{{ $expense->id }}">
                                      <i class="ti-trash mr-2"></i>@lang('common.delete')
                                    </a>
                                    @endif
                                  </div>
                                </div>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <!-- Totals summary footer -->
              <div id="expenseTotalsSummary" class="mt-3 mb-4">
                <div class="expense-totals-bar d-flex flex-wrap align-items-center p-2 rounded shadow-sm">
                  <span class="mr-4"><strong>Page Total:</strong> {{ generalSetting()->currency_symbol }} <span
                      id="expensePageTotalAmount">0.00</span></span>
                  <span class="mr-4"><strong>Grand Total:</strong> {{ generalSetting()->currency_symbol }} <span
                      id="expenseGrandTotalAmount">0.00</span></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- delete expense modal  --}}
<div class="modal fade admin-query" id="deleteExpenseModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('accounts.delete_item') </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <div class="text-center">
          <h4>@lang('common.are_you_sure_to_delete') </h4>
        </div>

        <div class="mt-40 d-flex justify-content-between">
          <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('common.cancel')
          </button>
          {{ html()->form('POST', route('add-expense-delete'))->attribute('enctype', 'multipart/form-data')->open() }}
          <input type="hidden" name="id" value="">
          <button class="primary-btn fix-gr-bg" type="submit">@lang('common.delete') </button>
          {{ html()->form()->close() }}
        </div>
      </div>

    </div>
  </div>
</div>

@endsection

@include('backEnd.partials.data_table_js')
@include('backEnd.partials.server_side_datatable')
@include('backEnd.partials.date_picker_css_js')
@push('script')
<script type="text/javascript">
function deleteExpense(id) {
  var modal = $('#deleteExpenseModal');
  modal.find('input[name=id]').val(id);
  modal.modal('show');
}
// Optional: toggle icon rotation on collapse
$(document).on('show.bs.collapse',
  '#expenseDateAccordion .collapse, #expenseHeadAccordion .collapse, #expenseMethodAccordion .collapse',
  function() {
    $(this).prev('.card-header').find('i.ti-angle-down').addClass('rotated');
  });
$(document).on('hide.bs.collapse',
  '#expenseDateAccordion .collapse, #expenseHeadAccordion .collapse, #expenseMethodAccordion .collapse',
  function() {
    $(this).prev('.card-header').find('i.ti-angle-down').removeClass('rotated');
  });

// Hybrid client-side pagination for grouped accordions
(function() {
  const lengthKey = 'expenseDateGroups_pageLength';
  const validLengths = [10, 25, 50, 100, 250, 500, 10000];
  const urlParams = new URLSearchParams(window.location.search);
  let urlLen = parseInt(urlParams.get('show_entries'));
  if (!validLengths.includes(urlLen)) urlLen = null;
  let saved = parseInt(localStorage.getItem(lengthKey) || '10');
  if (!validLengths.includes(saved)) saved = 10;
  const pageLength = urlLen || saved;

  function currentAccordion() {
    const group = $('#expenseGroupBy').val();
    return $('.group-accordion[data-group="' + group + '"]');
  }

  function allCards() {
    return currentAccordion().children('.card');
  }

  function totalCards() {
    return allCards().length;
  }
  const $lengthSelect = $('#expensePageLength');
  $lengthSelect.val(pageLength);

  function render() {
    const len = parseInt($lengthSelect.val());
    const $cards = allCards();
    $cards.hide();
    // determine current page from hash (?page=) or default 1
    let pageParam = parseInt(urlParams.get('exp_page') || '1');
    if (isNaN(pageParam) || pageParam < 1) pageParam = 1;
    const totalPages = Math.max(1, Math.ceil(totalCards() / len));
    if (pageParam > totalPages) pageParam = totalPages;
    const start = (pageParam - 1) * len;
    const end = start + len;
    $cards.slice(start, end).show();
    buildPager(pageParam, totalPages);
    updatePageTotal();
  }

  function buildPager(current, totalPages) {
    const $p = $('#expensePagination');
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
    // window of pages
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

  $('#expensePagination').on('click', 'a.page-link', function(e) {
    e.preventDefault();
    const newPage = parseInt($(this).data('page'));
    if (!newPage) return;
    urlParams.set('exp_page', newPage);
    const params = urlParams.toString();
    const newUrl = window.location.pathname + (params ? '?' + params : '');
    window.history.replaceState({}, '', newUrl);
    render();
    // scroll to top of list
    document.getElementById('expenseDateAccordion').scrollIntoView({
      behavior: 'smooth'
    });
  });

  $lengthSelect.on('change', function() {
    const len = parseInt(this.value);
    if (!validLengths.includes(len)) return;
    localStorage.setItem(lengthKey, len);
    if (len === 10) {
      urlParams.delete('show_entries');
    } else {
      urlParams.set('show_entries', len);
    }
    urlParams.delete('exp_page'); // reset page
    const params = urlParams.toString();
    const newUrl = window.location.pathname + (params ? '?' + params : '');
    window.history.replaceState({}, '', newUrl);
    render();
  });

  // Group switcher
  $('#expenseGroupBy').on('change', function() {
    const group = $(this).val();
    $('.group-accordion').addClass('d-none');
    $('.group-accordion[data-group="' + group + '"]').removeClass('d-none');
    urlParams.delete('exp_page');
    const params = urlParams.toString();
    const newUrl = window.location.pathname + (params ? '?' + params : '');
    window.history.replaceState({}, '', newUrl);
    render();
  });

  render();
  computeGrandTotal();
})();
// Compute and update grand/page totals
function computeGrandTotal() {
  let grand = 0;
  $('.group-accordion[data-group]:not(.d-none) .card-header[data-total]').each(function() {
    const v = parseFloat($(this).data('total'));
    if (!isNaN(v)) grand += v;
  });
  if (!grand && $('#expenseGrandTotalAmount').length) {
    // fallback: sum all headers across all groups
    $('.group-accordion .card-header[data-total]').each(function() {
      const v = parseFloat($(this).data('total'));
      if (!isNaN(v)) grand += v;
    });
  }
  $('#expenseGrandTotalAmount').text(grand.toLocaleString(undefined, {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  }));
  return grand;
}

function updatePageTotal() {
  // sum only visible cards (pagination slice) in the currently active accordion
  const $activeAcc = $('.group-accordion:not(.d-none)');
  let page = 0;
  $activeAcc.children('.card:visible').each(function() {
    const v = parseFloat($(this).find('> .card-header').data('total'));
    if (!isNaN(v)) page += v;
  });
  $('#expensePageTotalAmount').text(page.toLocaleString(undefined, {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  }));
  computeGrandTotal();
}
// Delegated delete (after pagination init so elements may be hidden/shown)
document.addEventListener('click', function(e) {
  var trigger = e.target.closest('.expense-delete-trigger');
  if (trigger) {
    e.preventDefault();
    var id = trigger.getAttribute('data-expense-id');
    if (id) {
      deleteExpense(id);
    }
  }
});
// Export logic using hidden DataTable instance
$(function() {
  function collectRows() {
    const group = $('#expenseGroupBy').val();
    let rows = [];
    const $acc = $('.group-accordion[data-group="' + group + '"]');
    $acc.children('.card').each(function() {
      const $card = $(this);
      // Include even hidden due to pagination to export everything in current group
      const $table = $card.find('table');
      $table.find('tbody tr').each(function() {
        const $tds = $(this).find('td');
        if ($tds.length) {
          rows.push([
            $tds.eq(1).text().trim(), // Name
            $tds.eq(2).text().trim(), // Method
            $tds.eq(3).text().trim(), // Head
            $tds.eq(4).text().trim(), // Amount
          ]);
        }
      });
    });
    return rows;
  }

  function buildTable() {
    const rows = collectRows();
    let grandTotal = 0;
    rows.forEach(r => {
      const v = parseFloat((r[3] || '').toString().replace(/,/g, '').trim());
      if (!isNaN(v)) grandTotal += v;
    });
    const $container = $('#expenseExportContainer');
    $container.empty();
    const tableId = 'expenseExportTable';
    // Hardcoded headers for export (no translation helpers as per requirement)
    let html = '<table id="' + tableId + '" class="table table-sm"><thead><tr>' +
      '<th>Name</th>' +
      '<th>Payment Method</th>' +
      '<th>Head</th>' +
      '<th>Amount</th>' +
      '</tr></thead><tbody>';
    rows.forEach(r => {
      html += '<tr><td>' + r[0] + '</td><td>' + r[1] + '</td><td>' + r[2] + '</td><td class="text-right">' + r[
        3] + '</td></tr>';
    });
    html +=
      '</tbody><tfoot><tr style="font-weight:bold;background:#f5f5f5;"><td colspan="3" class="text-right">Total</td><td class="text-right">' +
      grandTotal
      .toLocaleString(undefined, {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      }) + '</td></tr></tfoot></table>';
    $container.append(html);
    return tableId;
  }
  let dtInstance = null;

  function ensureDT(tableId) {
    if (dtInstance) {
      try {
        dtInstance.destroy();
      } catch (e) {
        console.warn('Failed destroy old dt', e);
      }
      dtInstance = null;
    }
    if (!$.fn || !$.fn.DataTable) {
      console.error('DataTables not loaded');
      return;
    }
    try {
      dtInstance = $('#' + tableId).DataTable({
        paging: false,
        searching: false,
        info: false,
        ordering: false,
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            title: $('#logo_title').val() || 'Expenses',
            footer: true
          },
          {
            extend: 'csvHtml5',
            title: $('#logo_title').val() || 'Expenses',
            footer: true,
            bom: true,
            charset: 'utf-8'
          },
          {
            extend: 'pdfHtml5',
            title: $('#logo_title').val() || 'Expenses',
            orientation: 'landscape',
            pageSize: 'A4',
            footer: true,
            customize: function(doc) {
              doc.defaultStyle.font = (window._banglaFontReady ? 'BanglaFont' : 'DejaVuSans');
            }
          },
          {
            extend: 'print',
            title: $('#logo_title').val() || 'Expenses',
            footer: true
          }
        ]
      });
    } catch (e) {
      console.error('DataTable init failed', e);
      dtInstance = null;
    }
  }

  // Bangla font loader for pdfMake (tries multiple path patterns)
  async function loadBanglaFont() {
    if (window._banglaFontReady) return true;
    if (typeof pdfMake === 'undefined' || !pdfMake.addFileToVFS) {
      console.warn('pdfMake not ready to add fonts');
      return false;
    }
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
              console.log('Loaded Bangla font', file, 'from', r + file);
              loaded = true;
              break;
            }
          } catch (e) {
            /* try next */
          }
        }
        if (!loaded) {
          console.warn('Could not load Bangla font file', file, 'tried:', roots.map(rt => rt + file));
          return false;
        }
      }
      pdfMake.fonts = pdfMake.fonts || {};
      pdfMake.fonts.BanglaFont = {
        normal: 'NotoSansBengali-Regular.ttf',
        bold: 'NotoSansBengali-Bold.ttf',
        italics: 'NotoSansBengali-Regular.ttf',
        bolditalics: 'NotoSansBengali-Bold.ttf'
      };
      window._banglaFontReady = true;
      console.log('BanglaFont registered');
      return true;
    } catch (err) {
      console.error('Bangla font load exception', err);
      return false;
    }
  }

  function manualCSVDownload(rows) {
    let csv = '"Name","Payment Method","Head","Amount"\n';
    rows.forEach(r => {
      csv += '"' + r[0].replace(/"/g, '""') + '","' + r[1].replace(/"/g, '""') + '","' + r[2].replace(/"/g,
        '""') + '","' + r[3].replace(/"/g, '""') + '"\n';
    });
    const blob = new Blob(['\uFEFF' + csv], {
      type: 'text/csv;charset=utf-8;'
    });
    const a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = ($('#logo_title').val() || 'Expenses') + '.csv';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
  }

  function manualPrint(tableId) {
    const w = window.open('', '_blank');
    if (!w) {
      alert('Popup blocked');
      return;
    }
    w.document.write('<html><head><title>' + ($('#logo_title').val() || 'Expenses') + '</title>');
    w.document.write(
      '<style>table{width:100%;border-collapse:collapse;}th,td{border:1px solid #444;padding:4px;font-size:12px;}tfoot td{font-weight:bold;}</style>'
    );
    w.document.write('</head><body>' + document.getElementById(tableId).outerHTML + '</body></html>');
    w.document.close();
    w.focus();
    w.print();
    setTimeout(() => {
      try {
        w.close();
      } catch (_) {}
    }, 500);
  }

  async function triggerExport(type) {
    if (type === 'pdf' && !window._banglaFontReady) {
      const ok = await loadBanglaFont();
      if (!ok) console.warn('Bangla font not loaded; PDF will fallback.');
    }
    const tableId = buildTable();
    ensureDT(tableId);
    if (!dtInstance) {
      const rows = collectRows();
      if (type === 'csv') return manualCSVDownload(rows);
      if (type === 'print') return manualPrint(tableId);
      if (type === 'excel') {
        console.warn('Excel export unavailable; providing CSV instead');
        return manualCSVDownload(rows);
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
      console.error('Button trigger failed', e);
      if (type === 'csv') manualCSVDownload(collectRows());
      else if (type === 'print') manualPrint(tableId);
    }
  }
  $('#expExportExcel').on('click', function() {
    triggerExport('excel');
  });
  $('#expExportCSV').on('click', function() {
    triggerExport('csv');
  });
  $('#expExportPDF').on('click', function() {
    triggerExport('pdf');
  });
  $('#expExportPrint').on('click', function() {
    triggerExport('print');
  });
  // Initial totals update if elements present (render() should have done but safeguard)
  if (typeof updatePageTotal === 'function') {
    updatePageTotal();
  }
});
</script>
<style>
/* Professional Card and Accordion Styling */
#expenseDateAccordion .card-header,
#expenseHeadAccordion .card-header,
#expenseMethodAccordion .card-header {
  cursor: pointer;
  transition: all 0.3s ease;
  border-left: 4px solid #007bff;
}

#expenseDateAccordion .card-header:hover,
#expenseHeadAccordion .card-header:hover,
#expenseMethodAccordion .card-header:hover {
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

#expenseDateAccordion i.ti-angle-down.rotated,
#expenseHeadAccordion i.ti-angle-down.rotated,
#expenseMethodAccordion i.ti-angle-down.rotated {
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
  z-index: 10;
}

.dropdown.show .dropdown-menu {
  z-index: 1060 !important;
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
.expense-totals-bar {
  background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
  border: 1px solid #cbd5e0;
  border-radius: 8px;
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.06);
}

/* Pagination */
#expensePagination ul.pagination {
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