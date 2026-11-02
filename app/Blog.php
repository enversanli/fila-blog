<?php

namespace App;

use Filament\Panel;
use Firefly\FilamentBlog\Blog as BaseBlog;

class Blog extends BaseBlog
{
    public function register(Panel $panel): void
    {
        $panel->resources([
            \Firefly\FilamentBlog\Resources\CategoryResource::class,
            // PostResource is provided by App\Filament\Resources\PostResource via discoverResources
            \Firefly\FilamentBlog\Resources\TagResource::class,
            \Firefly\FilamentBlog\Resources\SeoDetailResource::class,
            \Firefly\FilamentBlog\Resources\NewsletterResource::class,
            \Firefly\FilamentBlog\Resources\CommentResource::class,
            \Firefly\FilamentBlog\Resources\ShareSnippetResource::class,
            \Firefly\FilamentBlog\Resources\SettingResource::class,
        ]);
    }
}
