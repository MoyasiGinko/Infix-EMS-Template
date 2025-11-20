<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Accounts\SmAddIncomeRequest;
use App\SmAddIncome;
use App\SmBankAccount;
use App\SmBankStatement;
use App\SmChartOfAccount;
use App\SmFeesPayment;
use App\SmPaymentMethhod;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Modules\Fees\Entities\FmFeesInvoice;
use Modules\Fees\Entities\FmFeesTransaction;

class SmAddIncomeController extends Controller
{
    public function index(Request $request)
    {
        /*
        try {
        */
            $add_incomes = $this->buildIncomeQuery()->get();

            $this->attachInvoiceMeta($add_incomes);
            $income_heads = SmChartOfAccount::where('type', 'I')->select(['head', 'type', 'id'])->get();
            $bank_accounts = SmBankAccount::where('school_id', Auth::user()->school_id)->select(['bank_name', 'account_name', 'opening_balance', 'account_number', 'current_balance'])->get();
            $payment_methods = SmPaymentMethhod::select(['method', 'id', 'type'])->get();

            return view('backEnd.accounts.add_income', ['add_incomes' => $add_incomes, 'income_heads' => $income_heads, 'bank_accounts' => $bank_accounts, 'payment_methods' => $payment_methods]);
        /*
        } catch (Exception $exception) {
            Toastr::error('Operation Failed', 'Failed');

            return redirect()->back();
        }
        */
    }

    public function store(SmAddIncomeRequest $smAddIncomeRequest)
    {
        /*
        try {
        */
            $destination = 'public/uploads/add_income/';
            // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $smAddIncome = new SmAddIncome();
            $smAddIncome->name = $smAddIncomeRequest->name;
            $smAddIncome->income_head_id = $smAddIncomeRequest->income_head;
            $smAddIncome->date = date('Y-m-d', strtotime($smAddIncomeRequest->date));
            $smAddIncome->payment_method_id = $smAddIncomeRequest->payment_method;
            if (paymentMethodName($smAddIncomeRequest->payment_method)) {
                $smAddIncome->account_id = $smAddIncomeRequest->accounts;
            }

            $smAddIncome->amount = $smAddIncomeRequest->amount;
            $smAddIncome->file = fileUpload($smAddIncomeRequest->file, $destination);
            $smAddIncome->description = $smAddIncomeRequest->description;
            $smAddIncome->school_id = Auth::user()->school_id;
            if (moduleStatusCheck('University')) {
                $smAddIncome->un_academic_id = getAcademicId();
            } else {
                $smAddIncome->academic_id = getAcademicId();
            }

            $smAddIncome->save();

            if (paymentMethodName($smAddIncomeRequest->payment_method)) {
                $bank = SmBankAccount::where('id', $smAddIncomeRequest->accounts)->first();
                $after_balance = $bank->current_balance + $smAddIncomeRequest->amount;

                $smBankStatement = new SmBankStatement();
                $smBankStatement->amount = $smAddIncomeRequest->amount;
                $smBankStatement->after_balance = $after_balance;
                $smBankStatement->type = 1;
                $smBankStatement->details = $smAddIncomeRequest->name;
                $smBankStatement->item_sell_id = $smAddIncome->id;
                $smBankStatement->payment_date = date('Y-m-d', strtotime($smAddIncomeRequest->date));
                $smBankStatement->bank_id = $smAddIncomeRequest->accounts;
                $smBankStatement->school_id = Auth::user()->school_id;
                $smBankStatement->payment_method = $smAddIncomeRequest->payment_method;
                $smBankStatement->save();

                $current_balance = SmBankAccount::find($smAddIncomeRequest->accounts);
                $current_balance->current_balance = $after_balance;
                $current_balance->update();
            }

            Toastr::success('Operation successful', 'Success');

            return redirect()->back();
        /*
        } catch (Exception $exception) {
            Toastr::error('Operation Failed', 'Failed');

            return redirect()->back();
        }
        */
    }

