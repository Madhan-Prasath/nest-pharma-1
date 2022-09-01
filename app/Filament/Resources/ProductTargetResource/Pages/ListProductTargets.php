<?php

namespace App\Filament\Resources\ProductTargetResource\Pages;

use App\Filament\Resources\ProductTargetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductTargets extends ListRecords
{
    protected static string $resource = ProductTargetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
