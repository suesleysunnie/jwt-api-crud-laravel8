<?php

namespace App\Http\Requests;

use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', new FullName],
            'email' => 'required | unique:users,email',
            'password' => 'required | max:12 | min:6',
        ];
    }

    //Error msg personalize
    public function messages(){
        return [
            'name.required' => 'Por favor, preencha o campo nome.',
        ];
    }
}
