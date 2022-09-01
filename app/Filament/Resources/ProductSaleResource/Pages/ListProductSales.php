<?php

namespace App\Filament\Resources\ProductSaleResource\Pages;

use App\Filament\Resources\ProductSaleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductSales extends ListRecords
{
    protected static string $resource = ProductSaleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
