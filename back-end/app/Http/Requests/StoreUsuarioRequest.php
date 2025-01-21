<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class StoreUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     *
     * @param Validator $validator
     * 
     * 
     */
    public function after(Validator $validator)
    {
        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422));
        }
        return function () {};
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|max:255",
            "email" => "required|max:255|unique:users|email",
            "password" => "required|max:255",
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'nome é um campo obrigatório',
            'name.max' => 'nome tem o tamanho máximo de 255',
            'email.required' => 'email é um campo obrigatório',
            'email.max' => 'email tem o tamanho máximo de 255',
            'email.email' => 'email inválido',
            'email.unique' => 'email já cadastrado',

        ];
    }
}
