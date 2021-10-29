<?php

namespace App\Http\Requests;

class ProductCreateRequest extends Base
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

        $rules = [
            'name'              => ['required', 'string'],
            'sku'               => ['required', 'string'],
            'initial_quantity'  => ['required', 'integer'],
        ];

        return $rules;
    }
}
