<?php

namespace App\Http\Requests;

class MovementCreateRequest extends Base
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
            'product_id' => ['required', 'exists:products,id'],
            'quantity'   => ['required', 'integer'],
            'sku'        => ['required', 'string'],
            'type'       => ['required', 'in:add,remove'],
        ];

        return $rules;
    }
}
