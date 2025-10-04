<?php

namespace App\View\Components;

use Closure;
use Firefly\FilamentBlog\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecentBlogs extends Component
{
    public $posts;
    public $sectTitle;

    public function __construct($count = 5, $title = 'Son Eklenenler')
    {
        $this->posts = Post::query()
            ->published()
            ->latest()
            ->take($count)
            ->get();

        $this->sectTitle = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.recent-blogs');
    }
}
