<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        // Création (POST) - addProduct
        if ($this->isMethod('post')) {
            return [
                'type' => ['required', 'string', 'max:30'],
                'name' => ['required', 'string', 'max:50'],
                'quantity' => ['required', 'integer', 'min:0'],
                'price' => ['required', 'numeric', 'min:0'],
                'localisation' => ['nullable', 'string', 'max:100'],
                'colorId' => ['nullable', 'integer'],
                // 'model' et 'brand' si besoin
            ];
        }
        // Modification (PATCH) - editProduct
        if ($this->isMethod('patch')) {
            return [
                'type' => ['sometimes', 'string', 'max:30'],
                'name' => ['sometimes', 'string', 'max:50'],
                'quantity' => ['sometimes', 'integer', 'min:0'],
                'price' => ['sometimes', 'numeric', 'min:0'],
                'localisation' => ['nullable', 'string', 'max:100'],
                'colorId' => ['nullable', 'integer'],
            ];
        }
        // Suppression (DELETE) - deleteProduct
        if ($this->isMethod('delete')) {
            return [
                'typeDelete' => ['required', 'string', 'in:soft,hard'],
            ];
        }
        return [];
    }
} 