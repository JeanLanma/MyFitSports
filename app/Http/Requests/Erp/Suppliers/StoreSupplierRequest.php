<?php

namespace App\Http\Requests\Erp\Suppliers;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
            'category_id' => 'required',
            'fiscal_name' => 'required|string|max:255',
            'trade_name' => 'nullable|string|max:255',
            'responsible_contact' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'web_url' => 'nullable|string',
            'mail' => 'nullable|email|max:255',
            'payment_method' => 'required',
            'credit_days' => 'nullable|string',
            'application_type' => 'nullable|string|max:255',
            'seal_type' => 'nullable|string|max:255',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'El campo categoría es obligatorio.',
            'fiscal_name.required' => 'El campo nombre fiscal es obligatorio.',
            'responsible_contact.required' => 'El campo contacto responsable es obligatorio.',
            'payment_method.required' => 'El campo método de pago es obligatorio.',
        ];
    }
}
