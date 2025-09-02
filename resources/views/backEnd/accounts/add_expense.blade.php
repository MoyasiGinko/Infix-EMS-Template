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

            <div class="modern-form-card">
              <div class="form-header">
                <div class="form-header-content">
                  <div class="form-icon">
                    <i class="ti-credit-card"></i>
                  </div>
                  <div>
                    <h3 class="form-title">
                      @if (isset($add_expense))
                      @lang('accounts.edit_expense')
                      @else
                      @lang('accounts.add_expense')
                      @endif
                    </h3>
                    <p class="form-subtitle">
                      {{ isset($add_expense) ? 'Update expense details' : 'Enter expense information' }}</p>
                  </div>
                </div>
              </div>

              <div class="form-body">
                <div class="form-section">
                  <div class="form-group enhanced">
                    <label class="form-label" for="expense_name">
                      <i class="ti-tag"></i>
                      @lang('common.name')
                      <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                      <input class="form-control modern-input{{ @$errors->has('name') ? ' is-invalid' : '' }}"
                        type="text" name="name" id="expense_name" placeholder="Enter expense name" autocomplete="off"
                        value="{{ isset($add_expense) ? $add_expense->name : old('name') }}">
                      <input type="hidden" name="id" value="{{ isset($add_expense) ? $add_expense->id : '' }}">
                      <div class="input-border"></div>
                    </div>
                    @if (@$errors->has('name'))
                    <div class="error-message">
                      <i class="ti-alert-circle"></i>
                      <span>{{ @$errors->first('name') }}</span>
                    </div>
                    @endif
                  </div>
                </div>

                <div class="form-section">
                  <div class="form-group enhanced">
                    <label class="form-label" for="expense_head">
                      <i class="ti-folder"></i>
                      @lang('accounts.a_c_Head')
                      <span class="required">*</span>
                    </label>
                    <div class="select-wrapper">
                      <select class="form-control modern-select{{ @$errors->has('expense_head') ? ' is-invalid' : '' }}"
                        name="expense_head" id="expense_head">
                        <option value="">Choose expense head...</option>
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
                      <div class="select-arrow">
                        <i class="ti-angle-down"></i>
                      </div>
                    </div>
                    @if ($errors->has('expense_head'))
                    <div class="error-message">
                      <i class="ti-alert-circle"></i>
                      <span>{{ @$errors->first('expense_head') }}</span>
                    </div>
                    @endif
                  </div>
                </div>

                <div class="form-section">
                  <div class="form-group enhanced">
                    <label class="form-label" for="payment_method">
                      <i class="ti-wallet"></i>
                      @lang('accounts.payment_method')
                      <span class="required">*</span>
                    </label>
                    <div class="select-wrapper">
                      <select
                        class="form-control modern-select{{ @$errors->has('payment_method') ? ' is-invalid' : '' }}"
                        name="payment_method" id="payment_method">
                        <option value="">Select payment method...</option>
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
                      <div class="select-arrow">
                        <i class="ti-angle-down"></i>
                      </div>
                    </div>
                    @if ($errors->has('payment_method'))
                    <div class="error-message">
                      <i class="ti-alert-circle"></i>
                      <span>{{ @$errors->first('payment_method') }}</span>
                    </div>
                    @endif
                  </div>
                </div>

                <div class="form-section collapse-section" id="bankAccountSection">
                  <div class="form-group enhanced">
                    <label class="form-label" for="bank_accounts">
                      <i class="ti-credit-card"></i>
                      @lang('accounts.bank_accounts')
                      <span class="required">*</span>
                    </label>
                    <div class="select-wrapper">
                      <select class="form-control modern-select{{ @$errors->has('accounts') ? ' is-invalid' : '' }}"
                        name="accounts" id="bank_accounts">
                        <option value="">Select bank account...</option>
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
                      <div class="select-arrow">
                        <i class="ti-angle-down"></i>
                      </div>
                    </div>
                    @if ($errors->has('accounts'))
                    <div class="error-message">
                      <i class="ti-alert-circle"></i>
                      <span>{{ @$errors->first('accounts') }}</span>
                    </div>
                    @endif
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-col">
                    <div class="form-group enhanced">
                      <label class="form-label" for="expense_date">
                        <i class="ti-calendar"></i>
                        @lang('admin.date')
                        <span class="required">*</span>
                      </label>
                      <div class="input-wrapper date-wrapper">
                        <input
                          class="form-control modern-input date-input{{ @$errors->has('date') ? ' is-invalid' : '' }}"
                          id="startDate" type="text" placeholder="Select date" name="date"
                          value="{{ isset($add_expense) ? date('m/d/Y', strtotime($add_expense->date)) : date('m/d/Y') }}">
                        <button class="date-trigger" data-id="#startDate" type="button">
                          <i class="ti-calendar"></i>
                        </button>
                        <div class="input-border"></div>
                      </div>
                      @if ($errors->has('date'))
                      <div class="error-message">
                        <i class="ti-alert-circle"></i>
                        <span>{{ $errors->first('date') }}</span>
                      </div>
                      @endif
                    </div>
                  </div>

                  <div class="form-col">
                    <div class="form-group enhanced">
                      <label class="form-label" for="expense_amount">
                        <i class="ti-money"></i>
                        @lang('accounts.amount')
                        <span class="required">*</span>
                      </label>
                      <div class="input-wrapper amount-wrapper">
                        <div class="currency-symbol">{{ generalSetting()->currency_symbol ?? '$' }}</div>
                        <input oninput="numberCheckWithDot(this)"
                          class="form-control modern-input amount-input{{ @$errors->has('amount') ? ' is-invalid' : '' }}"
                          type="text" name="amount" id="expense_amount" step="0.1" placeholder="0.00" autocomplete="off"
                          value="{{ isset($add_expense) ? $add_expense->amount : old('amount') }}">
                        <div class="input-border"></div>
                      </div>
                      @if ($errors->has('amount'))
                      <div class="error-message">
                        <i class="ti-alert-circle"></i>
                        <span>{{ @$errors->first('amount') }}</span>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="form-section">
                  <div class="form-group enhanced">
                    <label class="form-label" for="file_upload">
                      <i class="ti-paperclip"></i>
                      @lang('common.file')
                    </label>
                    <div class="file-upload-wrapper">
                      <div class="file-upload-area">
                        <input type="file" name="file" id="file_upload" class="file-input"
                          accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.txt">
                        <div class="file-upload-content">
                          <div class="file-icon">
                            <i class="ti-cloud-up"></i>
                          </div>
                          <div class="file-text">
                            <span class="file-main-text">
                              {{ isset($add_expense) ? ($add_expense->file != '' ? basename(getFilePath3($add_expense->file)) : 'Click to upload or drag file here') : 'Click to upload or drag file here' }}
                            </span>
                            <span class="file-sub-text">PDF, DOC, DOCX, JPG, JPEG, PNG, TXT allowed</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    @if ($errors->has('file'))
                    <div class="error-message">
                      <i class="ti-alert-circle"></i>
                      <span>{{ $errors->first('file') }}</span>
                    </div>
                    @endif
                  </div>
                </div>

                <div class="form-section">
                  <div class="form-group enhanced">
                    <label class="form-label" for="expense_description">
                      <i class="ti-align-left"></i>
                      @lang('common.description')
                    </label>
                    <div class="textarea-wrapper">
                      <textarea class="form-control modern-textarea" name="description" id="expense_description"
                        rows="4"
                        placeholder="Enter expense description (optional)">{{ isset($add_expense) ? $add_expense->description : old('description') }}</textarea>
                      <div class="input-border"></div>
                    </div>
                  </div>
                </div>

                <div class="form-actions">
                  @php
                  $tooltip = '';
                  if (userPermission('add-expense-store') || userPermission('add-expense-edit')) {
                  $tooltip = '';
                  } else {
                  $tooltip = 'You have no permission to add';
                  }
                  @endphp
                  <button class="btn btn-modern-primary" type="submit" data-toggle="tooltip" title="{{ $tooltip }}">
                    <i class="ti-check"></i>
                    <span>
                      @if (isset($add_expense))
                      @lang('accounts.update_expense')
                      @else
                      @lang('accounts.save_expense')
                      @endif
                    </span>
                  </button>
                  <button class="btn btn-modern-secondary" type="reset">
                    <i class="ti-reload"></i>
                    <span>Reset</span>
                  </button>
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
                              <th style="width:180px" class="text-right">@lang('common.action')</th>
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
                                <div class="action-buttons-wrapper" data-expense-id="{{ $expense->id }}">
                                  <button class="btn btn-dots-trigger" type="button">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="inline-action-buttons d-none">
                                    @if(userPermission('add-expense-edit'))
                                    <a class="btn btn-sm btn-outline-primary action-btn-edit"
                                      href="{{ route('add-expense-edit', $expense->id) }}" title="@lang('common.edit')">
                                      <i class="ti-pencil-alt"></i>
                                    </a>
                                    @endif
                                    @if(userPermission('add-expense-delete'))
                                    <button
                                      class="btn btn-sm btn-outline-danger action-btn-delete expense-delete-trigger"
                                      type="button" data-expense-id="{{ $expense->id }}" title="@lang('common.delete')">
                                      <i class="ti-trash"></i>
                                    </button>
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
                              <th style="width:180px" class="text-right">@lang('common.action')</th>
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
                                <div class="action-buttons-wrapper">
                                  <button class="btn-dots-trigger" type="button" data-expense-id="{{ $expense->id }}">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="inline-action-buttons d-none">
                                    @if(userPermission('add-expense-edit'))
                                    <a class="btn btn-outline-primary btn-sm" title="@lang('common.edit')"
                                      href="{{ route('add-expense-edit', $expense->id) }}">
                                      <i class="ti-pencil-alt"></i>
                                    </a>
                                    @endif
                                    @if(userPermission('add-expense-delete'))
                                    <button class="btn btn-outline-danger btn-sm expense-delete-trigger" type="button"
                                      title="@lang('common.delete')" data-expense-id="{{ $expense->id }}">
                                      <i class="ti-trash"></i>
                                    </button>
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
                              <th style="width:180px" class="text-right">@lang('common.action')</th>
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
                                <div class="action-buttons-wrapper">
                                  <button class="btn-dots-trigger" type="button" data-expense-id="{{ $expense->id }}">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="inline-action-buttons d-none">
                                    @if(userPermission('add-expense-edit'))
                                    <a class="btn btn-outline-primary btn-sm" title="@lang('common.edit')"
                                      href="{{ route('add-expense-edit', $expense->id) }}">
                                      <i class="ti-pencil-alt"></i>
                                    </a>
                                    @endif
                                    @if(userPermission('add-expense-delete'))
                                    <button class="btn btn-outline-danger btn-sm expense-delete-trigger" type="button"
                                      title="@lang('common.delete')" data-expense-id="{{ $expense->id }}">
                                      <i class="ti-trash"></i>
                                    </button>
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

