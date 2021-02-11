<?php

namespace App\Http\Requests\v1;

use App\Http\Requests\Request;

class SubmitGoodRequest extends Request
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
                    'name' => 'bail|required|string|max:60',
                    'number' => 'required|string|max:50',
                    'freight_id' => 'required|integer',
                    'brand_id' => 'nullable|integer',
                    'inventory' => 'nullable|integer',
                    'market_price' => 'nullable|numeric',
                    'cost_price' => 'nullable|numeric',
                    'price' => 'nullable|numeric',
                    'keywords' => 'nullable|string|max:255',
                    'short_description' => 'nullable|string|max:160',
                    'category_id' => 'required',
                    'details' => 'nullable|string',
                    'img' => 'nullable|url|max:255',
                    'good_sku' => 'nullable|array',
                    'good_sku.*.img' => 'nullable|url',
                    'good_sku.*.market_price' => 'required|numeric',
                    'good_sku.*.cost_price' => 'required|numeric',
                    'good_sku.*.price' => 'required|numeric',
                    'good_sku.*.inventory' => 'required|integer',
                    'is_show' => 'required|numeric',
                    'is_recommend' => 'nullable|boolean',
                    'is_new' => 'nullable|boolean',
                    'is_hot' => 'nullable|boolean',
                    'timing' => 'nullable|date',
                    'sort' => 'required|integer',
                ];
            case 'PUT': //update
                return [
                    'name' => 'bail|required|string|max:60',
                    'number' => 'required|string|max:50',
                    'freight_id' => 'required|integer',
                    'brand_id' => 'nullable|integer',
                    'inventory' => 'nullable|integer',
                    'market_price' => 'nullable|numeric',
                    'cost_price' => 'nullable|numeric',
                    'price' => 'nullable|numeric',
                    'keywords' => 'nullable|string|max:255',
                    'short_description' => 'nullable|string|max:160',
                    'category_id' => 'required',
                    'details' => 'nullable|string',
                    'img' => 'nullable|url|max:255',
                    'good_sku' => 'nullable|array',
                    'good_sku.*.img' => 'nullable|url',
                    'good_sku.*.market_price' => 'required|numeric',
                    'good_sku.*.cost_price' => 'required|numeric',
                    'good_sku.*.price' => 'required|numeric',
                    'good_sku.*.inventory' => 'required|integer',
                    'is_show' => 'required|numeric',
                    'is_recommend' => 'nullable|boolean',
                    'is_new' => 'nullable|boolean',
                    'is_hot' => 'nullable|boolean',
                    'timing' => 'nullable|date',
                    'sort' => 'required|integer',
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
            'name.required' =>'商品名称必须',
            'name.string' =>'商品名称格式有误',
            'name.max' =>'商品名称不能超过60个字符',
            'number.required' =>'货号必须',
            'number.string' =>'货号格式有误',
            'number.max' =>'货号不能超过50个字符',
            'freight_id.required' =>'运费模板必须',
            'freight_id.integer' =>'运费模板格式有误',
            'img.required' =>'主图必须',
            'img.url' =>'主图格式有误',
            'img.max' =>'主图不能超过255个字符',
            'market_price.numeric' =>'市场价格式有误',
            'cost_price.numeric' =>'成本价格式有误',
            'price.numeric' =>'销售价格式有误',
            'inventory.integer' =>'库存格式有误',
            'keywords.string' =>'关键字格式有误',
            'keywords.max' =>'关键字不能超过255个字符',
            'short_description.string' =>'短描述格式有误',
            'short_description.max' =>'短描述不能超过160个字符',
            'category_id.required' =>'类目必须',
            'brand_id.integer' =>'品牌格式有误',
            'good_sku.*.img.url' =>'图片格式有误',
            'good_sku.*.market_price.required' =>'未输入市场价',
            'good_sku.*.market_price.numeric' =>'市场价格式有误',
            'good_sku.*.cost_price.required' =>'未输入成本价',
            'good_sku.*.cost_price.numeric' =>'成本价格式有误',
            'good_sku.*.price.required' =>'未输入销售价',
            'good_sku.*.price.numeric' =>'销售价格式有误',
            'good_sku.*.inventory.required' =>'未输入库存',
            'good_sku.*.inventory.numeric' =>'库存格式有误',
            'is_show.required' =>'上架时间必须',
            'is_show.integer' =>'上架时间格式有误',
            'is_recommend.required' =>'是否推荐必须',
            'is_recommend.boolean' =>'是否推荐格式有误',
            'is_new.required' =>'是否新品必须',
            'is_new.boolean' =>'是否新品格式有误',
            'is_hot.required' =>'是否热销必须',
            'is_hot.boolean' =>'是否热销格式有误',
            'sort.required' =>'排序必须',
            'sort.integer' =>'排序格式有误',
        ];
    }
}
