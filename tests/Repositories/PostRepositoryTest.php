<?php

namespace Tests\Repositories;

use App\Models\Post;
use App\Models\User;
use App\Repositories\PostRepository;
use PHPUnit\Framework\TestCase;

class PostRepositoryTest extends TestCase
{

    public function testCreate()
    {
        $postRepository = new PostRepository();
        $attributes = [
            'title' => 'Title',
            'content' => "lorem ipsum ipsum lorem",
            'slug' => 'slug-of-article'
        ];
        $post = $postRepository->create($attributes);
        self::assertInstanceOf(Post::class, $post);
        self::assertEquals(1, $post->read_time);
        self::assertEquals($attributes['title'], $post->title);
        self::assertEquals($attributes['content'], $post->content);
    }
}
