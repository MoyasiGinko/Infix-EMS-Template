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
        <span class="fees-modal__eyebrow">@lang('fees.fees_details')</span>
        <h4 class="fees-modal__title" id="viewFeesPaymentLabel"
          style="display:inline-flex;flex-direction:column;align-items:flex-start;width:auto;">
          <span class="fees-modal__title-student">
            @if ($studentName)
            {{ $studentName }}
            @else
            @lang('fees.feesModule.view_payment')
            @endif
          </span>
          <span class="invoice-badge d-block mt-1">#{{ $feesinvoice->invoice_id }}</span>
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
                <div class="change-method-cell">
                  @if ($canChangeMethod)
                  <div class="button-row">
                    <button type="button" class="change-method-trigger"
                      data-transaction-id="{{ $feesTranscation->id }}">
                      <i class="ti-exchange-vertical"></i>
                    </button>
                    @if ($feesTranscation->payment_note)
                    <button type="button" class="note-indicator" data-note="{{ $feesTranscation->payment_note }}">
                      ✨
                    </button>
                    @endif
                  </div>
                  @if ($feesTranscation->payment_note)
                  <div class="note-tooltip" style="display: none;">
                    <div class="note-tooltip-content">
                      {{ $feesTranscation->payment_note }}
                    </div>
                  </div>
                  @endif
                  @else
                  <span class="text-muted small">{{ __('N/A') }}</span>
                  @endif
                </div>
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

            <!-- Expandable Change Method Form Row -->
            @if ($canChangeMethod)
            <tr class="change-method-row" id="changeMethodRow{{ $feesTranscation->id }}" style="display: none;">
              <td colspan="8">
                <div class="change-method-expanded">
                  {{
                    html()->form('POST', route('fees.change-method'))->attributes([
                        'class' => 'fees-change-method-form',
                        'id' => 'feesChangeMethod' . $feesTranscation->id,
                    ])->open()
                  }}
                  <input type="hidden" name="feesInvoiceId" value="{{ $feesTranscation->id }}">

                  <div class="change-method-content">
                    <div class="change-method-header">
                      <div class="header-info">
                        <i class="ti-exchange-vertical"></i>
                        <span>{{ __('Change Payment Method for Transaction #:id', ['id' => $loop->iteration]) }}</span>
                      </div>
                      <button type="button" class="close-change-method"
                        data-transaction-id="{{ $feesTranscation->id }}">
                        <i class="ti-close"></i>
                      </button>
                    </div>

                    <div class="change-method-fields">
                      <div class="field-group">
                        <label class="field-label">
                          <i class="ti-credit-card"></i>
                          {{ __('New Payment Method') }}
                        </label>
                        <select
                          class="primary_select form-control changeMethod {{ $errors->has('change_method') ? ' is-invalid' : '' }}"
                          name="change_method">
                          <option value="">{{ __('Select payment method') }}</option>
                          @foreach ($paymentMethods as $paymentMethod)
                          @if ($paymentMethod->method != $feesTranscation->payment_method)
                          <option value="{{ $paymentMethod->method }}">{{ $paymentMethod->method }}</option>
                          @endif
                          @endforeach
                        </select>
                        @if ($errors->has('change_method'))
                        <span class="text-danger invalid-select"
                          role="alert">{{ $errors->first('change_method') }}</span>
                        @endif
                      </div>

                      <div class="field-group bankInfo" style="display: none;">
                        <label class="field-label">
                          <i class="ti-home"></i>
                          {{ __('Select Bank') }}
                        </label>
                        <select
                          class="primary_select form-control bankId {{ $errors->has('bank_id') ? ' is-invalid' : '' }}"
                          name="bank_id">
                          <option value="">{{ __('Select bank account') }}</option>
                          @foreach ($banks as $bank)
                          <option value="{{ $bank->id }}" data-id="{{ $feesTranscation->id }}">
                            {{ $bank->bank_name }} ({{ $bank->account_number }})
                          </option>
                          @endforeach
                        </select>
                      </div>

                      <div class="field-group">
                        <label class="field-label">
                          <i class="ti-notepad"></i>
                          {{ __('Payment Note') }}
                          <span class="optional-label">{{ __('(Optional)') }}</span>
                        </label>
                        <textarea class="primary_input_field form-control" name="payment_note" rows="2"
                          placeholder="{{ __('Add any additional notes about this payment...') }}">{{ $feesTranscation->payment_note ?? '' }}</textarea>
                      </div>
                    </div>

                    <div class="change-method-actions">
                      <button type="button" class="btn-cancel" data-transaction-id="{{ $feesTranscation->id }}">
                        <i class="ti-close"></i>
                        {{ __('Cancel') }}
                      </button>
                      <button type="submit" class="btn-save changeMethodSubmit">
                        <i class="ti-check"></i>
                        {{ __('Save Changes') }}
                      </button>
                    </div>
                  </div>

                  {{ html()->form()->close() }}
                </div>
              </td>
            </tr>
            @endif
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
  $(document).ready(function() {
    // Initialize nice select with dropup option
    if ($('.primary_select').length) {
      $('.primary_select').niceSelect();
    }

    // Toggle change method form
    $(document).on('click', '.change-method-trigger', function() {
      const transactionId = $(this).data('transaction-id');
      const row = $('#changeMethodRow' + transactionId);

      // Close all other open rows
      $('.change-method-row').not(row).slideUp(300);

      // Toggle current row
      row.slideToggle(300, function() {
        if (row.is(':visible')) {
          // Reinitialize nice select for this row
          row.find('.primary_select').each(function() {
            const $select = $(this);
            if ($select.next('.nice-select').length) {
              $select.niceSelect('destroy');
            }
            $select.niceSelect();
          });
        }
      });
    });

    // Handle note indicator click to show tooltip
    $(document).on('click', '.note-indicator', function(e) {
      e.stopPropagation();
      const tooltip = $(this).closest('.change-method-cell').find('.note-tooltip');

      // Close all other tooltips
      $('.note-tooltip').not(tooltip).fadeOut(200);

      // Toggle current tooltip
      tooltip.fadeToggle(200);
    });

    // Close tooltip when clicking outside
    $(document).on('click', function(e) {
      if (!$(e.target).closest('.note-indicator, .note-tooltip').length) {
        $('.note-tooltip').fadeOut(200);
      }
    });

    // Close change method form
    $(document).on('click', '.close-change-method, .btn-cancel', function(e) {
      e.preventDefault();
      const transactionId = $(this).data('transaction-id');
      $('#changeMethodRow' + transactionId).slideUp(300);
    });

    // Handle bank selection visibility (using event delegation)
    $(document).on('change', '.changeMethod', function() {
      const bankInfo = $(this).closest('.change-method-fields').find('.bankInfo');
      if ($(this).val() == 'Bank') {
        bankInfo.slideDown(200, function() {
          // Reinitialize nice select for bank dropdown
          const $bankSelect = bankInfo.find('.primary_select');
          if ($bankSelect.next('.nice-select').length) {
            $bankSelect.niceSelect('destroy');
          }
          $bankSelect.niceSelect();
        });
      } else {
        bankInfo.slideUp(200);
        bankInfo.find('.bankId').val('');
      }
    });

    // Submit form
    $(document).on('click', '.changeMethodSubmit', function(e) {
      e.preventDefault();
      const button = $(this);
      const form = button.closest('form');

      // Validate form - payment method is required
      const changeMethod = form.find('select[name="change_method"]').val();
      if (!changeMethod || changeMethod === '') {
        toastr.error('{{ __("Please select a payment method to save changes") }}',
          '{{ __("Validation Error") }}', {
            timeOut: 3000,
          });
        // Highlight the select field
        form.find('select[name="change_method"]').focus();
        return;
      }

      // Check if Bank is selected and bank_id is required
      if (changeMethod === 'Bank') {
        const bankId = form.find('select[name="bank_id"]').val();
        if (!bankId || bankId === '') {
          toastr.error('{{ __("Please select a bank account") }}', '{{ __("Validation Error") }}', {
            timeOut: 3000,
          });
          // Highlight the bank select field
          form.find('select[name="bank_id"]').focus();
          return;
        }
      }

      // Disable button and show loading
      button.prop('disabled', true).html('<i class="ti-reload"></i> {{ __("Saving...") }}');

      const submit_url = form.attr('action');
      const method = form.attr('method');
      const formData = new FormData(form[0]);

      // Debug: Log form data
      console.log('Form data being sent:');
      for (let [key, value] of formData.entries()) {
        console.log(key + ': ' + value);
      }

      $.ajax({
        url: submit_url,
        type: method,
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
          // Check if response indicates success
          let isSuccess = false;

          if (typeof response === 'object') {
            isSuccess = response.success === true || response.status === 'success' || response.message;
          } else if (typeof response === 'string') {
            isSuccess = true; // If we get a string response, treat it as success
          }

          if (isSuccess) {
            toastr.success('{{ __("Payment method changed successfully") }}', '{{ __("Success") }}', {
              timeOut: 2000,
            });
            setTimeout(function() {
              location.reload();
            }, 500);
          } else {
            button.prop('disabled', false).html('<i class="ti-check"></i> {{ __("Save Changes") }}');
            toastr.error('{{ __("Failed to change payment method") }}', '{{ __("Error") }}', {
              timeOut: 5000,
            });
          }
        },
        error: function(xhr) {
          // Check if it's actually a redirect (302/200 with HTML)
          if (xhr.status === 200 || xhr.status === 302) {
            toastr.success('{{ __("Payment method changed successfully") }}', '{{ __("Success") }}', {
              timeOut: 2000,
            });
            setTimeout(function() {
              location.reload();
            }, 500);
            return;
          }

          button.prop('disabled', false).html('<i class="ti-check"></i> {{ __("Save Changes") }}');

          let errorMessage = '{{ __("Failed to change payment method") }}';
          if (xhr.responseJSON && xhr.responseJSON.message) {
            errorMessage = xhr.responseJSON.message;
          } else if (xhr.responseJSON && xhr.responseJSON.error) {
            errorMessage = xhr.responseJSON.error;
          }

          toastr.error(errorMessage, '{{ __("Error") }}', {
            timeOut: 5000,
          });
        }
      });
    });
  });
  </script>