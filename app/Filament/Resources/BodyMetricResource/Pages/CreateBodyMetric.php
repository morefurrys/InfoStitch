<?php

namespace App\Filament\Resources\BodyMetricResource\Pages;

use App\Filament\Resources\BodyMetricResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBodyMetric extends CreateRecord
{
    protected static string $resource = BodyMetricResource::class;
    protected function getRedirectUrl(): string
    {
        // Redirect to the list page after creating
        return BodyMetricResource::getUrl('index');
    }
}
