<?php

namespace App\Filament\Resources\SpecialistResource\Pages;

use App\Filament\Resources\SpecialistResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpecialist extends EditRecord
{
    protected static string $resource = SpecialistResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
