<?php

namespace App\View\Components;

use Closure;
use Firefly\FilamentBlog\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecentBlogs extends Component
{
    public $posts;

    public function __construct($count = 5)
    {
        $this->posts = Post::query()
            ->published()
            ->latest()
            ->take($count)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.recent-blogs');
    }
}
