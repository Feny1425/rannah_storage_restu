<?php

namespace App\Filament\Widgets;

use App\Models\Branch;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total',Branch::count())
            ->description('How many branches we have')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success')
            ->chart([7,3,4,5,6,4,3,6])
        ];
    }
}
