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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name|min:2',
            'price' => 'required|numeric',
            'description' => 'required|min:10',
            'categoryId' => 'required|exists:categories,id',
            'gendreId' => 'required|exists:gendre,id',
            'image' => 'file|mimes:jpg,jpeg,gif,png|max:2000'
        ];
    }
}
