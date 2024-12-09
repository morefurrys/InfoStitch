<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class TotalCustomers extends ChartWidget
{
    protected static ?int $sort = 2;
    protected static bool $isLazy = false;
    protected static ?string $heading = 'Total Customers Chart';

    protected function getData(): array
    {
        $data = Trend::model(Customer::class)
            ->between(
                now()->startOfYear(),
                now()->endOfYear(),
            )
            ->perMonth()
            ->count();
     
        return [
            'datasets' => [
                [
                    'label' => 'Customers',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
