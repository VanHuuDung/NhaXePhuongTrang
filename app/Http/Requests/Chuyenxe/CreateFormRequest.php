<?php

namespace App\Http\Requests\Chuyenxe;

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
            'NgayXuatPhat' => 'required'
        ];
    }

    public function messages():array
    {   
        return [
            'NgayXuatPhat.required' => 'Vui lòng nhập ngày xuất phát'
        ];
    }
}
