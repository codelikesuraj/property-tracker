<?php

namespace App\Filament\Helpers;

use Filament\Tables\Columns\TextColumn;

class Columns
{
    public static function createdBy(): TextColumn
    {
        return TextColumn::make('createdBy.name')
            ->toggleable(isToggledHiddenByDefault: true);
    }

    public static function since($name): TextColumn
    {
        return TextColumn::make($name)
            ->since()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true);
    }

    public static function createdAtSince(): TextColumn
    {
        return static::since('created_at')
            ->label('Created');
    }

    public static function updatedAtSince(): TextColumn
    {
        return static::since('updated_at')
            ->label('Updated');
    }
}
