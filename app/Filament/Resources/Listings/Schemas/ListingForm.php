<?php

namespace App\Filament\Resources\Listings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Str;

class ListingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->live(debounce: 250),
                TextInput::make('slug')
                    ->disabled(),
                Textarea::make('description')
                    ->required(),
                TextInput::make('address')
                    ->required(),
                TextInput::make('sqft')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('wifi_speed')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('max_person')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('price_per_day')
                    ->required()
                    ->numeric()
                    ->default(0),
                Checkbox::make('full_support_available'),
                Checkbox::make('gym_area_available'),
                Checkbox::make('mini_cafe_available'),
                Checkbox::make('cinema_available'),
                FileUpload::make('attachment')
                    ->directory('listings')
                    ->image()
                    ->openable()
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
            ]);
    }
}
