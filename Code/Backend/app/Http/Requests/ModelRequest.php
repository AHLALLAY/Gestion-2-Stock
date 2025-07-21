<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        // Création (POST) - addModel
        if ($this->isMethod('post')) {
            return [
                'name' => ['required', 'string', 'max:30'],
                'brandId' => ['required', 'integer', 'exists:brands,id'],
            ];
        }
        // Mise à jour (PATCH) - updateModelName
        if ($this->isMethod('patch')) {
            return [
                'name' => ['required', 'string', 'max:30'],
            ];
        }
        // Suppression (DELETE) - deleteModel
        if ($this->isMethod('delete')) {
            return [
                'deletType' => ['required', 'string', 'in:soft,hard'],
            ];
        }
        return [];
    }
} 