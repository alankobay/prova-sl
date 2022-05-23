<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CustomerCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'     => [
                'required',
                'string',
                'max:190',
            ],
            'userName' => [
                'required',
                'string',
                'max:50',
                'unique:' . app(Customer::class)->getTable() . ',user_name',
            ],
            'zipCode' => [
                'required',
                'string',
                'max:10',
            ],
            'email'    => [
                'required',
                'email',
                'max:190',
            ],
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:8',
                'max:32',
                Password::min(8)
                    ->letters()
                    ->numbers()
            ],
        ];
    }
}
