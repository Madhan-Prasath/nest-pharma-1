<?php

namespace App\Filament\Resources\SalesManagerTargetResource\Pages;

use App\Filament\Resources\SalesManagerTargetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSalesManagerTarget extends EditRecord
{
    protected static string $resource = SalesManagerTargetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
