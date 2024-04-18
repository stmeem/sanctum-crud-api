<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

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
        return $this->sendResponse($data, 'Products retrieved successfully');
    }
}
