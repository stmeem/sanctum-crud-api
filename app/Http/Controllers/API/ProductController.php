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

    public function store(Request $request)
    {
        $data = $this->productService->storeProduct($request);
        return $this->sendResponse(new ProductResource($data), 'Product added successfully');
    }

    public function show($id)
    {
        $data = $this->productService->showProduct($id);
        if (is_null($data)) {
            return $this->sendError('Product not found');
        }
        return $this->sendResponse(new ProductResource($data), 'Product retrieved successfully');
    }

    public function update(Request $request, $id)
    {
        $data = $this->productService->updateProduct($request, $id);
        return $this->sendResponse(new ProductResource($data), 'Product updated successfully');
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return $this->sendResponse([], 'Product deleted successfully.');
    }

}
