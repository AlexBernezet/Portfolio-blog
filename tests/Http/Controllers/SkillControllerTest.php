<?php

namespace Tests\Http\Controllers;

use App\Http\Controllers\SkillController;
use App\Models\User;
use App\Repositories\SkillRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class SkillControllerTest extends TestCase
{
    use RefreshDatabase;
    protected User $user;
    protected SkillController $skillController;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $repository = new SkillRepository();
        $this->skillController = new SkillController($repository);
    }

    public function testIndex(): void
    {

    }

    public function testDestroy(): void
    {

    }

    public function testUpdate(): void
    {

    }

    public function testStore(): void
    {
        $attributes = [
            'name' => 'Laravel',
            'position' => 1,
            'is_bold' => true,
            'type' => 'backend'
        ];

        $response = $this->actingAs($this->user)->post('/skills', $attributes);
        $response->dumpSession();
//        $this->assertDatabaseHas('skills', ['name' => $attributes['name']]);
//        $response->assertRedirect('/admin/skills');
    }
}
