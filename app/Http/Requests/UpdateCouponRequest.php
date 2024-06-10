<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCouponRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => ['required', 'max:255'],
            'value' => ['required', Rule::in(['percentage', 'numeric'])],
            'amount' => ['required', 'max:50'],
            'type' => ['required', Rule::in(['voucher', 'discount'])],
            'uses' => ['required'],
            'max_uses' => ['required', 'max:20'],
            'max_uses_user' => ['required', 'max:20'],
            'start_at' => ['nullable', 'date'],
            'expired_at' => ['nullable', 'date']
        ];
    }
}
