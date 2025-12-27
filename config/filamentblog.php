<?php

/**
 * |--------------------------------------------------------------------------
 * | Set up your blog configuration
 * |--------------------------------------------------------------------------
 * |
 * | The route configuration is for setting up the route prefix and middleware.
 * | The user configuration is for setting up the user model and columns.
 * | The seo configuration is for setting up the default meta tags for the blog.
 * | The recaptcha configuration is for setting up the recaptcha for the blog.
 */

use Firefly\FilamentBlog\Models\User;

return [
    'tables' => [
        'prefix' => 'fblog_', // prefix for all blog tables
    ],
    'route' => [
        'prefix' => '/blog',
        'middleware' => ['web'],
        //        'home' => [
        //            'name' => 'filamentblog.home',
        //            'url' => env('APP_URL'),
        //        ],
        'login' => [
            'name' => 'filamentblog.post.login',
        ],
    ],
    'user' => [
        'model' => User::class,
        'foreign_key' => 'user_id',
        'columns' => [
            'name' => 'name',
            'avatar' => 'profile_photo_path',
        ],
    ],
    'seo' => [
        'meta' => match (request()?->getHost()) {
            'blog.berlindeyiz.de' => [
                'title' => 'Berlin Rehberi | Berlindeyiz',
                'description' => 'Berlin\'de yaşam, Türk etkinlikleri, konserler, çocuk etkinlikleri ve şehir rehberi.',
                'keywords' => ['Berlin', 'Berlin Etkinlik', 'Berlin Türkler', 'Berlin Konserleri 2026'],
            ],
            default => [
                'title' => 'Faydalı İçerikler | Almanyadayız',
                'description' => 'Almanya genelinde yaşayan Türkler için güncel içerikler ve rehber yazılar.',
                'keywords' => ['Almanya', 'Türkçe Rehber', 'Almanya Etkinlik', 'Gurbetçi Rehberi'],
            ],
        },
    ],
    'recaptcha' => [
        'enabled' => false, // true or false
        'site_key' => env('RECAPTCHA_SITE_KEY'),
        'secret_key' => env('RECAPTCHA_SECRET_KEY'),
    ],
];
