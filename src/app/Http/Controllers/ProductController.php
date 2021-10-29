<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\MovementCreateRequest;
use App\Http\Requests\ProductHistoryListRequest;
use App\Http\Resources\ProductHistoryResource;
use App\Services\ProductService;
use App\Transformers\ProductTransformer;

class ProductController extends Controller
{

    private $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function create(ProductCreateRequest $request) {
        $data = $request->validated();
        $product = $this->service->create($data);
        return response()->json([
            'msg' => "Produto cadastrado com sucesso!",
            'data' => App::make(ProductTransformer::class)->transform($product)
        ]);
    }

    public function movement(MovementCreateRequest $request) {
        $data = $request->validated();
        $product = $this->service->movement($data);
        return response()->json([
            'msg' => "Produto atualizado com sucesso!",
            'data' => App::make(ProductTransformer::class)->transform($product)
        ]);
    }

    public function history(ProductHistoryListRequest $request)
    {
        $data = $request->validated();
        $collection = $this->service->history($data);
        return ProductHistoryResource::collection($collection);
    }


}
