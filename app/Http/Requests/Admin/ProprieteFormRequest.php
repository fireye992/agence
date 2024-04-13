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
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:6'],
            'surface' => ['required', 'integer', 'min:0'],
            'pieces' => ['required', 'integer', 'min:1'],
            'chambres' => ['required', 'integer', 'min:0'],
            'etage' => ['required', 'integer', 'min:0'],
            'prix' => ['required', 'numeric'],
            'ville' => ['required', 'min:3'],
            'adresse' =>['required', 'min:5'],
            'code_postal' => ['required', 'min:3'],
            'vendu' => ['required', 'boolean'],
            'options' => ['array', 'exists:options,id', 'required']
        ];
    }
}
