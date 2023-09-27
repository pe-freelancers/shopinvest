<?php

namespace Tests\Feature;


use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_success(): void
    {
        $param = [
            'email' => "johndoe@example.com",
            'password' => "password"
        ];

        $response = $this->json('POST', route('auth.login'), $param);

        $response
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('access_token')
                     ->where('token_type', 'bearer')
                     ->has('user', fn (AssertableJson $json)=>
                        $json->where('id', 1)->etc())
                     ->etc()
            );
    }

    public function test_login_fail(): void
    {
        $param = [
            'email' => "johndoe@example.com",
            'password' => "password1"
        ];

        $response = $this->json('POST', route('auth.login'), $param);

        $response->assertStatus(401);
    }
}
