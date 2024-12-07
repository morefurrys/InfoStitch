<?php

namespace App\Filament\Resources\BodyMetricResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\CustomerResource;
use App\Filament\Resources\BodyMetricResource;

class EditBodyMetric extends EditRecord
{
    protected static string $resource = BodyMetricResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\DeleteAction::make(),
    //     ];
    // }

    protected function getRedirectUrl(): string
    {
        // Redirect to the list page after editing
        return BodyMetricResource::getUrl('index');
    }
}
