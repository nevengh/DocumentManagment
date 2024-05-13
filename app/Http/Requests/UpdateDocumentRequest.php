<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
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
            'title' => 'sometimes|string|max:50',
            'description' => 'sometimes|string|max:255',
            'file_path' => 'sometimes|file|mimes:pdf,doc,docx|max:2048',
            'document_type_id' => 'nullable:document_type_id',
            'user_id' => 'nullable:user_id',
        ];
    }
}
