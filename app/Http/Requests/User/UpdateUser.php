<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'name' => 'nullable|min:3',
            'email' => [
                'required', 'email', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
            ],
            'specialty' => 'nullable',
            'sub_specialty' =>'nullable',
            'password' => 'nullable|min:8',
            'join_date' => 'nullable|date',
            'birth_date' => 'nullable|date',
            'phone' => 'nullable|string|min:6',
            'address' => 'nullable|string',
            'gender'  =>'nullable|in:male,female',
            'image'   => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'shift'=> 'nullable',
        ];
    }
}
