<?php

namespace Tests\Repositories;

use App\Models\Skill;
use App\Repositories\Interfaces\SkillRepositoryInterface;
use App\Repositories\SkillRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SkillRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /**
     * @var SkillRepository
     */
    private SkillRepository $skillRepository;

    protected function setUp(): void
    {
        $this->skillRepository = new SkillRepository();
        parent::setUp();
    }

    public function testCreate(): void
    {
        $attributes = [
            'name' => 'PHP',
            'position' => '1',
            'is_bold' => true,
            'type' => 'backend'
        ];

        $skill = $this->skillRepository->create($attributes);
        self::assertEquals($attributes['name'], $skill->name);
        self::assertEquals($attributes['type'], $skill->type);
        $this->assertDatabaseCount('skills', 1);

    }
}
