<?php

namespace App\Filament\Resources\ItemTypeResource\Pages;

use App\Filament\Resources\ItemTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListItemTypes extends ListRecords
{
    protected static string $resource = ItemTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
