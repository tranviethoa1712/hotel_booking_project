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
            "room_id" => ['required'],
            'coupon_id' => ['required'],
            "fullname" => ['required', 'max:255'],
            'email' => ['string', 'max:255'],
            "address" => ['required'],
            'city' => ['nullable', 'max:100'],
            "zip_code" => ['nullable', 'max:255'],
            'country' => ['string', 'max:255'],
            "phone_number" => ['required', 'max:13'],
            'special_request' => ['nullable'],
            "arrival_time" => ['nullable', 'max:100'],
            'start_date' => ['required', 'date'],
            "end_date" => ['required', 'date'],
            'total_price' => ['string', 'max:100'],
            "room_quantity" => ['required', 'max:50'],
        ];
    }
}
