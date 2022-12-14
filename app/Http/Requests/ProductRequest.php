<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'purchased_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'selling_discount' => 'numeric|min:0|max:100',
            'stock' => 'numeric|min:0'
        ];
    }
}
