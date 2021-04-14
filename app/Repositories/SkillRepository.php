<?php


namespace App\Repositories;


use App\Models\Skill;
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
}
