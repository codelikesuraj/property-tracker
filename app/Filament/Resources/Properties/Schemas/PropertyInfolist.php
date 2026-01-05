<?php

namespace App\Filament\Resources\Properties\Schemas;

use App\Filament\Helpers\Entries;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PropertyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->components([
                        Grid::make(3)
                            ->components([
                                TextEntry::make('title'),
                                TextEntry::make('price')
                                    ->money('NGN'),
                                TextEntry::make('units')
                            ]),
                        TextEntry::make('description')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('project.title')
                            ->default('-')
                            ->label('Project'),
                        Grid::make(3)
                            ->components([
                                Entries::createdBy(),
                                Entries::createdAtSince(),
                                Entries::updatedAtSince(),
                            ])
                    ])
            ]);
    }
}
