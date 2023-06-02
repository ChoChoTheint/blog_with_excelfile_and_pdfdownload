<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostSaveRequest extends FormRequest
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
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'email' => 'email:rfc,dns',
            'file' => 'required',
        ];
    }
    public function messages() 
    {
        return [
            'title.max' => 'Title should not be greater than 255 chars.',
            'description.required' => 'Description must be fill',
            'email.required' => 'We need to know your e-mail address!',
            'file.required' => 'Image must be fill',
        ];
    }
}
