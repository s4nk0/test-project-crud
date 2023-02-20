<?php

namespace App\Http\Requests\Order;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date'=>'required|date',
            'phone'=>'nullable|regex:/^[\+][7]{1}[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/',
            'email'=>'required|email',
            'products_for_create'=>'required|array',
            'coords'=>'required',
        ];
    }
}
