<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'categroy_id'=>'required|numeric',
            'subcategory_id'=>'required|numeric',
            'product_name'=>'required|string|max:250',
            'product_price'=>'required|numeric',
            'product_description'=>'nullable|string',
            'product_image'=>'required|mimes:png,jpg,jpeg|max:1024|'
        ];
    }
}
