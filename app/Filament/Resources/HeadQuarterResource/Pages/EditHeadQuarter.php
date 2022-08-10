<?php

namespace App\Filament\Resources\HeadQuarterResource\Pages;

use App\Filament\Resources\HeadQuarterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeadQuarter extends EditRecord
{
    protected static string $resource = HeadQuarterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
