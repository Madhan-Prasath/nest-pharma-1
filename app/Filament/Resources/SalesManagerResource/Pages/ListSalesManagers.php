<?php

namespace App\Filament\Resources\SalesManagerResource\Pages;

use App\Filament\Resources\SalesManagerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalesManagers extends ListRecords
{
    protected static string $resource = SalesManagerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
