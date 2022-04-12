<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'status'=>'required',
            'price'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'لطفا عنوان محصول را وارد کنید' ,
            'status.required' => 'لطفا وضعیت نمایش محصول  را وارد کنید' ,
            'price.required' => 'لطفا قیمت محصول را وارد کنید' ,
        ];
    }
}
