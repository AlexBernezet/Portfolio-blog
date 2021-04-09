<?php


namespace App\Repositories;


use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Log;

class PostRepository implements PostRepositoryInterface
{

    public function create(array $data): Post
    {
        return new Post($data);
    }
}
