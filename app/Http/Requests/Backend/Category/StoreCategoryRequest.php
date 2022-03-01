<?php

namespace App\Http\Requests\Backend\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class StoreCategoryRequest extends FormRequest
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
        $id = '';
        if($this->id){
            $id = $this->id;
        }
        return [
//            'name' => 'required|unique:categoies,name|max:255'
            'name' => 'required|unique:categoies,name,'.$id.'|max:255'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Category name is required',
            'name.unique' => 'Category đã tồn tại',
            'name.max' => 'Maximum length 255 characters'
        ];
    }
    protected function failedValidation( Validator $validator )
    {
        throw ( new ValidationException($validator) )
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
