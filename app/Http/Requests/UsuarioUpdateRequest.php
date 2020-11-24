<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'apellido'=>'required|max:255', 
            'nombre'=>'required', 
            'fechaNacimiento'=>'required', 
            'email'=>'required|max:255|email', 
            'telefono'=>'required|max:10'
        ];
    }
}