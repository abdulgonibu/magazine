<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MagazineRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required|min:5',
            'url' => 'nullable|url',
            'image' => 'nullable|image'
        ];
    }


     /**
     * Get the validation messages.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'title.required'  => 'Please give a title',
            'description.required' => 'Please give a description',
            'image.image'     => 'Please give a valid image',
            'url.url'     => 'Please give a valid url'
        ];
    }
}
