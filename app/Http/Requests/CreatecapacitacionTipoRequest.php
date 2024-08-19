<?php

namespace App\Http\Requests;

use App\Models\capacitacionTipo;
use Illuminate\Foundation\Http\FormRequest;

class CreatecapacitacionTipoRequest extends FormRequest
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
        return capacitacionTipo::$rules;
    }

    public function messages()
    {
        return capacitacionTipo::$messages;
    }
}
