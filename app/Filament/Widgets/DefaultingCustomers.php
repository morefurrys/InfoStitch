<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\StatusResource;
use Filament\Widgets\TableWidget as BaseWidget;

class DefaultingCustomers extends BaseWidget
{
    //protected int | string | array $columnSpan = "full";
    protected static bool $isLazy = false;
    protected static ?int $sort = 4;

    public function table(Table $table): Table
    {
        return $table
            ->query(StatusResource::getEloquentQuery()->where('status_name','pending'))
            ->defaultPaginationPageOption(5)
            ->columns([
                TextColumn::make('Customer.name')
                ->label('customer Name'),
                    
                TextColumn::make('balance')
                ->label('Balance')
                //->numeric()
                ->money('KSH'),
                    
                TextColumn::make('due_date')
                ->label('Due Date')
                ->date(),

                TextColumn::make('status_name')
                ->label('Status')
                ->color('danger')
                ->badge()
            ]);
    }
}
