<?php

namespace App\Http\Requests\Group;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupRequest extends FormRequest
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
            'name' => 'required|unique:groups'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute bắt buộc nhập',
            'name.unique' => ':attribute đã tồn tại',
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Tên nhóm quyền'
        ];
    }
}
