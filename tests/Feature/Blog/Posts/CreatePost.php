<?php

namespace Tests\Feature\Blog\Posts;

use App\Models\Post;
use App\Models\User;
use App\Repositories\PostRepository;
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
        $postRepository = new PostRepository();

        $user = User::factory()->create();
        $attributes = [
            'title' => 'Title',
            'content' => "lorem ipsum ipsum lorem",
            'slug' => 'slug-of-article'
        ];

        // Testing repository
        $post = $postRepository->create($attributes);

        self::assertInstanceOf(Post::class, $post);
        self::assertEquals(1, $post->read_time);

        // Controller testing
        $response = $this->actingAs($user)->post('/posts', $attributes);

        $response->assertRedirect('/admin/posts');
    }
}
