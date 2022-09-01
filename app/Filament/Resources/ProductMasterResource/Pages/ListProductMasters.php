<?php

namespace App\Filament\Resources\ProductMasterResource\Pages;

use App\Filament\Resources\ProductMasterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductMasters extends ListRecords
{
    protected static string $resource = ProductMasterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),

            Actions\Action::make('import')
                          ->label('Import')
                          ->url(static::$resource::getUrl('import'))
                          ->color('primary')
                          ->outlined(),
        ];
    }
}
