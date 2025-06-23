<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => [
                'required',
                'email',
                'max:255',
                'regex:/^(?!.*\s)(?!.*\.\.)(?!.*@.*\.\.)(?!.*\.$)(?!.*-$)(?!^-)(?=.{1,64}@)(?=.{6,255}$)([a-zA-Z0-9](\.?[a-zA-Z0-9_\-])*)@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,}$/',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
        ];
    }
}
