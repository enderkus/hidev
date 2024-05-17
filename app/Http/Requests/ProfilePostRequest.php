<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePostRequest extends FormRequest
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
            'sender_email' => 'required|email',
            'subject' => 'required|max:50',
            'mail_content' => 'required|max:320',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'sender_email' => filter_var($this->input('sender_email'), FILTER_SANITIZE_EMAIL),
            'subject' => filter_var($this->input('subject'), FILTER_SANITIZE_STRING),
            'mail_content' => filter_var($this->input('mail_content'), FILTER_SANITIZE_STRING),
        ]);
    }
}
