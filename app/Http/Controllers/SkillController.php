<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Repositories\Interfaces\SkillRepositoryInterface;
use App\Validators\SkillValidator;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\Pure;

class SkillController extends Controller
{

    /**
     * @var SkillRepositoryInterface
     */
    private SkillRepositoryInterface $skillRepository;
    /**
     * @var SkillValidator
     */
    private SkillValidator $skillValidator;

    #[Pure] public function __construct(SkillRepositoryInterface $skillRepository) {
        $this->skillRepository = $skillRepository;
        $this->skillValidator = new SkillValidator;
    }

    /**
     * @param Request $request
     * @return Skill
     */
    public function store(Request $request): Skill {
        $data = $this->skillValidator->validate($request);
        $skill = $this->skillRepository->create($data);
        return $skill;
    }
}
