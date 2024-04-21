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
}
