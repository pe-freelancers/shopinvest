<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_delete_success(): void
    {
        $product = Product::factory()->create();
        $response = $this->actingAsJWT()->json('DELETE', route('product.delete', ['id' => $product->getAttribute('id')]));
        $response->assertStatus(200);

        $response
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('success', 1)
                     ->etc()
            );
    }
}
