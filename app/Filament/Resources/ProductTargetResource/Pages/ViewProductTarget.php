<?php

namespace App\Filament\Resources\ProductTargetResource\Pages;

use App\Filament\Resources\ProductTargetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProductTarget extends ViewRecord
{
    protected static string $resource = ProductTargetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
