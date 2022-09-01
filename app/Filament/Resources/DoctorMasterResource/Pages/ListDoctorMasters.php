<?php

namespace App\Filament\Resources\DoctorMasterResource\Pages;

use App\Filament\Resources\DoctorMasterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDoctorMasters extends ListRecords
{
    protected static string $resource = DoctorMasterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),

            Actions\Action::make('import')
                            ->label('Import')
                            ->url(static::$resource::getUrl('import'))
                            ->color('primary')
                            ->outlined(),

        ];
    }
}
