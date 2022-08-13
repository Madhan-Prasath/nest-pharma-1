<?php

namespace App\Filament\Resources\PatchResource\Pages;

use App\Filament\Resources\PatchResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPatches extends ListRecords
{
    protected static string $resource = PatchResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
