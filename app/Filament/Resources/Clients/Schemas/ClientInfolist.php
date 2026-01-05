<?php

namespace App\Filament\Resources\Clients\Schemas;

use App\Filament\Helpers\Entries;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ClientInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->columns()
                    ->components([
                        TextEntry::make('name'),
                        TextEntry::make('email')
                            ->default('-'),
                        TextEntry::make('phone')
                            ->default('-'),
                        TextEntry::make('occupation')
                            ->default('-'),
                        TextEntry::make('address')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        Entries::createdAtSince(),
                        Entries::updatedAtSince(),
                    ])
            ]);
    }
}
