<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'address' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'birthday' => 'required',
            'gender' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id'=>'required',
            'group_id' => 'required',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được để trống!',
            'address.required' => 'Không được để trống!',
            'email.required' => 'Không được để trống!',
            'email.unique' => 'Email đã tồn tại!',
            'birthday.required' => 'Không được để trống!',
            'phone.required' => 'Không được để trống!',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'gender.required' => 'Không được để trống!',
            'province_id.required' => 'Không được để trống!',
            'district_id.required' => 'Không được để trống!',
            'group_id.required' => 'Không được để trống!',
            'image.required' => 'Không được để trống!',
        ];
    }
}
