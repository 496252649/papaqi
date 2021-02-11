<?php

namespace App\Http\Requests\v1;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Validator;

class SubmitUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Validator::extend('mobile', function($attribute, $value, $parameters, $validator) {
            return preg_match('/^1[34578][0-9]{9}$/', $value);
        });
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
                    'name' => 'required|unique:users|string|max:16',
                    'cellphone' => 'required|unique:users|mobile|max:11',
                    'portrait' => 'nullable|string|max:255',
                    'gender' => 'required|numeric',
                    'password' => 'required|string|max:255',
                ];
            case 'PUT': //update
                $request = Request::all();
                return [
                    'name' => 'required|unique:users,name,'.$request['id'].'|string|max:30',
                    'cellphone' => 'required|unique:users,cellphone,'.$request['id'].'|mobile|max:11',
                    'portrait' => 'nullable|string|max:255',
                    'gender' => 'required|numeric',
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
            'name.required' => __('hint.error.not_null',['attribute'=>__('hint.routine.username')]),
            'name.unique' => __('hint.error.exist',['attribute'=>__('hint.routine.username')]),
            'name.max' => __('hint.error.exceed',['attribute'=>__('hint.routine.username'),'place'=>16]),
            'email.required' => __('hint.error.not_null',['attribute'=>__('hint.routine.email')]),
            'email.unique' => __('hint.error.exist',['attribute'=>__('hint.routine.email')]),
            'email.max' => __('hint.error.exceed',['attribute'=>__('hint.routine.email'),'place'=>190]),
            'cellphone.required' => __('hint.error.not_null',['attribute'=>__('hint.routine.cellphone')]),
            'cellphone.unique' => __('hint.error.exist',['attribute'=>__('hint.routine.cellphone')]),
            'password.required' => __('hint.error.not_null',['attribute'=>__('hint.routine.password')]),
            'portrait.required' => __('hint.error.uploading',['attribute'=>__('hint.routine.portrait')]),
        ];
    }


}
