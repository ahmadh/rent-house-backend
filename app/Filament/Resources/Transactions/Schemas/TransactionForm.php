<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('listing_id')
                    ->relationship('listing', 'title')
                    ->required(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->required(),
                TextInput::make('price_per_day')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('total_days')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('fee')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('total_price')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->prefix('$'),
                Select::make('status')
                    ->options(['waiting' => 'Waiting', 'approved' => 'Approved', 'canceled' => 'Canceled'])
                    ->default('waiting')
                    ->required(),
            ]);
    }
}
