<?php

namespace App\Filament\Resources\Clients\RelationManagers;

use App\Filament\Resources\Properties\PropertyResource;
use Filament\Actions\AttachAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Forms\Components\TextInput;
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
            ->allowDuplicates(false)
            ->recordActions([
                DetachAction::make(),
            ])
            ->toolbarActions([
                DetachBulkAction::make()
            ])
            ->headerActions([
                AttachAction::make()
                    ->preloadRecordSelect()
                    ->recordTitle(function ($record): string {
                        $title = '';

                        if (filled($project = $record?->project)) {
                            $title .= $project->title;
                        }

                        $title .= " - " . $record->title;

                        if (filled($price = $record?->price)) {
                            $title .= sprintf(" @ %s NGN per unit",  number_format($price));
                        }

                        return $title;
                    })
//                    ->schema(function (AttachAction $action): array {
//                        return [
//                            $action->getRecordSelect(),
//                            TextInput::make('quantity')
//                                ->label('Number of units')
//                                ->default(1)
//                                ->numeric()
//                                ->minValue(1)
//                                ->required()
//                        ];
//                    })
            ]);
    }
}
