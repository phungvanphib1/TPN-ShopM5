<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute  bắt buộc nhập',
            'category_id.required' => ':attribute bắt buộc nhập ',
            'quantity.required' => ':attribute bắt buộc nhập',
            'price.required' => ':attribute bắt buộc nhập',
            'description.required' => ':attribute bắt buộc nhập',
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Tên Sản Phẩm',
            'category_id'=>'Loại Sản Phẩm',
            'quantity'=>'Số lượng Sản Phẩm',
            'price'=>'Giá Sản Phẩm',
            'description'=>'Mô Tả Sản Phẩm',
        ];
    }
}
