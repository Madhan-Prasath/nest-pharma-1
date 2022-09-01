<?php

namespace App\Filament\Resources\FreeUnitResource\Pages;

use App\Filament\Resources\FreeUnitResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFreeUnit extends EditRecord
{
    protected static string $resource = FreeUnitResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
