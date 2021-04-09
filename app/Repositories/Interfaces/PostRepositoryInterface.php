<?php


namespace App\Repositories\Interfaces;


use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
{
    public function create(array $data): Post;
}
