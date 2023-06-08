<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->post('/api/v1/auth/register', [
            'name' => 'John Doe',
            'email' => 'aaa@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(201);

        //在資料庫中是否有此筆資料
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'aaa@example.com',
        ]);
    }
}
