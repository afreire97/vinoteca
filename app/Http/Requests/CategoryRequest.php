<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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

        if ($this->isMethod('post')) {
            $imageRules = 'required|image|mimes:jpeg,jpg,png|max:2048';
        }

        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'image' => $imageRules,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre de la categoría es requerido.',
            'name.string' => 'El nombre de la categoría debe ser un texto.',
            'name.max' => 'El nombre de la categoría no debe exceder 255 caracteres.',

            'description.required' => 'La descripción es requerida.',
            'description.string' => 'La descripción debe ser un texto.',
            'description.max' => 'La descripción no debe exceder 2000 caracteres.',

            'image.required' => 'La imagen es requerida.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, jpg o png.',
            'image.max' => 'La imagen no debe exceder 2MB.',
        ];
    }
}
