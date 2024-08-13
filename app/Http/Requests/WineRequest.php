<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WineRequest extends FormRequest
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
        $imageRules = 'sometimes|image|mimes:jpeg,jpg,png|max:2048';
        $nameRules ='';

        if ($this->isMethod('post')) {
            $imageRules = 'required|image|mimes:jpeg,jpg,png|max:2048';
            $nameRules = 'required|string|max:255|unique:wines,name';

        }

        if ($this->isMethod('put')) {
            $wineId = $this->route('wine')->id;
            $nameRules = 'required|string|max:255|unique:wines,name,' . $wineId;
        }
        return [
            'name' => $nameRules,
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'year' => 'required|integer|digits:4|before_or_equal:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => $imageRules, // Si es una URL, puedes usar 'url'
        ];
    }
    public function messages()
{
    return [
       
        'name.required' => 'El nombre del vino es obligatorio.',
        'name.string' => 'El nombre debe ser una cadena de texto.',
        'name.max' => 'El nombre no debe exceder los 255 caracteres.',
        'name.unique' => 'El nombre del vino ya está en uso.',

        'category_id.required' => 'La categoría es obligatoria.',
        'category_id.exists' => 'La categoría seleccionada no existe.',

        'description.required' => 'La descripción es obligatoria.',
        'description.string' => 'La descripción debe ser una cadena de texto.',


        'year.required' => 'El año es obligatorio.',
        'year.integer' => 'El año debe ser un número entero.',
        'year.digits' => 'El año debe tener exactamente 4 dígitos.',
        'year.before_or_equal' => 'El año debe ser igual o anterior al año actual.',


        'price.required' => 'El precio es obligatorio.',
        'price.numeric' => 'El precio debe ser un valor numérico.',
        'price.min' => 'El precio debe ser un valor positivo.',


        'stock.required' => 'El stock es obligatorio.',
        'stock.integer' => 'El stock debe ser un número entero.',
        'stock.min' => 'El stock debe ser un valor positivo.',

        
        'image.required' => 'La imagen es obligatoria.',
        'image.string' => 'La imagen debe ser una cadena de texto.',
        'image.max' => 'La imagen no debe exceder los 255 caracteres.',
    ];
}

}
