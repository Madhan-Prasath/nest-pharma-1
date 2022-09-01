<?php

namespace App\Filament\Resources\DistributionMethodResource\Pages;

use App\Filament\Resources\DistributionMethodResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDistributionMethod extends EditRecord
{
    protected static string $resource = DistributionMethodResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
