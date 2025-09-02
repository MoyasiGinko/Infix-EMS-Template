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
                      <label class="primary_input_label" for="">@lang('accounts.amount')
                        ({{ generalSetting()->currency_symbol }}) <span class="text-danger">
                          *</span></label>
                      <input oninput="numberCheckWithDot(this)"
                        class="primary_input_field form-control{{ @$errors->has('amount') ? ' is-invalid' : '' }}"
                        type="text" step="0.1" name="amount"
                        value="{{ isset($add_income) ? $add_income->amount : old('amount') }}">


                      @if ($errors->has('amount'))
                      <span class="text-danger">
                        {{ @$errors->first('amount') }}
                      </span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row mt-15">
                  <div class="col-lg-12 mt-15">
                    <div class="primary_input">
                      <div class="primary_file_uploader">
                        <input class="primary_input_field" type="text" id="placeholderInput"
                          placeholder="{{ isset($add_income) ? ($add_income->file != '' ? getFilePath3($add_income->file) : trans('common.file')) : trans('common.file') }}"
                          readonly>
                        <button class="" type="button">
                          <label class="primary-btn small fix-gr-bg" for="browseFile">{{ __('common.browse') }}</label>
                          <input type="file" class="d-none" name="file" id="browseFile">
                        </button>
                      </div>
                    </div>
                    <code>(PDF,DOC,DOCX,JPG,JPEG,PNG are allowed for upload)</code>
                    @if ($errors->has('file'))
                    <span class="text-danger d-block">
                      {{ $errors->first('file') }}
                    </span>
                    @endif

                  </div>
                </div>
                <div class="row mt-15">
                  <div class="col-lg-12">
                    <div class="primary_input">
                      <label class="primary_input_label" for="">@lang('common.description')
                        <span></span></label>
                      <textarea class="primary_input_field form-control" cols="0" rows="4"
                        name="description">{{ isset($add_income) ? $add_income->description : old('description') }}</textarea>


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
                  <div class="card-header bg-white p-2 cursor-pointer d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#{{ $incCollapseId }}"
                    aria-expanded="{{ $loop->first ? 'true':'false' }}" data-total="{{ $totalForDate }}">
                    <div class="d-flex align-items-center">
                      <i class="ti-angle-down mr-2"></i>
                      <span class="font-weight-600">{{ $displayDate }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="mr-3 font-weight-500">{{ generalSetting()->currency_symbol }}
                        {{ number_format($totalForDate,2) }}</span>
                      <span class="badge badge-info">{{ $incomesForDate->count() }}</span>
                    </div>
                  </div>
                  <div id="{{ $incCollapseId }}" class="collapse @if($loop->first) show @endif"
                    data-parent="#incomeDateAccordion">
                    <div class="card-body p-0">
                      <table class="table table-sm m-0 income-table">
                        <thead>
                          <tr>
                            <th style="width:50px;">#</th>
                            <th>Name</th>
                            <th>Payment Method</th>
                            <th>Head</th>
                            <th class="text-right">Amount ({{ generalSetting()->currency_symbol }})</th>
                            <th class="text-center" style="width:140px;">Action</th>
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
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ optional($row->paymentMethod)->method }}</td>
                            <td>{{ $headName }}</td>
                            <td class="text-right">{{ number_format($row->amount,2) }}</td>
                            <td class="text-center">
                              <div class="dropdown CRM_dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                  id="dropdownMenuButton{{ $row->id }}" data-toggle="dropdown" aria-haspopup="true"
                                  aria-expanded="false">
                                  Select
                                </button>
                                <div class="dropdown-menu dropdown-menu-right"
                                  aria-labelledby="dropdownMenuButton{{ $row->id }}">
                                  @if (userPermission('add_income_edit'))
                                  <a class="dropdown-item" href="{{ route('add_income_edit', $row->id) }}">Edit</a>
                                  @endif
                                  @if (userPermission('add_income_delete'))
                                  <a class="dropdown-item income-delete-trigger" href="#"
                                    data-income-id="{{ $row->id }}">Delete</a>
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
                  <div class="card-header bg-white p-2 cursor-pointer d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#{{ $incNameCollapseId }}" aria-expanded="false"
                    data-total="{{ $totalForName }}">
                    <div class="d-flex align-items-center">
                      <i class="ti-angle-down mr-2"></i>
                      <span class="font-weight-600">{{ $displayName }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="mr-3 font-weight-500">{{ generalSetting()->currency_symbol }}
                        {{ number_format($totalForName,2) }}</span>
                      <span class="badge badge-info">{{ $incomesForName->count() }}</span>
                    </div>
                  </div>
                  <div id="{{ $incNameCollapseId }}" class="collapse" data-parent="#incomeNameAccordion">
                    <div class="card-body p-0">
                      <table class="table table-sm m-0 income-table">
                        <thead>
                          <tr>
                            <th style="width:50px;">#</th>
                            <th>Name</th>
                            <th>Payment Method</th>
                            <th>Head</th>
                            <th class="text-right">Amount ({{ generalSetting()->currency_symbol }})</th>
                            <th class="text-center" style="width:140px;">Action</th>
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
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ optional($row->paymentMethod)->method }}</td>
                            <td>{{ $headName }}</td>
                            <td class="text-right">{{ number_format($row->amount,2) }}</td>
                            <td class="text-center">
                              <div class="dropdown CRM_dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                  id="dropdownMenuButton{{ $row->id }}" data-toggle="dropdown" aria-haspopup="true"
                                  aria-expanded="false">
                                  Select
                                </button>
                                <div class="dropdown-menu dropdown-menu-right"
                                  aria-labelledby="dropdownMenuButton{{ $row->id }}">
                                  @if (userPermission('add_income_edit'))
                                  <a class="dropdown-item" href="{{ route('add_income_edit', $row->id) }}">Edit</a>
                                  @endif
                                  @if (userPermission('add_income_delete'))
                                  <a class="dropdown-item income-delete-trigger" href="#"
                                    data-income-id="{{ $row->id }}">Delete</a>
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
                  <div class="card-header bg-white p-2 cursor-pointer d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#{{ $incMethodCollapseId }}" aria-expanded="false"
                    data-total="{{ $totalForMethod }}">
                    <div class="d-flex align-items-center">
                      <i class="ti-angle-down mr-2"></i>
                      <span class="font-weight-600">{{ $displayMethod ?: 'Unknown' }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="mr-3 font-weight-500">{{ generalSetting()->currency_symbol }}
                        {{ number_format($totalForMethod,2) }}</span>
                      <span class="badge badge-info">{{ $incomesForMethod->count() }}</span>
                    </div>
                  </div>
                  <div id="{{ $incMethodCollapseId }}" class="collapse" data-parent="#incomeMethodAccordion">
                    <div class="card-body p-0">
                      <table class="table table-sm m-0 income-table">
                        <thead>
                          <tr>
                            <th style="width:50px;">#</th>
                            <th>Name</th>
                            <th>Payment Method</th>
                            <th>Head</th>
                            <th class="text-right">Amount ({{ generalSetting()->currency_symbol }})</th>
                            <th class="text-center" style="width:140px;">Action</th>
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
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ optional($row->paymentMethod)->method }}</td>
                            <td>{{ $headName }}</td>
                            <td class="text-right">{{ number_format($row->amount,2) }}</td>
                            <td class="text-center">
                              <div class="dropdown CRM_dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                  id="dropdownMenuButton{{ $row->id }}" data-toggle="dropdown" aria-haspopup="true"
                                  aria-expanded="false">
                                  Select
                                </button>
                                <div class="dropdown-menu dropdown-menu-right"
                                  aria-labelledby="dropdownMenuButton{{ $row->id }}">
                                  @if (userPermission('add_income_edit'))
                                  <a class="dropdown-item" href="{{ route('add_income_edit', $row->id) }}">Edit</a>
                                  @endif
                                  @if (userPermission('add_income_delete'))
                                  <a class="dropdown-item income-delete-trigger" href="#"
                                    data-income-id="{{ $row->id }}">Delete</a>
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
#incomeDateAccordion .card-header,
#incomeNameAccordion .card-header,
#incomeMethodAccordion .card-header {
  cursor: pointer;
}

#incomeDateAccordion i.ti-angle-down,
#incomeNameAccordion i.ti-angle-down,
#incomeMethodAccordion i.ti-angle-down {
  transition: transform .2s ease;
}

#incomePagination ul.pagination {
  margin-bottom: 0;
}

#incomeDateAccordion i.ti-angle-down.rotated,
#incomeNameAccordion i.ti-angle-down.rotated,
/* Table visual improvements */
.group-accordion table thead th {
  background: #f5f7fb;
  font-weight: 600;
  border-bottom: 1px solid #e2e6ec;
}

.group-accordion table tbody td {
  vertical-align: middle;
}

.group-accordion table tbody tr:nth-child(even) {
  background: #fafbfc;
}

.group-accordion .card {
  border: 1px solid #e6edf2;
}

.group-accordion .card-header {
  border: 0;
  border-left: 4px solid #4e8ff7;
}

.group-accordion .card-header .badge {
  background: #4e8ff7;
}

.income-totals-bar {
  background: #eef4fb;
  border: 1px solid #d6e3f3;
}

.primary-btn.small {
  padding: 4px 10px;
  line-height: 1.2;
}

#incomeMethodAccordion i.ti-angle-down.rotated {
  transform: rotate(180deg);
}
</style>
@endpush