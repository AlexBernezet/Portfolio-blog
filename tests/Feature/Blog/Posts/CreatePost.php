<?php

namespace Tests\Feature\Blog\Posts;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreatePost extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_can_create_a_post(): void
    {
        $user = User::factory()->create();
        $attributes = [
            'title' => 'Title',
            'content' => "lorem ipsum ipsum lorem",
        ];
        $response = $this->actingAs($user)->post('/posts', $attributes);

        $response->assertStatus(200);
    }
}
