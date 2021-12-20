<?php

namespace App\Http\Requests\Publication;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'full_name' => 'required|max:200',
            'email' => 'required|string',
            'position' => 'nullable|string',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'img' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,jfif,svg'
        ];
    }
}
