<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            "room_id" => ['required', 'max:255'],
            "name" => ['required', 'max:255'],
            'email' => ['required'],
            'phone' => ['string', 'max:13'],
            "start_date" => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ];
    }
}
