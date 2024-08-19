<?php

namespace App\Http\Requests;

use App\Models\capacitacionModelo;
use Illuminate\Foundation\Http\FormRequest;

class CreatecapacitacionModeloRequest extends FormRequest
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
        return capacitacionModelo::$rules;
    }

    public function messages()
    {
        return capacitacionModelo::$messages;
    }
}