// Modern Form Enhancements
$(document).ready(function() {
  // Bank account section toggle
  function toggleBankAccount() {
    const paymentMethod = $('#payment_method');
    const bankSection = $('#bankAccountSection');
    const selectedOption = paymentMethod.find('option:selected');
    const methodText = selectedOption.data('string') || selectedOption.text();

    if (methodText && (methodText.toLowerCase().includes('bank') || methodText.toLowerCase().includes('cheque'))) {
      bankSection.addClass('show');
    } else {
      bankSection.removeClass('show');
    }
  }

  $('#payment_method').on('change', toggleBankAccount);

  // Initialize on page load
  toggleBankAccount();

  // File upload feedback
  $('#file_upload').on('change', function() {
    const fileInput = this;
    const fileText = $(this).siblings('.file-upload-content').find('.file-main-text');

    if (fileInput.files && fileInput.files[0]) {
      const fileName = fileInput.files[0].name;
      fileText.text(fileName);
      $(this).closest('.file-upload-area').addClass('has-file');
    } else {
      fileText.text('Click to upload or drag file here');
      $(this).closest('.file-upload-area').removeClass('has-file');
    }
  });

  // Enhanced input interactions
  $('.modern-input, .modern-select, .modern-textarea').on('focus', function() {
    $(this).closest('.form-group').addClass('focused');
  }).on('blur', function() {
    $(this).closest('.form-group').removeClass('focused');

    if ($(this).val()) {
      $(this).closest('.form-group').addClass('has-value');
    } else {
      $(this).closest('.form-group').removeClass('has-value');
    }
  });

  // Initialize has-value state
  $('.modern-input, .modern-select, .modern-textarea').each(function() {
    if ($(this).val()) {
      $(this).closest('.form-group').addClass('has-value');
    }
  });
});

