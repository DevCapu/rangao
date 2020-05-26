<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveFoodInsideRefrigeratorRequest extends FormRequest
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
            'food' => 'required|numeric|exists:foods,id',
            'quantity' => 'required|numeric',
            'expiration_date' => 'required|date_format:Y-m-d',
            'notification' => 'required|numeric',
        ];
    }
}
