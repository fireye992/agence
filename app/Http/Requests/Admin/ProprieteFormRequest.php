<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Type\Integer;

class ProprieteFormRequest extends FormRequest
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
            'title' => ['required', 'min 6'],
            'description' => ['required', 'min 8'],
            'surface' => ['required', 'integer', 'min:9'],
            'pieces' => ['required', 'integer', 'min:1'],
            'chambres' => ['required', 'integer', 'min:0'],
            'etage' => ['required', 'integer', 'min:0'],
            'prix' => ['required', 'numeric'],
            'ville' => ['required', 'min:8'],
            'code_postal' => ['required', 'min:8'],
            'vendu' => ['required', 'boolean'],

            'adresse' =>['required', 'min 8'],
        ];
    }
}
