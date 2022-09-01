<?php

namespace App\Filament\Resources\ProductMasterResource\Pages;

use App\Filament\Resources\ProductMasterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProductMaster extends ViewRecord
{
    protected static string $resource = ProductMasterResource::class;

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
