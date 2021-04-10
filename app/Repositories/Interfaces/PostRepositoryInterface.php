<?php


namespace App\Repositories\Interfaces;


use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
{
    public function create(array $data): Post;
    public function update(array $data, int $id): Post;
    public function getAll(): Collection;
    public function findBySlug(string $slug): Post;
    public function findById(int $id): Post;
}
