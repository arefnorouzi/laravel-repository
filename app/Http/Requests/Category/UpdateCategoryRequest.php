<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /*
         * add auth()->check() here
         */
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'bail|required|string|min:2|max:100|unique:categories,id' . $this->category,
            'slug' => 'bail|required|string|min:2|max:100|unique:categories,id' . $this->category,
        ];
    }
}
