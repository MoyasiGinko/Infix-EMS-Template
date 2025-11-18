<?php

namespace Modules\Fees\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentAddFeesPaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'payment_method' => 'required',
            'bank' => 'required_if:payment_method,Bank',
            'total_paid_amount' => 'required|numeric|min:0.01',
            'payment_date' => 'nullable|date',
            'paid_amount' => 'required|array',
            'paid_amount.*' => 'nullable|numeric|min:0',
            'weaver' => 'array',
            'weaver.*' => 'nullable|numeric|min:0',
            'fine' => 'array',
            'fine.*' => 'nullable|numeric|min:0',
            'add_wallet' => 'nullable|numeric|min:0',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
