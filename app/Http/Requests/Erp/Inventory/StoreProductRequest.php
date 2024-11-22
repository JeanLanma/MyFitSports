<?php

namespace App\Http\Requests\Erp\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'stock' => 'required|numeric',
            'unit' => 'required|string',
            'supplier' => 'required|string',
            'physical_inventory' => 'required|numeric',
        ];
    }
}
