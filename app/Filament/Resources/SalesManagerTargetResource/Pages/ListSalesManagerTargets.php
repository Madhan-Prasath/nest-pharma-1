<?php

namespace App\Filament\Resources\SalesManagerTargetResource\Pages;

use App\Filament\Resources\SalesManagerTargetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalesManagerTargets extends ListRecords
{
    protected static string $resource = SalesManagerTargetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
