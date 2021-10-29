<?php

namespace App\Http\Requests;

class ProductHistoryListRequest extends Base
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
            'page'       => ['required', 'integer'],
            'limit'      => ['nullable', 'integer']
        ];

        return $rules;
    }
}
