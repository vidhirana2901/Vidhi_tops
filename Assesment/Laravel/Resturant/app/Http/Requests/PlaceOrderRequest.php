<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'delivery_address' => ['required', 'string', 'min:10'],
            'total_amount' => ['required', 'numeric', 'min:0.01'],
            'restaurant_id' => ['required', 'exists:restaurants,id'],
        ];
    }
}