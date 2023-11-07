<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorRequest extends FormRequest
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
            'no_visitors' => 'required',
            'guest_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'type' => 'required',
            'department_id' => 'required',
            'office_institution_name' => 'required',
            'number_of_people' => 'required',
            'user_id' => 'required',
            'purpose' => 'required',
        ];
    }
}
