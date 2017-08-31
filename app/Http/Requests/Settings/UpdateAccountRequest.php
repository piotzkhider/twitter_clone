<?php

namespace App\Http\Requests\Settings;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
            'url_name' => ['required', 'string', 'alpha_num',  'max:15', Rule::unique('users')->ignore(\Auth::id())],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(\Auth::id())],
            'password' => ['required', 'string', 'alpha_num', 'min:8', 'confirmed'],
        ];
    }
}
