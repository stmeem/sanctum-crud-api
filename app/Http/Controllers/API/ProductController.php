<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponse;

    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): JsonResponse
    {
        $data = $this->productService->getProduct();
        return $this->sendResponse(new ProductResource($data), 'Products retrieved successfully');
    }

    public function store(Request $request){
        $data = $this->productService->storeProduct($request);
        return $this->sendResponse(new ProductResource($data), 'Product added successfully');
    }

}
