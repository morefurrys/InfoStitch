<?php

use App\Models\Customer;
use App\Models\Status;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected static bool $isLazy = false;
    protected function getStats(): array
    {
        return [
            Stat::make('CUSTOMERS', Customer::count())
            ->description('Total Customers in Database')
            ->color('primary'),

            Stat::make('PAID', Status::query()
            ->where('status_name','paid')
            ->count())
            ->description('Total Customers paid')
            ->color('success'),

            Stat::make('PENDING', Status::query()
            ->where('status_name','pending')
            ->count())
            ->description('Total Customers Not Paid')
            ->color('danger'),
            
        ];
    }
    
}


