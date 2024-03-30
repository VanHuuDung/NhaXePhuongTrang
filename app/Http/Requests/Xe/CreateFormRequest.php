<?php

namespace App\Http\Requests\Xe;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
        'TenXe' => 'required|string',
        'BienSoXe' => 'required|string', 
        'MaLoaiXe' => 'required|integer'
    ];
}

public function messages()
    {
        return [
        'TenXe.required' => 'Tên xe không được để trống',
        'TenXe.string' => 'Tên xe phải là chuỗi ký tự',
        'BienSoXe.required' => 'Biển số xe không được để trống',
        'BienSoXe.string' => 'Biển số xe phải là chuỗi ký tự',
        'MaLoaiXe.required' => 'Mã loại xe không được để trống',
        'MaLoaiXe.integer' => 'Mã loại xe phải là số nguyên'
        ];
    }

    
}
