<?php

namespace App\Services;

use Exception;

use App\Models\Product;
use App\Models\History;


class ProductService {

    public function create(array $data)
    {
        $product = new Product;
        $product->name = $data['name'];
        $product->sku = $data['sku'];
        $product->quantity = $data['initial_quantity'];
        $product->save();
        return $product;
    }

    private function saveHistory(Product $product, $type) {
        $history = new History;
        $history->product_id = $product->id;
        $history->quantity = $product->quantity;
        $history->sku = $product->sku;
        $history->type = $type;
        $history->save();
    }

    public function movement(array $data)
    {
        $product = Product::where('id', $data['product_id'])->firstOrFail();

        if ($data['type'] == 'add') {
            $product->quantity = $product->quantity + $data['quantity'];
        } else {
            $product->quantity = $product->quantity - $data['quantity'];
            if ($product->quantity <= 0 ) {
                throw new Exception('Não tem mais quantidade para retirar!');
            }
        }

        $this->saveHistory($product, $data['type']);

        $product->sku = $data['sku'];
        $product->save();
        return $product;
    }

    public function history(array $data) {
        $query = History::query();
        $query->orderBy('updated_at','desc');
        return $query->paginate($data['limit'] ?? 10);
    }

}
