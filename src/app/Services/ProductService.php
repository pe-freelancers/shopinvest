<?php

namespace App\Services;

use App\Exceptions\BrandException;
use App\Models\Brand;
use App\Models\Product;


class ProductService
{
    public function create(array $params)
    {
        $brand_id = (int)$params['brand_id'];
        $this->checkExistBrand($brand_id);

        return Product::create($params);
    }

    public function update(int $id, array $params)
    {
        $brand_id = (int)$params['brand_id'];

        $this->checkExistBrand($brand_id);

        $product = Product::where('id', $id)->first();
        $product->update($params);
        $product->refresh();

        return $product;
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return false;
        }

        $product->delete();

        return true;
    }

    private function checkExistBrand(int $brand_id)
    {
        if ($brand_id) {
            $brand = Brand::find($brand_id);
            if (!$brand) {
                throw new BrandException();
            }
        }
    }
}
