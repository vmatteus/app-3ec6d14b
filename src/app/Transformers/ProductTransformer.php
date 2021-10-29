<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    public function transform($entity)
    {
        return [
            'id'                => $entity->id,
            'name'              => $entity->name,
            'sku'               => $entity->sku,
            'quantity'          => $entity->quantity,
            'created_at'        => $entity->created_at->format('Y-m-d')
        ];
    }

}
