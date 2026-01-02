<?php

namespace App\Filament\Resources\Properties\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PropertyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('price')
                    ->numeric()
                    ->inputMode('decimal'),
                Textarea::make('description')
                    ->rows(5)
                    ->columnSpanFull(),
                Select::make('project_id')
                    ->native(false)
                    ->relationship('project', 'title'),
            ]);
    }
}
