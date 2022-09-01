<?php

namespace App\Filament\Resources\DoctorMasterResource\Pages;

use App\Filament\Resources\DoctorMasterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDoctorMaster extends ViewRecord
{
    protected static string $resource = DoctorMasterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),

            Actions\Action::make('back')
                            ->label('Back')
                            ->url(static::$resource::getUrl('index'))->color('secondary'),
        ];
    }
}
