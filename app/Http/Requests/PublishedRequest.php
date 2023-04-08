<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublishedRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'driver_id' => 'nullable|exists:users,id',
            'car_id' => 'nullable|exists:cars,id',
            'start_location' => 'required',
            'end_location' => 'required',
            'date' => 'nullable|date_format:Y-m-d',
            'time' => 'nullable|date_format:H:i:s',
            'seats_available' => 'nullable|integer|min:1',
            'price_per_seat' => 'nullable|numeric|min:0',
        ];
    }
}
