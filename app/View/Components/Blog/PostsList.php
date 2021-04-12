<?php

namespace App\View\Components\Blog;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class PostsList extends Component
{
    private Collection $posts;

    /**
     * Create a new component instance.
     *
     * @param $posts
     */
    public function __construct(Collection $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|string|Closure
    {
        return view('components.blog.posts-list', ["posts" => $this->posts]);
    }
}
