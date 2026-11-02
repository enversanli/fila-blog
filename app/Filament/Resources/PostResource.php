<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms\Form;
use Filament\Resources\Pages\Page;

class PostResource extends \Firefly\FilamentBlog\Resources\PostResource
{
    protected static ?string $model = Post::class;

    public static function form(Form $form): Form
    {
        return $form->schema(Post::getForm());
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\ViewPost::class,
            Pages\ManaePostSeoDetail::class,
            Pages\ManagePostComments::class,
            Pages\EditPost::class,
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index'     => Pages\ListPosts::route('/'),
            'create'    => Pages\CreatePost::route('/create'),
            'edit'      => Pages\EditPost::route('/{record}/edit'),
            'view'      => Pages\ViewPost::route('/{record}'),
            'comments'  => Pages\ManagePostComments::route('/{record}/comments'),
            'seoDetail' => Pages\ManaePostSeoDetail::route('/{record}/seo-details'),
        ];
    }
}
