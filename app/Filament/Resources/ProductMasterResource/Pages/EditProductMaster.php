<?php

namespace App\Filament\Resources\ProductMasterResource\Pages;

use App\Filament\Resources\ProductMasterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductMaster extends EditRecord
{
    protected static string $resource = ProductMasterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
