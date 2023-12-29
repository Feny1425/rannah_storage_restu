<?php

namespace App\Filament\Widgets;

use App\Models\Branch;
use App\Models\Item;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = "15s";

    protected function getStats(): array
    {
        return [
            Stat::make(__('Items'),Item::count())
            ->description(__('How many Items we have registered.'))
            ->color('success')
        ];
    }
}
