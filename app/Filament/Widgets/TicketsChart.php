<?php

namespace App\Filament\Widgets;

use App\Models\Ticket;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class TicketsChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    public ?string $filter = 'week';

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        switch ($activeFilter) {
            case 'month':
                $start = now()->startOfMonth();
                $end = now()->endOfMonth();
                $perTimeFrame = 'perWeek';
                break;
            case '':
                $start = now()->startOfYear();
                $end = now()->endOfYear();
                $perTimeFrame = 'perMonth';
                break;
            default:
                $start = now()->startOfWeek();
                $end = now()->endOfWeek();
                $perTimeFrame = 'perDay';
                break;
        }

        $data = Trend::model(Ticket::class)
            ->between(
                start: $start,
                end: $end,
            )
            ->$perTimeFrame()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Tickets created',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getFilters(): ?array
    {
        return [
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
}
