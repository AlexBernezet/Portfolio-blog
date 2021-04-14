<?php

namespace App\Models;

use App\Services\PostService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use JetBrains\PhpStorm\Pure;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected bool $softDelete = true;

    protected $fillable = [
        'title', 'content', 'slug', 'published_at', 'read_time'
    ];

    public function __construct(array $attributes = [])
    {
        if(!empty($attributes)) {
            $this->attributes = $attributes;
            $attributes['read_time'] = PostService::calculateReadTime($attributes['content']);

            if(!array_key_exists('slug', $attributes)){
                $attributes['slug'] = PostService::generateSlug($attributes["title"]);
            }
        }
        parent::__construct($attributes);
    }
}
