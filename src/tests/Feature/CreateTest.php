<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_success(): void
    {
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatars.jpg');

        $param = [
            'name' => 'Product_Test_1',
            'files[]' => $file,
            'price' => 15.2,
            'brand_id' => '2'
        ];

        $response = $this->actingAsJWT()->json('POST', route('product.create'), $param);

        $response->assertStatus(200);

        $response
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('success', 1)
                     ->has('data', fn (AssertableJson $json)=>
                        $json->where('name', 'Product_Test_1')->etc())
                     ->etc()
            );
    }

    public function test_create_fail(): void
    {
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatars.jpg');

        $param = [
            'name' => '',
            'files[]' => $file,
            'price' => 15.2,
            'brand_id' => '2'
        ];

        $response = $this->actingAsJWT()->json('POST', route('product.create'), $param);

        $response->assertStatus(422);
    }
}
