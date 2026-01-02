<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('title')
                    ->required()
                    ->unique(),
                Textarea::make('description')
                    ->rows(5),
            ]);
    }
}
