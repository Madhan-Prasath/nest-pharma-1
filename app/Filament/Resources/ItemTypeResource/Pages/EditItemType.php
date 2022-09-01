<?php

namespace App\Filament\Resources\ItemTypeResource\Pages;

use App\Filament\Resources\ItemTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItemType extends EditRecord
{
    protected static string $resource = ItemTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
