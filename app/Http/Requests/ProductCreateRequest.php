<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'thumb_image' => 'required|image|max:1024|mimes:png,jpg,jpeg',
            'name' => 'required|max:255',
            'category_id' => 'required',
            'price' => 'required|numeric|min:1|max_digits:10',
            'offer_price' => 'nullable|numeric|min:1|max_digits:10',
            'short_description' => 'required',
            'description' => 'required',
            'sku' => 'nullable',
            'seo_title' => 'nullable|max:255',
            'seo_description' => 'nullable|max:255',
        ];
    }
}
