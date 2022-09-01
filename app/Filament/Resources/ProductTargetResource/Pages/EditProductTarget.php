<?php

namespace App\Filament\Resources\ProductTargetResource\Pages;

use App\Filament\Resources\ProductTargetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductTarget extends EditRecord
{
    protected static string $resource = ProductTargetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
