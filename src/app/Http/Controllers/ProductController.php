<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests\ProductCreateRequest;
use App\Services\ProductService;
use App\Transformers\ProductTransformer;

class ProductController extends Controller
{

    /**
     * @var \App\Services\CakeService $service
     */
    private $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function create(ProductCreateRequest $request) {
        $data = $request->validated();
        $cake = $this->service->create($data);
        return response()->json([
            'msg' => "Produto cadastrado com sucesso!",
            'data' => App::make(ProductTransformer::class)->transform($cake)
        ]);
    }

}
