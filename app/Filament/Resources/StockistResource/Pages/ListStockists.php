<?php

namespace App\Filament\Resources\StockistResource\Pages;

use App\Filament\Resources\StockistResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStockists extends ListRecords
{
    protected static string $resource = StockistResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
