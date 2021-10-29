<?php

namespace App\Http\Resources;

use App;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\ProductHistoryTransformer;

class ProductHistoryResource extends JsonResource
{

    public function toArray($request)
    {
        return App::make(ProductHistoryTransformer::class)->transform($this);
    }
}
