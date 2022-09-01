<?php

namespace App\Filament\Resources\SpecialistResource\Pages;

use App\Filament\Resources\SpecialistResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpecialists extends ListRecords
{
    protected static string $resource = SpecialistResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
