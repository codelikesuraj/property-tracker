<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email'),
                TextInput::make('phone'),
                TextInput::make('occupation'),
                Textarea::make('address')
                    ->columnSpanFull()
                    ->rows(5),
            ]);
    }
}
