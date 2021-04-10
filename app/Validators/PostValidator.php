<?php


namespace App\Validators;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostValidator
{
    public function validate(Request $request): array {
        return $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'nullable|datetime'
        ]);
    }
}
