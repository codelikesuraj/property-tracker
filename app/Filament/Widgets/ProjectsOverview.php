<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Projects\ProjectResource;
use App\Filament\Resources\Properties\PropertyResource;
use App\Models\Project;
use App\Models\Property;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProjectsOverview extends StatsOverviewWidget
{
    protected ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            Stat::make('Projects', Project::count())
                ->url(ProjectResource::getUrl()),
            Stat::make('Properties', Property::count())
                ->url(PropertyResource::getUrl()),
        ];
    }
}
