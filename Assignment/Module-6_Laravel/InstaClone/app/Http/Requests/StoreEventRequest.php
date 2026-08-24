<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'event_name'  => 'required|string|min:3|max:255',
            'date'        => 'required|date|after:today',
            'location'    => 'required|string|max:255',
            'description' => 'nullable|string|max:200',
        ];
    }

    public function messages(): array
    {
        return [
            'event_name.required' => 'Event name is required.',
            'date.required'       => 'Please select an event date.',
            'date.after'          => 'The event date must be a future date.',
            'location.required'   => 'Event location cannot be empty.',
            'description.max'     => 'Description must not exceed 200 characters.',
        ];
    }
}