<?php

namespace App\Filament\Resources\StockistResource\Pages;

use App\Filament\Resources\StockistResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewStockist extends ViewRecord
{
    protected static string $resource = StockistResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
