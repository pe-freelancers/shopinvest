<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GetTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_success(): void
    {
        $product = Product::factory()->create();
        $response = $this->actingAsJWT()->json('GET', route('product.get',['id' => $product->getAttribute('id')]));
        $response->assertStatus(200);

        $response
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('success', 1)
                     ->has('data', fn (AssertableJson $json)=>
                        $json->where('name', $product->getAttribute('name'))->etc())
                     ->etc()
            );
    }

    public function test_create_fail(): void
    {
        $response = $this->actingAsJWT()->json('GET', route('product.get', ['id' => 1]));

        $response->assertStatus(400);
    }
}
