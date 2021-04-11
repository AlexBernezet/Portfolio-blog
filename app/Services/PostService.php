<?php


namespace App\Services;


use JetBrains\PhpStorm\Pure;

class PostService
{
    #[Pure] public static function calculateReadTime($content): int
    {
        $words = explode(' ', htmlspecialchars($content));
        $wordsCount = count($words);
        $wordsReadPerMinute = 238;
        return round(($wordsCount / $wordsReadPerMinute) * 60, 0);
    }

    public static function generateSlug(string $title): string
    {
        // Replaces spaces with hyphens.
        $temp_string = str_replace(' ', '-', $title);
        // return a slug
        return preg_replace('/[^A-Za-z0-9\-]/', '', $temp_string);
    }
}
