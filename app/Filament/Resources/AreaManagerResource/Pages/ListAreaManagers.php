<?php

namespace App\Filament\Resources\AreaManagerResource\Pages;

use App\Filament\Resources\AreaManagerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAreaManagers extends ListRecords
{
    protected static string $resource = AreaManagerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