// Custom Action Dropdown Handler
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
  z-index: 999;
}

.dropdown.show .dropdown-menu {
  z-index: 1060 !important;
}

/* Modern Form Styling for Expense */
.modern-form-card {
  background: linear-gradient(135deg, #ffffff 0%, #f8fafb 100%);
  border-radius: 16px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
  border: 1px solid #e2e8f0;
  overflow: hidden;
  transition: all 0.3s ease;
}

.modern-form-card:hover {
  box-shadow: 0 12px 48px rgba(0, 0, 0, 0.12);
  transform: translateY(-2px);
}

.form-header {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  padding: 24px;
  color: white;
}

.form-header-content {
  display: flex;
  align-items: center;
  gap: 16px;
}

.form-icon {
  width: 48px;
  height: 48px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
}

.form-title {
  margin: 0;
  font-size: 20px;
  font-weight: 600;
  line-height: 1.2;
}

.form-subtitle {
  margin: 4px 0 0 0;
  opacity: 0.9;
  font-size: 14px;
}

.form-body {
  padding: 32px;
}

.form-section {
  margin-bottom: 24px;
}

.form-section.collapse-section {
  max-height: 0;
  overflow: hidden;
  margin-bottom: 0;
  transition: all 0.3s ease;
}

.form-section.collapse-section.show {
  max-height: 200px;
  margin-bottom: 24px;
}

.form-row {
  display: flex;
  gap: 20px;
  margin-bottom: 24px;
}

.form-col {
  flex: 1;
}

.form-group.enhanced {
  position: relative;
}

.form-label {
  display: flex;
  align-items: center;
  gap: 8px;
  font-weight: 600;
  color: #374151;
  font-size: 14px;
  margin-bottom: 8px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.form-label i {
  color: #667eea;
  font-size: 16px;
}

.required {
  color: #ef4444;
  font-weight: 700;
}

.input-wrapper {
  position: relative;
}

.modern-input {
  width: 100%;
  padding: 14px 16px;
  border: 2px solid #e5e7eb;
  border-radius: 8px;
  font-size: 15px;
  font-weight: 500;
  color: #374151;
  background: #ffffff;
  transition: all 0.3s ease;
}

.modern-input:focus {
  outline: none;
  border-color: #667eea;
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
  background: #fafbff;
}

.modern-input::placeholder {
  color: #9ca3af;
  font-weight: 400;
}

.input-border {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0;
  height: 2px;
  background: linear-gradient(90deg, #667eea, #764ba2);
  transition: width 0.3s ease;
}

.input-wrapper:focus-within .input-border {
  width: 100%;
}

.date-wrapper {
  display: flex;
  align-items: center;
}

.date-trigger {
  position: absolute;
  right: 12px;
  top: 50%;
  transform: translateY(-50%);
  background: transparent;
  border: none;
  color: #667eea;
  font-size: 18px;
  cursor: pointer;
  z-index: 2;
  transition: color 0.2s ease;
}

.date-trigger:hover {
  color: #764ba2;
}

.amount-wrapper {
  display: flex;
  align-items: center;
  position: relative;
}

.currency-symbol {
  position: absolute;
  left: 16px;
  top: 50%;
  transform: translateY(-50%);
  color: #667eea;
  font-weight: 600;
  font-size: 16px;
  z-index: 2;
}

.amount-input {
  padding-left: 40px;
}

.select-wrapper {
  position: relative;
}

.modern-select {
  width: 100%;
  padding: 14px 40px 14px 16px;
  border: 2px solid #e5e7eb;
  border-radius: 8px;
  font-size: 15px;
  font-weight: 500;
  color: #374151;
  background: #ffffff;
  appearance: none;
  cursor: pointer;
  transition: all 0.3s ease;
}

.modern-select:focus {
  outline: none;
  border-color: #667eea;
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
  background: #fafbff;
}

.select-arrow {
  position: absolute;
  right: 12px;
  top: 50%;
  transform: translateY(-50%);
  color: #667eea;
  font-size: 16px;
  pointer-events: none;
  transition: transform 0.2s ease;
}

.modern-select:focus+.select-arrow {
  transform: translateY(-50%) rotate(180deg);
  color: #764ba2;
}

.textarea-wrapper {
  position: relative;
}

.modern-textarea {
  width: 100%;
  padding: 14px 16px;
  border: 2px solid #e5e7eb;
  border-radius: 8px;
  font-size: 15px;
  font-weight: 500;
  color: #374151;
  background: #ffffff;
  resize: vertical;
  min-height: 100px;
  transition: all 0.3s ease;
  font-family: inherit;
}

.modern-textarea:focus {
  outline: none;
  border-color: #667eea;
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
  background: #fafbff;
}

.file-upload-wrapper {
  position: relative;
}

.file-upload-area {
  border: 2px dashed #d1d5db;
  border-radius: 12px;
  padding: 32px 24px;
  text-align: center;
  background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
  transition: all 0.3s ease;
  cursor: pointer;
  position: relative;
}

.file-upload-area:hover {
  border-color: #667eea;
  background: linear-gradient(135deg, #fafbff 0%, #f0f4ff 100%);
  transform: translateY(-2px);
}

.file-input {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  opacity: 0;
  cursor: pointer;
}

.file-upload-content {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 12px;
  pointer-events: none;
}

.file-icon {
  width: 48px;
  height: 48px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 20px;
}

.file-main-text {
  font-weight: 600;
  color: #374151;
  font-size: 15px;
}

.file-sub-text {
  color: #6b7280;
  font-size: 13px;
}

.error-message {
  display: flex;
  align-items: center;
  gap: 6px;
  color: #ef4444;
  font-size: 13px;
  font-weight: 500;
  margin-top: 8px;
}

.error-message i {
  font-size: 14px;
}

.form-actions {
  display: flex;
  gap: 12px;
  justify-content: flex-end;
  margin-top: 32px;
  padding-top: 24px;
  border-top: 1px solid #e5e7eb;
}

.btn-modern-primary {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border: none;
  padding: 12px 32px;
  border-radius: 8px;
  font-weight: 600;
  font-size: 15px;
  display: flex;
  align-items: center;
  gap: 8px;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.btn-modern-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
}

.btn-modern-secondary {
  background: white;
  color: #6b7280;
  border: 2px solid #e5e7eb;
  padding: 12px 24px;
  border-radius: 8px;
  font-weight: 600;
  font-size: 15px;
  display: flex;
  align-items: center;
  gap: 8px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-modern-secondary:hover {
  background: #f9fafb;
  border-color: #d1d5db;
  color: #374151;
  transform: translateY(-1px);
}

/* Responsive Design for Forms */
@media (max-width: 768px) {
  .form-row {
    flex-direction: column;
    gap: 0;
  }

  .form-header {
    padding: 20px;
  }

  .form-body {
    padding: 24px;
  }

  .form-actions {
    flex-direction: column;
  }

  .btn-modern-primary,
  .btn-modern-secondary {
    justify-content: center;
  }
}

/* Custom Action Button & Dropdown */
.action-dropdown-wrapper {
  position: relative !important;
  z-index: 1000 !important;
}

/* New Inline Action Buttons Wrapper */
.action-buttons-wrapper {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  gap: 4px;
  min-width: 160px;
  position: relative;
}

.btn-dots-trigger {
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
}

.btn-dots-trigger:hover {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
  border-color: #007bff;
  color: #007bff;
  transform: translateY(-1px);
  box-shadow: 0 2px 8px rgba(0, 123, 255, 0.15);
}

.btn-dots-trigger:focus {
  outline: none;
  box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.2);
}

.inline-action-buttons {
  display: flex;
  align-items: center;
  gap: 6px;
  animation: slideIn 0.2s ease-out;
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

.action-btn-edit,
.action-btn-delete {
  width: 32px;
  height: 32px;
  border-radius: 6px;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
  font-size: 13px;
  transition: all 0.2s ease;
  text-decoration: none;
}

.action-btn-edit:hover,
.action-btn-delete:hover {
  transform: translateY(-1px);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
  text-decoration: none;
}

.action-btn-edit {
  border: 1px solid #007bff;
  color: #007bff;
  background: white;
}

.action-btn-edit:hover {
  background: #007bff;
  color: white;
}

.action-btn-delete {
  border: 1px solid #dc3545;
  color: #dc3545;
  background: white;
}

.action-btn-delete:hover {
  background: #dc3545;
  color: white;
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