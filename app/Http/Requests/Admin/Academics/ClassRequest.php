<?php

namespace App\Http\Requests\Admin\Academics;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ClassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $shift_id = shiftEnable() &&  !empty($this->shift) ? $this->shift:null;
        if (generalSetting()->result_type == 'mark') {
            $unique_rule = Rule::unique('sm_classes', 'class_name')
                ->where('academic_id', getAcademicId())
                ->where('school_id', Auth::user()->school_id)
                ->ignore($this->id);

            if (shiftEnable() && !empty($shift_id)) {
                $unique_rule = $unique_rule->where('shift_id', $shift_id);
            }

            return [
                'name' => ['required', 'max:200', $unique_rule],
                'section' => 'required',
                'pass_mark' => 'required',
            ];
        }

        if(shiftEnable()){
            $unique_rule = Rule::unique('sm_classes', 'class_name')
                ->where('academic_id', getAcademicId())
                ->where('school_id', Auth::user()->school_id)
                ->ignore($this->id);

            if (shiftEnable() && !empty($shift_id)) {
                $unique_rule = $unique_rule->where('shift_id', $shift_id);
            }

            return [
                'name' => ['required', 'max:200', $unique_rule],
                'section' => 'required',
                'shift' => "required",
            ];
        }else{
            return [
                'name' => ['required', 'max:200', Rule::unique('sm_classes', 'class_name')->where('academic_id', getAcademicId())->where('school_id', Auth::user()->school_id)->ignore($this->id)],
                'section' => 'required',
            ];
        }
    }
}
