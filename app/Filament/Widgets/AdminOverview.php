<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Clients\ClientResource;
use App\Filament\Resources\Projects\ProjectResource;
use App\Filament\Resources\Properties\PropertyResource;
use App\Models\Client;
use App\Models\Project;
use App\Models\Property;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminOverview extends StatsOverviewWidget
{
    protected ?string $pollingInterval = '60s';

    protected function getStats(): array
    {
        return [
            Stat::make('Projects', Project::count())
                ->url(ProjectResource::getUrl()),
            Stat::make('Properties', Property::count())
                ->url(PropertyResource::getUrl()),
            Stat::make('Clients', Client::count())
                ->url(ClientResource::getUrl()),
        ];
    }
}
