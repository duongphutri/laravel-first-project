<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMathangRequest extends FormRequest
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
            'id_product' => 'required|string',
            'id_thongtin' => 'required|numeric',
            'id_category' => 'required|numeric',
            'name' => 'required|string',
            'soluong' => 'nullable|string',
            'gia' => 'required|numeric',
            'is_sale' => 'required|numeric',
            'is_hot' => 'required|numeric',
            'is_show' => 'required|boolean',
        ];
    }
}
