<?php
namespace App\Http\Requests\V1\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'username'     => 'required|min:6',
            'password'     => 'required|min:4',
            'name'         => 'required|min:4',
            'email'        => 'required|email|min:4|unique:users,email',
            'birth_day'    => 'required|date',
            'address'      => 'required|min:4',
            'phone_number' => 'required|size:10',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
        ];
    }
}
