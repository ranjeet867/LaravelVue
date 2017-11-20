<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Client;
use App\User;

class ClientTest extends TestCase
{

    protected $client;
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->client = factory(Client::class)->raw();
    }

    /** @test */
    public function create_new_client()
    {

        $this->actingAs($this->user)
            ->postJson('/api/client', $this->client)
            ->assertSuccessful()
            ->assertJsonStructure(['success', 'message', 'data'])
            ->assertStatus(201);

        $this->assertDatabaseHas('clients', [
            'first_name' => $this->client['first_name'],
            'email' => $this->client['email'],
        ]);

    }
}
