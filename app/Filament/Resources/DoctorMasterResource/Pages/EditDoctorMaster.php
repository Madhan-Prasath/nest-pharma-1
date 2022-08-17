<?php

namespace App\Filament\Resources\DoctorMasterResource\Pages;

use App\Filament\Resources\DoctorMasterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDoctorMaster extends EditRecord
{
    protected static string $resource = DoctorMasterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
