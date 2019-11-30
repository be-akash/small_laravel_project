<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'Code'=>'required|alpha|size:7',
            'productcategory' =>'required|gt:0',
            'productname' =>'required|gt:0',
            //
        ];
    }
    public function messages()
    {
        return [
            'Code.required' => 'Please Input a Unique Code',
            'productcategory.required' => 'Please select the product category',
            'productname.required' => 'Please select the product name',
            'productcategory.gt' => 'Please select the product category',
            'productname.gt' => 'Please select the product name',
            'Code.alpha' =>'The unique code may only contain letters',
           'Code.size' =>'The unique code must be 7 characters.'

        ];
    }
}
