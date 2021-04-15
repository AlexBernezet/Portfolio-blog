<?php
namespace App\Validators;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillValidator {
    public function validate(Request $request): array {
        return $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|integer',
            'is_bold' => 'required|boolean',
            'type' => 'string|required'
        ]);
    }
}
