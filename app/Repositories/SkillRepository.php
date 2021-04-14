<?php


namespace App\Repositories;


use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;
use JetBrains\PhpStorm\Pure;

class SkillRepository
{
    public function create($data): Skill {
        $skill = new Skill($data);
        $skill->save();
        return $skill;
    }

    public function update(array $updateData, mixed $id): Skill
    {
        $skill = Skill::find($id);
        $skill->update($updateData);
        return $skill;
    }

    public function getAll(): Collection {
        $skills = Skill::all();
        return $skills;
    }

    public function delete(int $id): bool {
        return Skill::find($id)->delete();
    }

}
