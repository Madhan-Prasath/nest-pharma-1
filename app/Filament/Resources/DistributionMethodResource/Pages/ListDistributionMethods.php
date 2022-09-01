<?php

namespace App\Filament\Resources\DistributionMethodResource\Pages;

use App\Filament\Resources\DistributionMethodResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDistributionMethods extends ListRecords
{
    protected static string $resource = DistributionMethodResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
