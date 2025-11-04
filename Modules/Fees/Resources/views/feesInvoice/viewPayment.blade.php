@php
$settings = generalSetting();
$currencySymbol = $settings->currency_symbol ?? '';
$assignedAmount = optional($feesinvoice)->Tamount ?? 0;
$waiverAmount = optional($feesinvoice)->Tweaver ?? 0;
$fineAmount = optional($feesinvoice)->Tfine ?? 0;
$paidAmount = optional($feesinvoice)->Tpaidamount ?? 0;
$balanceAmount = ($assignedAmount + $fineAmount) - ($paidAmount + $waiverAmount);
$studentName = optional(optional($feesinvoice)->studentInfo)->full_name;
$record = optional($feesinvoice)->recordDetail;
$className = optional(optional($record)->class)->class_name;
$sectionName = optional(optional($record)->section)->section_name;
$shiftName = shiftEnable() ? optional(optional($record)->shift)->shift_name : null;
$invoiceDate = optional($feesinvoice)->create_date ?? optional($feesinvoice)->created_at;
$transactions = ($feesTranscations ?? collect())->whereNotNull('payment_method')->values();
$rawBalance = round($balanceAmount, 2);
$displayBalance = $rawBalance;
if ($displayBalance < 0) { $displayBalance=0; } $isSettled=$rawBalance <=0.01; $statusVariant='fees-ledger__status--due'
  ; $statusLabel=__('fees.unpaid'); if ($isSettled) { $displayBalance=0; $statusVariant='fees-ledger__status--paid' ;
  $statusLabel=__('fees.paid'); } elseif ($paidAmount> 0) {
  $statusVariant = 'fees-ledger__status--partial';
  $statusLabel = __('fees.partial');
  }
  $statusMeta = __('accounts.balance') . ': ' . $currencySymbol . number_format($displayBalance, 2);
  $statusCountText = __('Total payments: :count', ['count' => $transactions->count()]);
  $lastPaymentDate = optional($transactions->sortByDesc('created_at')->first())->created_at ?? null;
  if ($lastPaymentDate) {
  $statusCountText .= ' | ' . __('Last payment: :date', ['date' => dateConvert($lastPaymentDate)]);
  }
  @endphp
  <div class="fees-modal__header fees-modal__header--info">
    <div class="fees-ledger__header">
      <div class="fees-ledger__header-info">
        <span class="fees-modal__eyebrow">@lang('fees::feesModule.fees_details')</span>
        <h4 class="fees-modal__title" id="viewFeesPaymentLabel">
          <span class="invoice-badge">#{{ $feesinvoice->invoice_id }}</span>
          @if ($studentName)
          {{ $studentName }}
          @else
          @lang('fees::feesModule.view_payment')
          @endif
        </h4>
        <div class="fees-modal__meta">
          @if ($className || $sectionName)
          <span><i class="ti-bookmark"></i>
            {{ trim($className . ($sectionName ? ' • ' . $sectionName : '')) }}</span>
          @endif
          @if ($shiftName)
          <span><i class="ti-time"></i> {{ $shiftName }}</span>
          @endif
          @if ($invoiceDate)
          <span><i class="ti-calendar"></i> {{ dateConvert($invoiceDate) }}</span>
          @endif
        </div>
      </div>
      <div class="fees-ledger__status {{ $statusVariant }}">
        <div class="status-badge">
          <i class="status-icon {{ $isSettled ? 'ti-check-box' : ($paidAmount > 0 ? 'ti-info-alt' : 'ti-alert') }}"></i>
          <div class="status-content">
            <span class="status-label">{{ $statusLabel }}</span>
            <span class="status-value">{{ $currencySymbol }}{{ number_format($displayBalance, 2) }}</span>
          </div>
        </div>
        <div class="status-details">
          <div class="status-detail-item">
            <i class="ti-receipt"></i>
            <span>{{ $transactions->count() }} {{ __('payments') }}</span>
          </div>
          @if ($lastPaymentDate)
          <div class="status-detail-item">
            <i class="ti-calendar"></i>
            <span>{{ dateConvert($lastPaymentDate) }}</span>
          </div>
          @endif
        </div>
      </div>
    </div>
    <button type="button" class="fees-modal__close" data-dismiss="modal" aria-label="@lang('common.close')">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="fees-modal__body">
    <!-- Invoice Snapshot with Enhanced Visual Design -->
    <div class="invoice-snapshot">
      <div class="snapshot-header">
        <div class="snapshot-icon">
          <i class="ti-file"></i>
        </div>
        <div class="snapshot-info">
          <h5 class="snapshot-title">{{ __('Invoice Summary') }}</h5>
          <p class="snapshot-subtitle">{{ __('Financial overview of this invoice') }}</p>
        </div>
      </div>

      <div class="fees-ledger__summary">
        <div class="fees-ledger__summary-card card-primary">
          <div class="card-icon">
            <i class="ti-money"></i>
          </div>
          <div class="card-content">
            <span class="fees-ledger__summary-label">@lang('accounts.amount')</span>
            <span class="fees-ledger__summary-value">{{ $currencySymbol }}{{ number_format($assignedAmount, 2) }}</span>
          </div>
        </div>

        <div class="fees-ledger__summary-card card-success">
          <div class="card-icon">
            <i class="ti-gift"></i>
          </div>
          <div class="card-content">
            <span class="fees-ledger__summary-label">@lang('fees::feesModule.waiver')</span>
            <span class="fees-ledger__summary-value">{{ $currencySymbol }}{{ number_format($waiverAmount, 2) }}</span>
          </div>
        </div>

        <div class="fees-ledger__summary-card card-warning">
          <div class="card-icon">
            <i class="ti-alert"></i>
          </div>
          <div class="card-content">
            <span class="fees-ledger__summary-label">@lang('fees.fine')</span>
            <span class="fees-ledger__summary-value">{{ $currencySymbol }}{{ number_format($fineAmount, 2) }}</span>
          </div>
        </div>

        <div class="fees-ledger__summary-card card-info">
          <div class="card-icon">
            <i class="ti-check"></i>
          </div>
          <div class="card-content">
            <span class="fees-ledger__summary-label">@lang('fees.paid')</span>
            <span class="fees-ledger__summary-value">{{ $currencySymbol }}{{ number_format($paidAmount, 2) }}</span>
          </div>
        </div>

        <div
          class="fees-ledger__summary-card card-balance {{ $displayBalance > 0.01 ? 'balance-negative' : 'balance-settled' }}">
          <div class="card-icon">
            <i class="{{ $displayBalance > 0.01 ? 'ti-wallet' : 'ti-check-box' }}"></i>
          </div>
          <div class="card-content">
            <span class="fees-ledger__summary-label">@lang('accounts.balance')</span>
            <span class="fees-ledger__summary-value">{{ $currencySymbol }}{{ number_format($displayBalance, 2) }}</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Payment Ledger with Modern Table Design -->
    <div class="payment-ledger">
      <div class="ledger-header">
        <div class="ledger-title-group">
          <div class="ledger-icon">
            <i class="ti-receipt"></i>
          </div>
          <div>
            <h5 class="ledger-title">{{ __('Payment History') }}</h5>
            <p class="ledger-subtitle">{{ __('Complete transaction records') }}</p>
          </div>
        </div>
        <div class="ledger-stats">
          <div class="stat-item">
            <span class="stat-label">@lang('common.total')</span>
            <span class="stat-value">{{ $transactions->count() }}</span>
          </div>
          @if ($lastPaymentDate)
          <div class="stat-item">
            <span class="stat-label">{{ __('Latest') }}</span>
            <span class="stat-value">{{ dateConvert($lastPaymentDate) }}</span>
          </div>
          @endif
        </div>
      </div>

      <div class="fees-ledger__table">
        <table class="table fees-modal-table" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th><i class="ti-hash"></i> @lang('common.sl')</th>
              <th><i class="ti-calendar"></i> @lang('common.date')</th>
              <th><i class="ti-credit-card"></i> @lang('fees::feesModule.payment_method')</th>
              <th><i class="ti-exchange-vertical"></i> @lang('fees::feesModule.change_method')</th>
              <th><i class="ti-wallet"></i> @lang('fees::feesModule.paid_amount')</th>
              <th><i class="ti-gift"></i> @lang('fees::feesModule.waiver')</th>
              <th><i class="ti-alert"></i> @lang('fees.fine')</th>
              <th><i class="ti-settings"></i> @lang('common.action')</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($transactions as $feesTranscation)
            @php
            $canChangeMethod = in_array($feesTranscation->payment_method, ['Cash', 'Cheque', 'Bank']);
            $canDelete = $canChangeMethod || $feesTranscation->payment_method === 'Wallet';
            @endphp
            <tr>
              <td data-label="@lang('common.sl')">
                <span class="table-badge badge-primary">{{ $loop->iteration }}</span>
              </td>
              <td data-label="@lang('common.date')">
                <div class="table-date">
                  <i class="ti-time"></i>
                  <span>{{ dateConvert($feesTranscation->created_at) }}</span>
                </div>
              </td>
              <td data-label="@lang('fees::feesModule.payment_method')">
                <span class="payment-method-badge method-{{ strtolower($feesTranscation->payment_method) }}">
                  <i class="ti-credit-card"></i>
                  {{ $feesTranscation->payment_method }}
                </span>
              </td>
              <td data-label="@lang('fees::feesModule.change_method')">
                @if ($canChangeMethod)
                {{
                                        html()->form('POST', route('fees.change-method'))->attributes([
                                            'class' => 'form-horizontal fees-change-method-form',
                                            'id' => 'feesChangeMethod' . $feesTranscation->id,
                                        ])->open()
                                    }}
                <input type="hidden" name="feesInvoiceId" value="{{ $feesTranscation->id }}">
                <div class="fees-modal__inline-form">
                  <div class="row align-items-center">
                    <div class="col-md-10">
                      <select
                        class="primary_select form-control changeMethod {{ $errors->has('change_method') ? ' is-invalid' : '' }}"
                        name="change_method">
                        <option data-display="@lang('fees::feesModule.change_method')" value="">
                          @lang('fees::feesModule.change_method')
                        </option>
                        @foreach ($paymentMethods as $paymentMethod)
                        @if ($paymentMethod->method != $feesTranscation->payment_method)
                        <option value="{{ $paymentMethod->method }}">
                          {{ $paymentMethod->method }}</option>
                        @endif
                        @endforeach
                      </select>
                      @if ($errors->has('change_method'))
                      <span class="text-danger invalid-select" role="alert">
                        {{ $errors->first('change_method') }}
                      </span>
                      @endif
                    </div>
                    <div class="col-md-2 mt-2 mt-md-0 d-flex justify-content-md-end">
                      <button class="primary-btn icon-only submit fix-gr-bg changeMethodSubmit"
                        title="@lang('common.submit')">
                        <span class="ti-check"></span>
                      </button>
                    </div>
                  </div>
                  <div class="bankInfo mt-20 d-none">
                    <select
                      class="primary_select form-control bankId {{ $errors->has('bank_id') ? ' is-invalid' : '' }}"
                      name="bank_id">
                      <option data-display="@lang('fees::feesModule.select_bank')" value="">
                        @lang('fees::feesModule.select_bank')
                      </option>
                      @foreach ($banks as $bank)
                      <option value="{{ $bank->id }}" data-id="{{ $feesTranscation->id }}">
                        {{ $bank->bank_name }} ({{ $bank->account_number }})
                      </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="primary_input">
                    <label class="primary_input_label">@lang('common.note')</label>
                    <input class="primary_input_field form-control" name="payment_note">
                  </div>
                </div>
                {{ html()->form()->close() }}
                @else
                <span class="text-muted">{{ __('Not available for this method') }}</span>
                @endif
              </td>
              <td data-label="@lang('fees::feesModule.paid_amount')">
                <div class="table-amount amount-paid">
                  <i class="ti-check"></i>
                  <strong>{{ $currencySymbol }}{{ number_format($feesTranscation->paid_amount, 2) }}</strong>
                </div>
              </td>
              <td data-label="@lang('fees::feesModule.waiver')">
                <div class="table-amount amount-waiver">
                  <i class="ti-gift"></i>
                  <span>{{ $currencySymbol }}{{ number_format($feesTranscation->weaver, 2) }}</span>
                </div>
              </td>
              <td data-label="@lang('fees.fine')">
                <div class="table-amount amount-fine">
                  <i class="ti-alert"></i>
                  <span>{{ $currencySymbol }}{{ number_format($feesTranscation->fine, 2) }}</span>
                </div>
              </td>
              <td data-label="@lang('common.action')">
                <div class="fees-modal__table-actions">
                  <a class="action-btn action-view" type="button"
                    href="{{ route('fees.single-payment-view', ['id' => $feesTranscation->id, 'type' => 'view']) }}"
                    title="@lang('common.view')">
                    <i class="ti-eye"></i>
                  </a>
                  @if ($canDelete)
                  <a class="action-btn action-delete" type="button"
                    href="{{ route('fees.delete-single-fees-transcation', $feesTranscation->id) }}"
                    data-tooltip="tooltip" title="@lang('common.delete')">
                    <i class="ti-trash"></i>
                  </a>
                  @endif
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="8">
                <div class="fees-modal__empty">
                  <i class="ti-info-alt"></i>
                  <p>{{ __('common.no_data_available') }}</p>
                </div>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
  <script>
  if ($('.primary_select').length) {
    $('.primary_select').niceSelect();
  }

  $('.changeMethod').on('change', function() {
    if ($(this).val() == 'Bank') {
      $(this).parents('tr').find('.bankInfo').removeClass('d-none');
    } else {
      $(this).parents('tr').find('.bankInfo').addClass('d-none');
      $(this).parents('tr').find('.bankId').val('');
    }
  });

  $(document).on('click', '.changeMethodSubmit', function(e) {
    e.preventDefault();
    let feesChangeMethodForm = $(this).parents('form');

    const submit_url = feesChangeMethodForm.attr('action');
    const method = feesChangeMethodForm.attr('method');
    const formData = new FormData(feesChangeMethodForm[0]);
    $.ajax({
      url: submit_url,
      type: method,
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      dataType: 'JSON',
      success: function() {
        toastr.success('Save Successfully', 'Successful', {
          timeOut: 5000,
        });
        location.reload();
      },
    });
  });
  </script>