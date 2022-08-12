<?php

namespace App\Filament\Resources\StockistResource\Pages;

use App\Filament\Resources\StockistResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStockist extends EditRecord
{
    protected static string $resource = StockistResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
