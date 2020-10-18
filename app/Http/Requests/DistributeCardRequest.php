<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistributeCardRequest extends FormRequest
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
            'number_of_player' => 'required|numeric|min:1'
        ];
    }

    public function messages(){
        return [
            'number_of_player.required' => 'Input value does not exist or value is invalid',
            'number_of_player.numeric' => 'Input value does not exist or value is invalid',
            'number_of_player.min' => 'Input value does not exist or value is invalid'
        ];
    }
}


