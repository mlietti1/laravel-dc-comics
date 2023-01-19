<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
            'title' => 'required|min:3|max:50',
            'description' => 'max:255',
            'thumb' => 'max:255',
            'price' => 'required|max:5',
            'series' => 'required|min:3|max:50',
            'sale_date' => 'required',
            'type' => 'required|min:3|max:50'
        ];
    }
}
