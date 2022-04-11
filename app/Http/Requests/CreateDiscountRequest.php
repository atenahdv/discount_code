<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDiscountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required',
            'type'=>'required',
            'amount'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'لطفا عنوان تخفیف را وارد کنید' ,
            'type.required' => 'لطفا نوع تخفیف را وارد کنید' ,
            'amount.required' => 'لطفا مقدار تخفیف را وارد کنید' ,
        ];
    }
}
