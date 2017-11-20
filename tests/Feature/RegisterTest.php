<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegisterTest extends TestCase
{

    /** @test */
    public function can_register()
    {
        $this->postJson('/api/register', [
            'name' => 'Ranjeet Singh',
            'email' => 'ranjeet@artbees.net',
            'password' => '123456',
            'password_confirmation' => '123456',
        ])
        ->assertSuccessful()
        ->assertJsonStructure(['id', 'name', 'email']);
    }
}
