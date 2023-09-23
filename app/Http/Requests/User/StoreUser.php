<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'email' => [
                'required', 'email', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
            ],
            'specialty' => 'required',
            'sub_specialty' =>'required',
            'password' => 'required|min:8',
            'join_date' => 'required|date',
            'birth_date' => 'required|date',
            'phone' => 'required|string|min:10',
            'address' => 'required|string',
            'gender'  =>'required|in:male,female',
            'image'   => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'shift'=> 'required',
        ];
    }
}
