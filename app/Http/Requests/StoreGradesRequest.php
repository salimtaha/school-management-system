<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradesRequest extends FormRequest
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
            'name_ar'=>['required' , 'string'],
            'name_en'=>['required' , 'string'],

        ];
        
    }
    public function messages()
    {
        return[
            'name_ar.required'=>trans('validation.required'),
            'name_en.required'=>trans('validation.required'),
        ];
    }
}
