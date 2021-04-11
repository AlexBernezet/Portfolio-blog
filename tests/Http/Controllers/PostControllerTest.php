<?php

namespace Tests\Http\Controllers;

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use App\Repositories\PostRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;



class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function testStore(): void
    {
        $attributes = [
            'title' => 'Title',
            'content' => "lorem ipsum ipsum lorem",
            'slug' => 'slug-of-article'
        ];

        $response = $this->actingAs($this->user)->post('/posts', $attributes);
        $response->assertRedirect('/admin/posts');
    }

    public function testUpdate(): void {
        $post = Post::factory()->create();
        $response = $this->actingAs($this->user)->put("/posts/{$post->id}", array(
            "title" => "this is a new title",
            "content" => "new content",
        ));
        $response->assertRedirect("/blog/{$post->slug}");
    }

    public function testDestroy(): void {
        $post = Post::factory()->create();
        $response = $this->actingAs($this->user)->delete("/posts/{$post->id}");
        self::assertCount(0, (new PostRepository)->getAll());
        $response->assertRedirect("/dashboard");
    }
}
