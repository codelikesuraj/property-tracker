<?php

namespace App\Filament\Resources\Properties\Tables;

use App\Filament\Helpers\Columns;
use App\Filament\Resources\Projects\ProjectResource;
use App\Filament\Resources\Projects\RelationManagers\PropertiesRelationManager;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PropertiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('project.title')
                    ->searchable()
                    ->default('-')
                    ->hiddenOn(PropertiesRelationManager::class)
                    ->url(fn ($record) => $record->project
                        ? ProjectResource::getUrl('view', ['record' => $record->project])
                        : null
                    ),
                TextColumn::make('description')
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
                Columns::createdBy(),
                Columns::createdAtSince(),
                Columns::updatedAtSince(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ]);
    }
}
