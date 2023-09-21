<?php

namespace App\Http\Controllers;

use App\Common\StandardErrorCode;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ImageService;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{

    private $productService;
    private $imageService;
    public function __construct(
        ProductService $productService,
        ImageService $imageService
    ) {
        $this->productService = $productService;
        $this->imageService = $imageService;
    }

    /**
     * Create product
     *
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function create(ProductRequest $request): JsonResponse
    {
        $params = [
            'name' => $request->input('name'),
            'price' => (float)$request->input('price'),
            'brand_id' => (int)$request->input('brand_id'),
            'description' => $request->input('description')
        ];

        $product = $this->productService->create($params);

        // Upload file
        if ($request->hasfile('files')) {
            $files = $request->file('files');
            $product->images = $this->imageService->create($product->id, $files);
        }

        return $this->returnSuccess($product);
    }

    /**
     * Update product
     *
     * @param ProductRequest $request
     * @param integer $id - product_id
     * @return JsonResponse
     */
    public function update(ProductRequest $request, int $id): JsonResponse
    {
        $params = [
            'name' => $request->input('name'),
            'price' => (float)$request->input('price'),
            'brand_id' => (int)$request->input('brand_id'),
            'description' => $request->input('description')
        ];

        $product = $this->productService->update($id, $params);

        if ($request->hasfile('files')) {
            $files = $request->file('files');
            $product->images = $this->imageService->create($product->id, $files);
        }

        return $this->returnSuccess($product);
    }

    /**
     * Delete Product
     *
     * @param integer $id - product_id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->productService->delete($id);

        return $this->returnSuccess();
    }

    /**
     * Get product
     *
     * @param integer $id - product_id
     * @return JsonResponse
     */
    public function get(int $id): JsonResponse
    {
        $product = Product::find($id);

        if (!$product) {
            return $this->returnError(StandardErrorCode::NOT_FOUND, 'Product not found.');
        }

        $product->brand;
        $product->images;

        return $this->returnSuccess($product);
    }
}
