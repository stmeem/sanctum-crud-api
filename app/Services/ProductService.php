<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function getProduct(): Collection
    {
        return Product::all();
    }

    public function storeProduct($requestData)
    {
        $input = $requestData->all();
        return Product::create($input);
    }

    public function showProduct($id)
    {
        return Product::find($id);
    }

    public function updateProduct($requestData, $productID)
    {
        $input = $requestData->all();
        $product = Product::find($productID);
        $product->name = $input['name'];
        $product->detail = $input['detail'];
        $product->save();

        return $product;
    }
}
