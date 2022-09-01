<?php

namespace App\Filament\Resources\PatchResource\Pages;

use App\Filament\Resources\PatchResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPatch extends EditRecord
{
    protected static string $resource = PatchResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
