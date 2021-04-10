<?php

namespace Tests\Http\Controllers;

use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;



class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStore(): void
    {
        $user = User::factory()->create();
        $attributes = [
            'title' => 'Title',
            'content' => "lorem ipsum ipsum lorem",
            'slug' => 'slug-of-article'
        ];

        $response = $this->actingAs($user)->post('/posts', $attributes);

        $response->assertRedirect('/admin/posts');

    }
}
