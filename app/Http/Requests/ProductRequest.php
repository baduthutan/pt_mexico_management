<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'CategoryName' => 'required|string', 
            'ProductName' => 'required|string|min:5|max:80',
            'Price' => 'required|integer',
            'Quantity' => 'required|integer',
            'ProductImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ];
    }

    public function messages()
    {
        return [
            'CategoryName.required' => 'The category name is required.',
            'ProductName.required' => 'The product name is required.',
            'ProductName.min' => 'The product name must be at least :min characters.',
            'ProductName.max' => 'The product name may not be greater than :max characters.',
            'Price.required' => 'The product price is required.',
            'Price.integer' => 'The product price must be an integer.',
            'Quantity.required' => 'The product quantity is required.',
            'Quantity.integer' => 'The product quantity must be an integer.',
            'ProductImage.image' => 'The uploaded file must be an image.',
            'ProductImage.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, gif.',
            'ProductImage.max' => 'The image may not be larger than :max kilobytes.',
        ];
    }
}

