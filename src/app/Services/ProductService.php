<?php

namespace App\Services;

use App\Models\Product;

class ProductService {

    public function create(array $data)
    {
        $cake = new Product;
        $cake->name = $data['name'];
        $cake->sku = $data['sku'];
        $cake->initial_quantity = $data['initial_quantity'];
        $cake->save();
        return $cake;
    }

}
