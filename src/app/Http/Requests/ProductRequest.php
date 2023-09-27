<?php

namespace App\Http\Requests;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'numeric',
            'brand_id' => 'nullable|integer',
            'description' => 'nullable|string',
            'files.*' => 'mimes:jpeg,png,jpg|max:2048'
        ];
    }
}
