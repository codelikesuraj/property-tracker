<?php

namespace App\Filament\Helpers;

use Filament\Infolists\Components\TextEntry;

class Entries
{
    public static function createdBy(): TextEntry
    {
        return TextEntry::make('createdBy.name')
            ->label('Created by');
    }

    public static function createdAtSince(): TextEntry
    {
        return TextEntry::make('created_at')
            ->label('Created')
            ->since();
    }

    public static function updatedAtSince(): TextEntry
    {
        return TextEntry::make('updated_at')
            ->label('Updated')
            ->since();
    }
}
