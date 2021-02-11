<?php

namespace App\Http\Requests\v1;

use App\Http\Requests\Request;

class SubmitBrowseRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        switch ($this->method())
        {
            case 'POST':    //create
                return true;
            case 'PUT': //update
                return true;
            case 'PATCH':
            case 'GET':
            case 'DELETE':
            default:
            {
                return false;
            }
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method())
        {
            case 'POST':    //create
                return [
                    'id' => 'required|integer',
                ];
            case 'PUT': //update
                return [
                    'id' => 'required|integer',
                ];
            case 'PATCH':
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            }
        }
    }

    public function messages()
    {
        return [
            'id.required' =>'商品ID不能为空',
            'id.integer' =>'商品ID格式有误',
        ];
    }
}
