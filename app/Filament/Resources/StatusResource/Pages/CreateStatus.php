<?php

namespace App\Filament\Resources\StatusResource\Pages;

use App\Filament\Resources\StatusResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStatus extends CreateRecord
{
    protected static string $resource = StatusResource::class;
    protected function getRedirectUrl(): string
    {
        // Redirect to the list page after creating
        return StatusResource::getUrl('index');
    }
}
