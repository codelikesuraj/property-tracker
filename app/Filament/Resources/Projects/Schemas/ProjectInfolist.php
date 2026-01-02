<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Filament\Helpers\Entries;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->components([
                        TextEntry::make('title'),
                        TextEntry::make('description')
                            ->placeholder('-')
                            ->columnSpanFull(),
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
