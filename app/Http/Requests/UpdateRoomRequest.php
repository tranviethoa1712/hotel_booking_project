<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoomRequest extends FormRequest
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
            "room_title" => ['required', 'max:255'],
            'description' => ['string'],
            'max_guest' => ['string'],
            'number_of_room' => ['string'],
            'price' => ['string', 'max:200'],
            "image" => ['image','mimes:jpeg,png,jpg,gif,svg', 'nullable'],
            'room_type' => ['required', Rule::in(['regular', 'premium', 'deluxe'])],
            'wifi' => ['required', Rule::in(['yes', 'no'])],
        ];
    }
}
