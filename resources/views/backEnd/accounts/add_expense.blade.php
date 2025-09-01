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
                                                <label class="primary_input_label" for="">@lang('common.name') <span
                                                        class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field form-control{{ @$errors->has('name') ? ' is-invalid' : '' }}"
                                                    type="text" name="name" autocomplete="off"
                                                    value="{{ isset($add_expense) ? $add_expense->name : old('name') }}">
                                                <input type="hidden" name="id"
                                                    value="{{ isset($add_expense) ? $add_expense->id : '' }}">


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
                                            <label class="primary_input_label" for="">@lang('accounts.a_c_Head') <span
                                                    class="text-danger"> *</span></label>
                                            <select
                                                class="primary_select  form-control{{ @$errors->has('expense_head') ? ' is-invalid' : '' }}"
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
                                                        <option data-string="{{ $payment_method->method }}"
                                                            value="{{ @$payment_method->id }}"
                                                            {{ @$add_expense->payment_method_id == @$payment_method->id ? 'selected' : '' }}>
                                                            {{ @$payment_method->method }}</option>
                                                    @else
                                                        <option data-string="{{ $payment_method->method }}"
                                                            value="{{ @$payment_method->id }}"
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
                                            <label class="primary_input_label" for="">@lang('accounts.bank_accounts') <span
                                                    class="text-danger"> *</span></label>
                                            <select
                                                class="primary_select  form-control{{ @$errors->has('accounts') ? ' is-invalid' : '' }}"
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
                                                <label class="primary_input_label"
                                                    for="">@lang('admin.date')<span
                                                    class="text-danger"> *</span></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input
                                                                    class="primary_input_field  primary_input_field date form-control form-control{{ @$errors->has('date') ? ' is-invalid' : '' }}"
                                                                    id="startDate" type="text"
                                                                    placeholder="@lang('common.date') " name="date"
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
                                                <label class="primary_input_label" for="">@lang('accounts.amount') <span
                                                        class="text-danger"> *</span></label>
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
                                                    <input class="primary_input_field" type="text"
                                                        id="placeholderInput"
                                                        placeholder="{{ isset($add_expense) ? ($add_expense->file != '' ? getFilePath3($add_expense->file) : trans('common.file')) : trans('common.file') }}"readonly>
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg"
                                                            for="browseFile">{{ __('common.browse') }}</label>
                                                        <input type="file" class="d-none" name="file"
                                                            id="browseFile">
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
                                                <textarea class="primary_input_field form-control" cols="0" rows="4" name="description">{{ isset($add_expense) ? $add_expense->description : old('description') }}</textarea>


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
                                            <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip"
                                                title="{{ $tooltip }}">
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
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15">@lang('accounts.expense_list') </h3>
                                </div>
                            </div>
                        </div>

                        {{-- Redesigned nested date-wise expense list --}}
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="expenseDateAccordion" class="mb-20">
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
                                            <div class="card-header bg-white p-2 cursor-pointer d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#{{ $collapseId }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="{{ $collapseId }}">
                                                <div>
                                                    <span class="font-weight-bold">{{ $displayDate }}</span>
                                                    <span class="text-muted small ml-2">@lang('accounts.total'): {{ number_format($totalForDate,2) }}</span>
                                                </div>
                                                <div>
                                                    <span class="badge badge-info">{{ $expensesForDate->count() }}</span>
                                                    <i class="ti-angle-down ml-2"></i>
                                                </div>
                                            </div>
                                            <div id="{{ $collapseId }}" class="collapse @if($loop->first) show @endif" data-parent="#expenseDateAccordion">
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table class="table table-sm mb-0 table-striped">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th style="width:50px">#</th>
                                                                    <th>@lang('common.name')</th>
                                                                    <th>@lang('accounts.payment_method')</th>
                                                                    <th>@lang('accounts.a_c_Head')</th>
                                                                    <th class="text-right">@lang('accounts.amount')</th>
                                                                    <th class="text-center">@lang('common.action')</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($expensesForDate as $index => $expense)
                                                                    <tr>
                                                                        <td>{{ $index + 1 }}</td>
                                                                        <td>{{ $expense->name }}</td>
                                                                        <td>{{ optional($expense->paymentMethod)->method }}</td>
                                                                        <td>{{ optional($expense->ACHead)->head }}</td>
                                                                        <td class="text-right">{{ number_format($expense->amount,2) }}</td>
                                                                        <td class="text-center">
                                                                            <div class="dropdown CRM_dropdown">
                                                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $expense->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    @lang('common.select')
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton{{ $expense->id }}">
                                                                                    @if(userPermission('add-expense-edit'))
                                                                                        <a class="dropdown-item" href="{{ route('add-expense-edit', $expense->id) }}">@lang('common.edit')</a>
                                                                                    @endif
                                                                                    @if(userPermission('add-expense-delete'))
                                                                                        <a class="dropdown-item" href="#" onclick="deleteExpense({{ $expense->id }});return false;">@lang('common.delete')</a>
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
        $(document).on('show.bs.collapse', '#expenseDateAccordion .collapse', function(){
            $(this).prev('.card-header').find('i.ti-angle-down').addClass('rotated');
        });
        $(document).on('hide.bs.collapse', '#expenseDateAccordion .collapse', function(){
            $(this).prev('.card-header').find('i.ti-angle-down').removeClass('rotated');
        });
    </script>
    <style>
        #expenseDateAccordion .card-header{cursor:pointer;}
        #expenseDateAccordion i.ti-angle-down{transition:transform .2s ease;}
        #expenseDateAccordion i.ti-angle-down.rotated{transform:rotate(180deg);}
    </style>
@endpush
