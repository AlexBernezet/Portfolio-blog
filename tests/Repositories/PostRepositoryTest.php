<?php

namespace Tests\Repositories;

use App\Models\Post;
use App\Models\User;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\PostRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostRepositoryTest extends TestCase
{
    use RefreshDatabase;
    protected PostRepositoryInterface $postRepository;

    protected function setUp(): void
    {
        $this->postRepository = new PostRepository();
        parent::setUp();
    }

    public function testCreate(): void
    {

        $attributes = [
            'title' => 'Title',
            'content' => "lorem ipsum ipsum lorem",
            'slug' => 'slug-of-article'
        ];
        $post = $this->postRepository->create($attributes);
        self::assertInstanceOf(Post::class, $post);
        self::assertEquals(1, $post->read_time);
        self::assertEquals($attributes['title'], $post->title);
        self::assertEquals($attributes['content'], $post->content);
    }

    public function testUpdate(): void {
        $post = Post::factory()->create();
        $updateData = ['title' => "new title"];
        $post = $this->postRepository->update($updateData, $post->id);
        self::assertEquals($updateData['title'], $post->title);
    }

    public function testDelete(): void {
        $post = Post::factory()->create();
        $this->postRepository->delete($post->id);
        $posts = $this->postRepository->getAll();
        self::assertCount(0, $posts);
    }
}
