<?php

namespace App\Http\Requests;

use App\Models\capacitacionEquipo;
use Illuminate\Foundation\Http\FormRequest;

class UpdatecapacitacionEquipoRequest extends FormRequest
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
        $rules = capacitacionEquipo::$rules;
        
        return $rules;
    }

    public function messages()
    {
        return capacitacionEquipo::$messages;
    }
}
