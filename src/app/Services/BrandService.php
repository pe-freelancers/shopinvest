<?php

namespace App\Services;
use App\Models\Brand;


class BrandService
{
    public function create(array $params)
    {
        Brand::create($params);
    }

    public function update(int $id, array $params)
    {
        $calling = Brand::where('id', $id)->first();
        $calling->update($params);
        $calling->refresh();

        return $calling;
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return false;
        }

        $brand->delete();

        return true;
    }
}
