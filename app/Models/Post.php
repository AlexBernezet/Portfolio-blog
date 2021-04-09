<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\Pure;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'content', 'slug', 'published_at', 'read_time'
    ];

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
        $attributes['read_time'] = $this->calculateReadTime($attributes['content']);

        if(!array_key_exists('slug', $attributes)){
            $attributes['slug'] = $this->generateSlug($attributes["title"]);
        }
        parent::__construct($attributes);
    }

    #[Pure] private function calculateReadTime($content): int
    {
        $words = explode(' ', htmlspecialchars($content));
        $wordsCount = count($words);
        $wordsReadPerMinute = 238;

//        return estimated time of read in seconds
        return round(($wordsCount / $wordsReadPerMinute) * 60, 0);
    }

    private function generateSlug(string $title): string
    {
        // Replaces spaces with hyphens.
        $temp_string = str_replace(' ', '-', $title);
        // return a slug
        return preg_replace('/[^A-Za-z0-9\-]/', '', $temp_string);
    }

}
