<?php

namespace App\Services;

use App\Models\Image;

class ImageService
{
    public function create(int $product_id, array $files)
    {
        $path = public_path('uploads');
        $images = [];

        foreach ($files as $file) {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            // Save file to local
            $file->move($path, $fileName);

            $image = [
                'url' => $path . '\\' . $fileName,
                'file_name' => $fileName,
                'file_original_name' => $file->getClientOriginalName(),
                'product_id' => $product_id
            ];
            array_push($images, Image::create($image));
        }

        return $images;
    }

    public function update(int $id, array $params)
    {
        $calling = Image::where('id', $id)->first();
        $calling->update($params);
        $calling->refresh();

        return $calling;
    }

    public function delete($id)
    {
        $image = Image::find($id);
        if (!$image) {
            return false;
        }

        $image->delete();

        return true;
    }
}
