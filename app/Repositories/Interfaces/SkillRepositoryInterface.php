<?php
namespace App\Repositories\Interfaces;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;

interface SkillRepositoryInterface {
    public function create($data): Skill;

    public function update(array $updateData, mixed $id): Skill;

    public function getAll(): Collection;

    public function delete(int $id): bool;

}
