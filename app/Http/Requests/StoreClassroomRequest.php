<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroomRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'List_Classes.*.name_ar'=>'required',
            'List_Classes.*.name_en'=>'required',

        ];
    }
    public function messages()
    {
        return[
            'List_Classes.*.name_ar.required'=>trans('validation.required'),
            'List_Classes.*.name_ar.unique'=>trans('validation.unique'),
            'List_Classes.*.name_en.required'=>trans('validation.required'),
        ];
    }
}
