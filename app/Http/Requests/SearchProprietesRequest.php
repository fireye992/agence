<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchProprietesRequest extends FormRequest
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
            'prix' => ['numeric', 'gte:0', 'nullable'],
            'surface' => ['numeric', 'gte:0', 'nullable'],
            'pieces' => ['numeric', 'gte:0', 'nullable'],
            'title' => ['string', 'nullable'],
        ];
    }
}
