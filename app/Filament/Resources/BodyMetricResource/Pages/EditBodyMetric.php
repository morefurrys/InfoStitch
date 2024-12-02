<?php

namespace App\Filament\Resources\BodyMetricResource\Pages;

use App\Filament\Resources\BodyMetricResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBodyMetric extends EditRecord
{
    protected static string $resource = BodyMetricResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
