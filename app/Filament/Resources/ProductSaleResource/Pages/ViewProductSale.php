<?php

namespace App\Filament\Resources\ProductSaleResource\Pages;

use App\Filament\Resources\ProductSaleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProductSale extends ViewRecord
{
    protected static string $resource = ProductSaleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),

            Actions\Action::make('back')
                            ->label('Back')
                            ->url(static::$resource::getUrl('index'))->color('secondary'),

        ];
    }
}