    public function edit(Request $request, $id)
    {
        /*
        try {
        */
            $add_income = SmAddIncome::find($id);
            $add_incomes = $this->buildIncomeQuery()->get();
            $this->attachInvoiceMeta($add_incomes);
            $income_heads = SmChartOfAccount::get();
            $bank_accounts = SmBankAccount::where('school_id', Auth::user()->school_id)->get();
            $payment_methods = SmPaymentMethhod::get();

            return view('backEnd.accounts.add_income', ['add_income' => $add_income, 'add_incomes' => $add_incomes, 'income_heads' => $income_heads, 'bank_accounts' => $bank_accounts, 'payment_methods' => $payment_methods]);
        /*
        } catch (Exception $exception) {
            Toastr::error('Operation Failed', 'Failed');

            return redirect()->back();
        }
        */
    }

    public function update(SmAddIncomeRequest $smAddIncomeRequest)
    {
        /*
        try {
        */
            $destination = 'public/uploads/add_income/';
            // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $add_income = SmAddIncome::find($smAddIncomeRequest->id);
            $add_income->name = $smAddIncomeRequest->name;
            $add_income->income_head_id = $smAddIncomeRequest->income_head;
            $add_income->date = date('Y-m-d', strtotime($smAddIncomeRequest->date));
            $add_income->payment_method_id = $smAddIncomeRequest->payment_method;
            if (paymentMethodName($smAddIncomeRequest->payment_method)) {
                $add_income->account_id = $smAddIncomeRequest->accounts;
            }

            $add_income->amount = $smAddIncomeRequest->amount;
            $add_income->file = fileUpdate($add_income->file, $smAddIncomeRequest->file, $destination);
            $add_income->description = $smAddIncomeRequest->description;
            $add_income->school_id = Auth::user()->school_id;
            if (moduleStatusCheck('University')) {
                $add_income->un_academic_id = getAcademicId();
            } else {
                $add_income->academic_id = getAcademicId();
            }

            $add_income->save();

            if (paymentMethodName($smAddIncomeRequest->payment_method)) {
                SmBankStatement::where('item_sell_id', $smAddIncomeRequest->id)->delete();
                $bank = SmBankAccount::where('id', $smAddIncomeRequest->accounts)->first();
                $after_balance = $bank->current_balance + $smAddIncomeRequest->amount;

                $smBankStatement = new SmBankStatement();
                $smBankStatement->amount = $smAddIncomeRequest->amount;
                $smBankStatement->after_balance = $after_balance;
                $smBankStatement->type = 1;
                $smBankStatement->details = $smAddIncomeRequest->name;
                $smBankStatement->item_sell_id = $add_income->id;
                $smBankStatement->payment_date = date('Y-m-d', strtotime($smAddIncomeRequest->date));
                $smBankStatement->bank_id = $smAddIncomeRequest->accounts;
                $smBankStatement->school_id = Auth::user()->school_id;
                $smBankStatement->payment_method = $smAddIncomeRequest->payment_method;
                $smBankStatement->save();

                $current_balance = SmBankAccount::find($smAddIncomeRequest->accounts);
                $current_balance->current_balance = $after_balance;
                $current_balance->update();
            }

            Toastr::success('Operation successful', 'Success');

            return redirect()->route('add_income');
        /*
        } catch (Exception $exception) {
            Toastr::error('Operation Failed', 'Failed');

            return redirect()->back();
        }
        */
    }

