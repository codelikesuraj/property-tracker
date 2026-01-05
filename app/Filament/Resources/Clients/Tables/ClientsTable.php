<?php

namespace App\Filament\Resources\Clients\Tables;

use App\Filament\Helpers\Columns;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ClientsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('phone'),
                TextColumn::make('address')
                    ->default('-')
                    ->limit(50 )
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();

                        if (strlen($state) <= $column->getCharacterLimit()) {
                            return null;
                        }

                        // Only render the tooltip if the column contents exceeds the length limit.
                        return $state;
                    }),
                TextColumn::make('properties_count')
                    ->label('Properties')
                    ->counts('properties')
                    ->default(0),
                Columns::createdAtSince(),
                Columns::updatedAtSince(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
                    ->slideOver(),
            ]);
    }
}
