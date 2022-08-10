<?php

namespace App\Filament\Resources\HeadQuarterResource\Pages;

use App\Filament\Resources\HeadQuarterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeadQuarters extends ListRecords
{
    protected static string $resource = HeadQuarterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
