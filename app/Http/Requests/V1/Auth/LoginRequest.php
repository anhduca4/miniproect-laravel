<?php
namespace App\Http\Requests\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username'      => 'required|min:6',
            'password'      => 'required|min:4',
            'client_id'     => 'required|exists:oauth_clients,id',
            'client_secret' => 'required|exists:oauth_clients,secret',
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
            'username'  => 'email hoặc số điện thoại',
            'password'  => 'mật khẩu',
        ];
    }
}
