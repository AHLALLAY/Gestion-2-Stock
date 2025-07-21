<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        // Création (POST) - addBrand
        if ($this->isMethod('post')) {
            return [
                'name' => ['required', 'string', 'max:30'],
                'is_deleted' => ['boolean'],
            ];
        }
        // Mise à jour (PATCH) - updateBrandName
        if ($this->isMethod('patch')) {
            return [
                'name' => ['required', 'string', 'max:30'],
            ];
        }
        // Suppression (DELETE) - deleteBrand
        if ($this->isMethod('delete')) {
            return [
                'deletType' => ['required', 'in:soft,hard'],
            ];
        }
        // Par défaut
        return [];
    }
}
