<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRoomRequest extends FormRequest
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
            'price' => ['string', 'max:200'],
            "image" => ['required','image','mimes:jpeg,png,jpg,gif,svg'],
            'room_type' => ['required', Rule::in(['regular', 'premium', 'deluxe'])],
            'wifi' => ['required', Rule::in(['yes', 'no'])],
        ];
    }
}
