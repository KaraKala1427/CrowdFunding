<?php

namespace App\Http\Requests\Publication;

use Illuminate\Foundation\Http\FormRequest;

class PublicationRequest extends FormRequest
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
            'category' => 'nullable|string',
            'full_name' => 'required|max:200',
            'img' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,jfif,svg',
            'description' => 'required|string|max:10000',
        ];
    }
}
