<?php

namespace App\Filament\Resources\Projects\RelationManagers;

use App\Filament\Resources\Properties\PropertyResource;
use Filament\Actions\AssociateAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class PropertiesRelationManager extends RelationManager
{
    protected static string $relationship = 'properties';

    protected static ?string $relatedResource = PropertyResource::class;

    public function isReadOnly(): bool
    {
        return false;
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordActions([
                EditAction::make(),
                DissociateAction::make()
            ])
            ->toolbarActions([
                DissociateBulkAction::make()
            ])
            ->headerActions([
                AssociateAction::make()
                    ->multiple()
                    ->preloadRecordSelect()
                    ->recordTitleAttribute('title')
                    ->associateAnother(false)
            ]);
    }
}
