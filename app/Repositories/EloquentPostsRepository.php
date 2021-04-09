<?php


namespace App\Repositories;


use App\Models\Post;
use App\Repositories\Interfaces\PostsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\Request;

class PostsRepository implements PostsRepositoryInterface
{

    public function getAll(): Collection
    {
        return Post::all();
    }

    public function getById(int $id): Post
    {
        // TODO: Implement getById() method.
    }

    public function update(int $id): Post
    {
        // TODO: Implement update() method.
    }

    public function create(Request $request): Post
    {
        // TODO: Implement create() method.
    }
}