    public function delete(Request $request)
    {
        /*
        try {
*/

            $add_income = SmAddIncome::find($request->id);
            if ($add_income->file !== '') {
                $path = $add_income->file;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            if (paymentMethodName($add_income->payment_method_id) && $add_income->account_id) {
                $reset_balance = SmBankStatement::where('item_sell_id', $request->id)->sum('amount');
                $bank = SmBankAccount::where('id', $add_income->account_id)->first();
                $after_balance = $bank->current_balance - $reset_balance;

                $current_balance = SmBankAccount::find($add_income->account_id);
                $current_balance->current_balance = $after_balance;
                $current_balance->update();
                SmBankStatement::where('item_sell_id', $request->id)->delete();
            }

            $add_income->delete();

            Toastr::success('Operation successful', 'Success');

            return redirect()->route('add_income');
        /*
        } catch (Exception $exception) {
            Toastr::error('Operation Failed', 'Failed');

            return redirect()->back();
        }
        */
    }

    private function buildIncomeQuery()
    {
        return SmAddIncome::with([
            'paymentMethod:id,method',
            'ACHead:id,head,type',
            'incomeHeads:id,name',
        ])->select(['name', 'id', 'date', 'payment_method_id', 'income_head_id', 'amount', 'fees_collection_id']);
    }

    private function attachInvoiceMeta(Collection $incomes): void
    {
        if ($incomes->isEmpty()) {
            return;
        }

        $collectionIds = $incomes->pluck('fees_collection_id')->filter()->unique()->values();

        if ($collectionIds->isEmpty()) {
            return;
        }

        $numericIds = $collectionIds->filter(function ($id) {
            return is_numeric($id);
        })->map(function ($id) {
            return (int) $id;
        })->values();

        $stringIds = $collectionIds->filter(function ($id) {
            return ! is_numeric($id);
        })->values();

        $metaIndex = [];
        $directInvoiceQuery = FmFeesInvoice::with([
            'studentInfo',
            'invoiceDetails.feesType',
        ]);

        $appliedInvoiceFilter = false;
        if ($numericIds->isNotEmpty()) {
            $directInvoiceQuery->whereIn('id', $numericIds);
            $appliedInvoiceFilter = true;
        }
        if ($stringIds->isNotEmpty()) {
            $method = $appliedInvoiceFilter ? 'orWhereIn' : 'whereIn';
            $directInvoiceQuery->{$method}('invoice_id', $stringIds);
            $appliedInvoiceFilter = true;
        }

        $directInvoices = $appliedInvoiceFilter ? $directInvoiceQuery->get() : collect();

        /** @var \Modules\Fees\Entities\FmFeesInvoice $invoice */
        foreach ($directInvoices as $invoice) {
            $meta = $this->formatInvoiceMeta($invoice);
            $metaIndex[$invoice->id] = $meta;
            if (! empty($invoice->invoice_id)) {
                $metaIndex[$invoice->invoice_id] = $meta;
            }
        }

        $pendingIds = $collectionIds->filter(function ($id) use ($metaIndex) {
            return ! isset($metaIndex[$id]);
        });

        if ($pendingIds->isNotEmpty()) {
            $transactionQuery = FmFeesTransaction::with([
                'feesInvoiceInfo.studentInfo',
                'feesInvoiceInfo.invoiceDetails.feesType',
            ]);

            $pendingNumericIds = $pendingIds->filter(function ($id) {
                return is_numeric($id);
            })->map(function ($id) {
                return (int) $id;
            })->values();

            $appliedTransactionFilter = false;
            if ($pendingNumericIds->isNotEmpty()) {
                $transactionQuery->whereIn('id', $pendingNumericIds);
                $appliedTransactionFilter = true;
            }

            if ($pendingIds->isNotEmpty()) {
                $method = $appliedTransactionFilter ? 'orWhereIn' : 'whereIn';
                $transactionQuery->{$method}('fees_invoice_id', $pendingIds);
                $appliedTransactionFilter = true;
            }

            $transactions = $appliedTransactionFilter ? $transactionQuery->get() : collect();

            /** @var \Modules\Fees\Entities\FmFeesTransaction $transaction */
            foreach ($transactions as $transaction) {
                if ($transaction->feesInvoiceInfo) {
                    $meta = $this->formatInvoiceMeta($transaction->feesInvoiceInfo);
                    $metaIndex[$transaction->id] = $meta;
                    if (! empty($transaction->fees_invoice_id)) {
                        $metaIndex[$transaction->fees_invoice_id] = $meta;
                    }
                }
            }

            $pendingIds = $pendingIds->filter(function ($id) use ($metaIndex) {
                return ! isset($metaIndex[$id]);
            });
        }

        if ($pendingIds->isNotEmpty()) {
            $legacyNumericIds = $pendingIds->filter(function ($id) {
                return is_numeric($id);
            })->map(function ($id) {
                return (int) $id;
            })->values();

            $legacyPayments = $legacyNumericIds->isNotEmpty()
                ? SmFeesPayment::with('studentInfo')->whereIn('id', $legacyNumericIds)->get()->keyBy('id')
                : collect();

            foreach ($legacyPayments as $payment) {
                $metaIndex[$payment->id] = $this->formatLegacyPaymentMeta($payment);
            }
        }

        $incomes->each(function (SmAddIncome $income) use ($metaIndex): void {
            $income->setAttribute(
                'invoice_meta',
                ($income->fees_collection_id && isset($metaIndex[$income->fees_collection_id]))
                    ? $metaIndex[$income->fees_collection_id]
                    : null
            );
        });
    }

    private function formatInvoiceMeta(FmFeesInvoice $invoice): array
    {
        $student = $invoice->studentInfo;
        $studentName = optional($student)->full_name;

        if (empty($studentName) && $student) {
            $studentName = trim(implode(' ', array_filter([
                $student->first_name ?? null,
                $student->last_name ?? null,
            ])));
        }

        $identifier = optional($student)->admission_no
            ?? optional($student)->student_id
            ?? optional(optional($student)->user)->username
            ?? null;

        $feeHeads = [];
        if ($invoice->relationLoaded('invoiceDetails')) {
            $feeHeads = $invoice->invoiceDetails
                ->map(function ($detail) {
                    return optional($detail->feesType)->name;
                })
                ->filter()
                ->unique()
                ->values()
                ->all();
        }

        $invoiceDate = $this->normalizeDateValue($invoice->invoice_date ?? null)
            ?? $this->normalizeDateValue($invoice->issue_date ?? null)
            ?? $this->normalizeDateValue($invoice->due_date ?? null)
            ?? $this->normalizeDateValue($invoice->created_at ?? null);

        return [
            'invoice_db_id' => $invoice->id,
            'invoice_number' => $invoice->invoice_id,
            'student_name' => $studentName ?: __('common.unknown'),
            'student_identifier' => $identifier,
            'fee_heads' => $feeHeads,
            'invoice_date' => $invoiceDate,
            'view_url' => route('fees.fees-invoice-view', ['id' => $invoice->id, 'state' => 'view']),
        ];
    }

    private function formatLegacyPaymentMeta(SmFeesPayment $payment): array
    {
        $student = $payment->studentInfo;
        $studentName = optional($student)->full_name;

        if (empty($studentName) && $student) {
            $studentName = trim(implode(' ', array_filter([
                $student->first_name ?? null,
                $student->last_name ?? null,
            ])));
        }

        $identifier = optional($student)->admission_no
            ?? optional($student)->student_id
            ?? optional(optional($student)->user)->username
            ?? null;

        $legacyInvoiceNumber = __('fees.payment_id').' #'.str_pad((string) $payment->id, 6, '0', STR_PAD_LEFT);

        $paymentDate = $this->normalizeDateValue($payment->payment_date ?? null)
            ?? $this->normalizeDateValue($payment->date ?? null)
            ?? $this->normalizeDateValue($payment->created_at ?? null);

        return [
            'invoice_db_id' => $payment->id,
            'invoice_number' => $legacyInvoiceNumber,
            'student_name' => $studentName ?: __('common.unknown'),
            'student_identifier' => $identifier,
            'fee_heads' => [],
            'invoice_date' => $paymentDate,
            'view_url' => null,
        ];
    }

    private function normalizeDateValue($value): ?string
    {
        if ($value instanceof \DateTimeInterface) {
            return $value->format('Y-m-d');
        }

        if (is_string($value) && trim($value) !== '') {
            $timestamp = strtotime($value);

            if ($timestamp !== false) {
                return date('Y-m-d', $timestamp);
            }
        }

        return null;
    }
}
