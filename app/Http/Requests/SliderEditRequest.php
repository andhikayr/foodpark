<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderEditRequest extends FormRequest
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
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|max:3072|mimes:png,jpg,jpeg',
            'offer' => 'min:1|max:100',
            'button_link' => 'required',
        ];
    }
}
