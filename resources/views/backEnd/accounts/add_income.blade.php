@extends('backEnd.master')
@section('title')
@lang('accounts.add_income')
@endsection
@section('mainContent')

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
            <div class="modern-form-card">
              <div class="form-header">
                <div class="form-header-content">
                  <div class="form-icon">
                    <i class="ti-money"></i>
                  </div>
                  <div>
                    <h3 class="form-title">
                      @if (isset($add_income))
                      @lang('accounts.edit_income')
                      @else
                      @lang('accounts.add_income')
                      @endif
                    </h3>
                    <p class="form-subtitle">{{ isset($add_income) ? 'Update income details' : 'Enter income information' }}</p>
                  </div>
                </div>
              </div>

              <div class="form-body">
                <div class="form-section">
                  <div class="form-group enhanced">
                    <label class="form-label" for="income_name">
                      <i class="ti-tag"></i>
                      @lang('common.name')
                      <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                      <input
                        class="form-control modern-input{{ @$errors->has('name') ? ' is-invalid' : '' }}"
                        type="text"
                        name="name"
                        id="income_name"
                        placeholder="Enter income name"
                        autocomplete="off"
                        value="{{ isset($add_income) ? $add_income->name : old('name') }}">
                      <input type="hidden" name="id" value="{{ isset($add_income) ? $add_income->id : '' }}">
                      <div class="input-border"></div>
                    </div>
                    @if ($errors->has('name'))
                    <div class="error-message">
                      <i class="ti-alert-circle"></i>
                      <span>{{ $errors->first('name') }}</span>
                    </div>
                    @endif
                  </div>
                </div>

                <div class="form-section">
                  <div class="form-group enhanced">
                    <label class="form-label" for="income_head">
                      <i class="ti-folder"></i>
                      @lang('accounts.a_c_Head')
                      <span class="required">*</span>
                    </label>
                    <div class="select-wrapper">
                      <select class="form-control modern-select{{ @$errors->has('income_head') ? ' is-invalid' : '' }}"
                        name="income_head" id="income_head">
                        <option value="">Choose income head...</option>
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
                      <div class="select-arrow">
                        <i class="ti-angle-down"></i>
                      </div>
                    </div>
                    @if (@$errors->has('income_head'))
                    <div class="error-message">
                      <i class="ti-alert-circle"></i>
                      <span>{{ @$errors->first('income_head') }}</span>
                    </div>
                    @endif
                  </div>
                </div>

                <div class="form-section">
                  <div class="form-group enhanced">
                    <label class="form-label" for="payment_method_income">
                      <i class="ti-wallet"></i>
                      @lang('accounts.payment_method')
                      <span class="required">*</span>
                    </label>
                    <div class="select-wrapper">
                      <select class="form-control modern-select{{ @$errors->has('payment_method') ? ' is-invalid' : '' }}"
                        name="payment_method" id="payment_method_income">
                        <option value="">Select payment method...</option>
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
                      <div class="select-arrow">
                        <i class="ti-angle-down"></i>
                      </div>
                    </div>
                    @if (@$errors->has('payment_method'))
                    <div class="error-message">
                      <i class="ti-alert-circle"></i>
                      <span>{{ @$errors->first('payment_method') }}</span>
                    </div>
                    @endif
                  </div>
                </div>

                <div class="form-section collapse-section" id="bankAccountSectionIncome">
                  <div class="form-group enhanced">
                    <label class="form-label" for="bank_accounts_income">
                      <i class="ti-credit-card"></i>
                      @lang('accounts.bank_accounts')
                      <span class="required">*</span>
                    </label>
                    <div class="select-wrapper">
                      <select class="form-control modern-select{{ @$errors->has('accounts') ? ' is-invalid' : '' }}"
                        name="accounts" id="bank_accounts_income">
                        <option value="">Select bank account...</option>
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
                      <label class="form-label" for="income_date">
                        <i class="ti-calendar"></i>
                        @lang('admin.date')
                        <span class="required">*</span>
                      </label>
                      <div class="input-wrapper date-wrapper">
                        <input
                          class="form-control modern-input date-input{{ @$errors->has('date') ? ' is-invalid' : '' }}"
                          id="startDateIncome"
                          type="text"
                          placeholder="Select date"
                          name="date"
                          value="{{ isset($add_income) ? date('m/d/Y', strtotime($add_income->date)) : date('m/d/Y') }}">
                        <button class="date-trigger" data-id="#startDateIncome" type="button">
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
                      <label class="form-label" for="income_amount">
                        <i class="ti-money"></i>
                        @lang('accounts.amount')
                        <span class="required">*</span>
                      </label>
                      <div class="input-wrapper amount-wrapper">
                        <div class="currency-symbol">{{ generalSetting()->currency_symbol ?? '$' }}</div>
                        <input
                          oninput="numberCheckWithDot(this)"
                          class="form-control modern-input amount-input{{ @$errors->has('amount') ? ' is-invalid' : '' }}"
                          type="text"
                          name="amount"
                          id="income_amount"
                          step="0.1"
                          placeholder="0.00"
                          value="{{ isset($add_income) ? $add_income->amount : old('amount') }}">
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
                    <label class="form-label" for="file_upload_income">
                      <i class="ti-paperclip"></i>
                      @lang('common.file')
                    </label>
                    <div class="file-upload-wrapper">
                      <div class="file-upload-area">
                        <input type="file" name="file" id="file_upload_income" class="file-input" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                        <div class="file-upload-content">
                          <div class="file-icon">
                            <i class="ti-cloud-up"></i>
                          </div>
                          <div class="file-text">
                            <span class="file-main-text">
                              {{ isset($add_income) ? ($add_income->file != '' ? basename(getFilePath3($add_income->file)) : 'Click to upload or drag file here') : 'Click to upload or drag file here' }}
                            </span>
                            <span class="file-sub-text">PDF, DOC, DOCX, JPG, JPEG, PNG allowed</span>
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
                    <label class="form-label" for="income_description">
                      <i class="ti-align-left"></i>
                      @lang('common.description')
                    </label>
                    <div class="textarea-wrapper">
                      <textarea
                        class="form-control modern-textarea"
                        name="description"
                        id="income_description"
                        rows="4"
                        placeholder="Enter income description (optional)">{{ isset($add_income) ? $add_income->description : old('description') }}</textarea>
                      <div class="input-border"></div>
                    </div>
                  </div>
                </div>

                <div class="form-actions">
                  @php
                  $tooltip = '';
                  if (userPermission('add_income_store') || userPermission('add_income_edit')) {
                      $tooltip = '';
                  } else {
                      $tooltip = 'You have no permission to add';
                  }
                  @endphp
                  <button class="btn btn-modern-primary" type="submit" data-toggle="tooltip" title="{{ @$tooltip }}">
                    <i class="ti-check"></i>
                    <span>
                      @if (@$add_income)
                      @lang('accounts.update_income')
                      @else
                      @lang('accounts.save_income')
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

              <div id="incomeExportContainer"
                style="position:absolute;left:-9999px;top:-9999px;width:1px;height:1px;overflow:hidden;"></div>

              {{-- Grouped by Date --}}
              <div id="incomeDateAccordion" class="mb-20 group-accordion" data-group="date">
                @php
                if(!isset($grouped_incomes)){
                $__incomeCollection = $add_incomes ?? $incomes ?? $all_incomes ?? collect();
                if($__incomeCollection instanceof \Illuminate\Support\Collection){
                $grouped_incomes = $__incomeCollection->groupBy(function($i){ return $i->date; })->sortKeysDesc();
                } else {
                $grouped_incomes = collect();
                }
                }
                @endphp
                @forelse($grouped_incomes as $dateKey => $incomesForDate)
                @php
                $incCollapseId = 'incDate_' . md5($dateKey);
                $displayDate = date('M d, Y', strtotime($dateKey));
                $totalForDate = $incomesForDate->sum('amount');
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
                            @foreach($incomesForDate as $row)
                            @php
                            // Correct head resolution: primary A/C chart head, else legacy income head name
                            $headName = optional($row->ACHead)->head
                            ?? optional($row->incomeHeads)->name
                            ?? '';
                            @endphp
                            <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td class="font-weight-500">{{ $row->name }}</td>
                              <td><span
                                  class="badge badge-outline-info">{{ optional($row->paymentMethod)->method }}</span>
                              </td>
                              <td class="text-muted">{{ $headName }}</td>
                              <td class="text-right font-weight-600">
                                {{ generalSetting()->currency_symbol }}{{ number_format($row->amount,2) }}</td>
                              <td class="text-right">
                                <div class="action-buttons-wrapper" data-income-id="{{ $row->id }}">
                                  <button class="btn btn-dots-trigger" type="button">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="inline-action-buttons d-none">
                                    @if (userPermission('add_income_edit'))
                                    <a class="btn btn-sm btn-outline-primary action-btn-edit" href="{{ route('add_income_edit', $row->id) }}" title="Edit">
                                      <i class="ti-pencil-alt"></i>
                                    </a>
                                    @endif
                                    @if (userPermission('add_income_delete'))
                                    <button class="btn btn-sm btn-outline-danger action-btn-delete income-delete-trigger" type="button" data-income-id="{{ $row->id }}" title="Delete">
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

              {{-- Grouped by Name --}}
              <div id="incomeNameAccordion" class="mb-20 group-accordion d-none" data-group="name">
                @php
                if(!isset($grouped_by_income_name)){
                if(isset($__incomeCollection) && $__incomeCollection instanceof \Illuminate\Support\Collection){
                $grouped_by_income_name = $__incomeCollection->groupBy(function($i){ return $i->name; })->sortKeys();
                } else { $grouped_by_income_name = collect(); }
                }
                @endphp
                @foreach(($grouped_by_income_name ?? collect()) as $nameKey => $incomesForName)
                @php
                $incNameCollapseId = 'incName_' . md5($nameKey);
                $displayName = $nameKey ?: __('common.unknown');
                $totalForName = $incomesForName->sum('amount');
                @endphp
                <div class="card mb-2 border-0 shadow-sm">
                  <div class="card-header bg-gradient-light p-3 cursor-pointer d-flex justify-content-between align-items-center"
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
                        <span class="amount-value font-weight-bold text-primary">{{ number_format($totalForName,2) }}</span>
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
                            @foreach($incomesForName as $row)
                            @php
                            $headName = optional($row->ACHead)->head
                            ?? optional($row->incomeHeads)->name
                            ?? '';
                            @endphp
                            <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td class="font-weight-500">{{ $row->name }}</td>
                              <td><span class="badge badge-outline-info">{{ optional($row->paymentMethod)->method }}</span></td>
                              <td class="text-muted">{{ $headName }}</td>
                              <td class="text-right font-weight-600">{{ generalSetting()->currency_symbol }}{{ number_format($row->amount,2) }}</td>
                              <td class="text-right">
                                <div class="action-buttons-wrapper" data-income-id="{{ $row->id }}">
                                  <button class="btn btn-dots-trigger" type="button">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="inline-action-buttons d-none">
                                    @if (userPermission('add_income_edit'))
                                    <a class="btn btn-sm btn-outline-primary action-btn-edit" href="{{ route('add_income_edit', $row->id) }}" title="Edit">
                                      <i class="ti-pencil-alt"></i>
                                    </a>
                                    @endif
                                    @if (userPermission('add_income_delete'))
                                    <button class="btn btn-sm btn-outline-danger action-btn-delete income-delete-trigger" type="button" data-income-id="{{ $row->id }}" title="Delete">
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
                @endphp
                <div class="card mb-2 border-0 shadow-sm">
                  <div class="card-header bg-gradient-light p-3 cursor-pointer d-flex justify-content-between align-items-center"
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
                        <span class="amount-value font-weight-bold text-primary">{{ number_format($totalForMethod,2) }}</span>
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
                              <th style="min-width:150px">Name</th>
                              <th style="min-width:120px">Payment Method</th>
                              <th style="min-width:140px">Head</th>
                              <th style="min-width:100px" class="text-right">Amount</th>
                              <th style="width:120px" class="text-right">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($incomesForMethod as $row)
                            @php
                            $headName = optional($row->ACHead)->head
                            ?? optional($row->incomeHeads)->name
                            ?? '';
                            @endphp
                            <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td class="font-weight-500">{{ $row->name }}</td>
                              <td><span class="badge badge-outline-info">{{ optional($row->paymentMethod)->method }}</span></td>
                              <td class="text-muted">{{ $headName }}</td>
                              <td class="text-right font-weight-600">{{ generalSetting()->currency_symbol }}{{ number_format($row->amount,2) }}</td>
                              <td class="text-right">
                                <div class="action-buttons-wrapper" data-income-id="{{ $row->id }}">
                                  <button class="btn btn-dots-trigger" type="button">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="inline-action-buttons d-none">
                                    @if (userPermission('add_income_edit'))
                                    <a class="btn btn-sm btn-outline-primary action-btn-edit" href="{{ route('add_income_edit', $row->id) }}" title="Edit">
                                      <i class="ti-pencil-alt"></i>
                                    </a>
                                    @endif
                                    @if (userPermission('add_income_delete'))
                                    <button class="btn btn-sm btn-outline-danger action-btn-delete income-delete-trigger" type="button" data-income-id="{{ $row->id }}" title="Delete">
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
// Modern Form Enhancements for Income
$(document).ready(function() {
  // Bank account section toggle for income
  function toggleBankAccountIncome() {
    const paymentMethod = $('#payment_method_income');
    const bankSection = $('#bankAccountSectionIncome');
    const selectedOption = paymentMethod.find('option:selected');
    const methodText = selectedOption.data('string') || selectedOption.text();

    if (methodText && (methodText.toLowerCase().includes('bank') || methodText.toLowerCase().includes('cheque'))) {
      bankSection.addClass('show');
    } else {
      bankSection.removeClass('show');
    }
  }

  $('#payment_method_income').on('change', toggleBankAccountIncome);

  // Initialize on page load
  toggleBankAccountIncome();

  // File upload feedback for income
  $('#file_upload_income').on('change', function() {
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
  function collectIncomeRows() {
    const group = $('#incomeGroupBy').val();
    let rows = [];
    const $acc = $('.group-accordion[data-group="' + group + '"]');
    $acc.children('.card').each(function() {
      const $card = $(this);
      const $table = $card.find('table');
      $table.find('tbody tr').each(function() {
        const $tds = $(this).find('td');
        if ($tds.length) {
          rows.push([
            $tds.eq(1).text().trim(), // Name
            $tds.eq(2).text().trim(), // Method
            $tds.eq(3).text().trim(), // Head/Date
            $tds.eq(4).text().trim(), // Amount
          ]);
        }
      });
    });
    return rows;
  }

  function buildIncomeExportTable() {
    const rows = collectIncomeRows();
    let grand = 0;
    rows.forEach(r => {
      const v = parseFloat((r[3] || '').toString().replace(/,/g, '').trim());
      if (!isNaN(v)) grand += v;
    });
    const $c = $('#incomeExportContainer');
    $c.empty();
    const id = 'incomeExportTable';
    let html = '<table id="' + id +
      '" class="table table-sm"><thead><tr><th>Name</th><th>Payment Method</th><th>Head/Date</th><th>Amount</th></tr></thead><tbody>';
    rows.forEach(r => {
      html += '<tr><td>' + r[0] + '</td><td>' + r[1] + '</td><td>' + r[2] +
        '</td><td class="text-right">' + r[3] + '</td></tr>';
    });
    html +=
      '</tbody><tfoot><tr style="font-weight:bold;background:#f5f5f5;"><td colspan="3" class="text-right">Total</td><td class="text-right">' +
      grand.toLocaleString(undefined, {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      }) + '</td></tr></tfoot></table>';
    $c.append(html);
    return id;
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

  function manualCSV(rows) {
    let csv = '"Name","Payment Method","Head/Date","Amount"\n';
    rows.forEach(r => {
      csv += '"' + r[0].replace(/"/g, '""') + '","' + r[1].replace(/"/g, '""') + '","' + r[2].replace(
        /"/g, '""') + '","' + r[3].replace(/"/g, '""') + '"\n';
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
    if (type === 'pdf' && !window._banglaFontReady) {
      await loadBanglaFontIncome();
    }
    const id = buildIncomeExportTable();
    ensureDT(id);
    if (!dtInstance) {
      const rows = collectIncomeRows();
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
      if (type === 'csv') manualCSV(collectIncomeRows());
      else if (type === 'print') manualPrint(id);
    }
  }
  $('#incExportExcel').on('click', () => trigger('excel'));
  $('#incExportCSV').on('click', () => trigger('csv'));
  $('#incExportPDF').on('click', () => trigger('pdf'));
  $('#incExportPrint').on('click', () =>
    trigger('print'));
  if (typeof updateIncomePageTotal === 'function') {
    updateIncomePageTotal();
  }
});
</script>
<style>
/* Modern Form Styling for Income */
.modern-form-card {
  background: linear-gradient(135deg, #ffffff 0%, #f8fafb 100%);
  border-radius: 16px;
  box-shadow: 0 8px 32px rgba(0,0,0,0.08);
  border: 1px solid #e2e8f0;
  overflow: hidden;
  transition: all 0.3s ease;
}

.modern-form-card:hover {
  box-shadow: 0 12px 48px rgba(0,0,0,0.12);
  transform: translateY(-2px);
}

.form-header {
  background: linear-gradient(135deg, #10b981 0%, #059669 100%);
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
  background: rgba(255,255,255,0.2);
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
  color: #10b981;
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
  border-color: #10b981;
  box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
  background: #f0fdf4;
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
  background: linear-gradient(90deg, #10b981, #059669);
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
  color: #10b981;
  font-size: 18px;
  cursor: pointer;
  z-index: 2;
  transition: color 0.2s ease;
}

.date-trigger:hover {
  color: #059669;
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
  color: #10b981;
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
  border-color: #10b981;
  box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
  background: #f0fdf4;
}

.select-arrow {
  position: absolute;
  right: 12px;
  top: 50%;
  transform: translateY(-50%);
  color: #10b981;
  font-size: 16px;
  pointer-events: none;
  transition: transform 0.2s ease;
}

.modern-select:focus + .select-arrow {
  transform: translateY(-50%) rotate(180deg);
  color: #059669;
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
  border-color: #10b981;
  box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
  background: #f0fdf4;
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
  border-color: #10b981;
  background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
  transform: translateY(-2px);
}

.file-upload-area.has-file {
  border-color: #10b981;
  background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
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
  background: linear-gradient(135deg, #10b981 0%, #059669 100%);
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
  background: linear-gradient(135deg, #10b981 0%, #059669 100%);
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
  box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

.btn-modern-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
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

/* Card Styling */
.group-accordion .card {
  border: 1px solid #e2e8f0;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 4px rgba(0,0,0,0.04);
  transition: all 0.3s ease;
}

.group-accordion .card:hover {
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
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
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
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
  box-shadow: 0 2px 8px rgba(0,123,255,0.15);
}

.btn-custom-action:focus {
  outline: none;
  box-shadow: 0 0 0 2px rgba(0,123,255,0.2);
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
  box-shadow: 0 6px 20px rgba(0,0,0,0.15);
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
  background-color: rgba(0,123,255,0.08);
  text-decoration: none;
}

.custom-dropdown-item.text-danger:hover {
  color: #dc3545 !important;
  background-color: rgba(220,53,69,0.08);
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
  box-shadow: inset 0 1px 3px rgba(0,0,0,0.06);
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
  box-shadow: 0 2px 6px rgba(0,0,0,0.15);
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