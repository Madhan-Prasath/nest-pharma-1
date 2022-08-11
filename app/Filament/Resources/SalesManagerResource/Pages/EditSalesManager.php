<?php

namespace App\Filament\Resources\SalesManagerResource\Pages;

use App\Filament\Resources\SalesManagerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSalesManager extends EditRecord
{
    protected static string $resource = SalesManagerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
