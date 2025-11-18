<?php

namespace Modules\Fees\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAddFeesPaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'payment_method' => 'required',
            'bank' => 'required_if:payment_method,Bank',
            'file' => 'nullable|mimes:jpg,jpeg,png,pdf',
            'payment_date' => 'nullable|date',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
