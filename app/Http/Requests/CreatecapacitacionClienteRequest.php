<?php

namespace App\Http\Requests;

use App\Models\capacitacionCliente;
use Illuminate\Foundation\Http\FormRequest;

class CreatecapacitacionClienteRequest extends FormRequest
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
        return capacitacionCliente::$rules;
    }

    public function messages()
    {
        return capacitacionCliente::$messages;
    }
}
