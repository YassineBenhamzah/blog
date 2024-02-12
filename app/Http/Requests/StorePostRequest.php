<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title_en' => 'required|max:255|unique:posts,id'.$this->id,
            'title_fr' => 'required|max:255|unique:posts,id'.$this->id,
            'body_en' => 'required|max:1000',
            'body_fr' => 'required|max:1000',
            'category_id' => 'required|numeric',
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:2040',
        ];
    }
}
