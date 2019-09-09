<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'title' => 'string',
            'res_id' => 'number|exists:restaurants,id',
            'state' => 'in:INIT,SUBMITTED,DELIVERED',
            'foods' => 'array|exists:foods,id',
        ];
    }
}
