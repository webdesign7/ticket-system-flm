<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Category;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Agents', User::wherehas('roles', function ($query) {
                $query->where('name', 'agent');
            })->count()),
            Stat::make('Tickets', Ticket::count()),
            Stat::make('Categories', Category::where('is_active', true)->count()),
        ];
    }
}
