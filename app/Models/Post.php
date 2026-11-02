<?php

namespace App\Models;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;

class Post extends \Firefly\FilamentBlog\Models\Post
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->fillable = array_merge($this->fillable, ['redirect_platform', 'redirect_url']);
    }

    public static function getForm(): array
    {
        $form = parent::getForm();

        $form[] = Section::make('Redirect')
            ->schema([
                Select::make('redirect_platform')
                    ->label('Platform')
                    ->options(function () {
                        return collect(config('filamentblog.redirect_platforms', []))
                            ->mapWithKeys(fn ($p, $key) => [$key => $p['label']]);
                    })
                    ->placeholder('No redirect')
                    ->nullable()
                    ->live()
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        if ($state) {
                            $platforms = config('filamentblog.redirect_platforms', []);
                            $set('redirect_url', $platforms[$state]['base_url'] ?? 'https://'.$state);
                        } else {
                            $set('redirect_url', null);
                        }
                    }),

                TextInput::make('redirect_url')
                    ->label('Redirect URL')
                    ->url()
                    ->nullable()
                    ->placeholder('https://')
                    ->visible(fn (Get $get) => filled($get('redirect_platform')))
                    ->columnSpanFull(),
            ]);

        return $form;
    }
}
