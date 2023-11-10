<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorEditRequest extends FormRequest
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
            'no_visitors' => 'required|string|max:255',
            'guest_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
            'type' => 'required|in:guest,visitor',
            'department_id' => 'required|exists:departments,id',
            'office_institution_name' => 'required|string|max:255',
            'number_of_people' => 'required|integer|min:1',
            'purpose' => 'required|string',
        ];
    }
}
