<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAppRequest extends FormRequest
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
            'nickname' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:20000',
        ];
    }
}
