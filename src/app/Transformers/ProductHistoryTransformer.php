<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class ProductHistoryTransformer extends TransformerAbstract
{
    public function transform($entity)
    {
        return [
            'id'             => $entity->id,
            'product_id'     => $entity->product->id,
            'product_name'   => $entity->product->name,
            'type'           => $entity->type,
            'sku'            => $entity->sku,
            'quantity'       => $entity->quantity,
            'created_at'     => $entity->created_at->format('Y-m-d')
        ];
    }

}
