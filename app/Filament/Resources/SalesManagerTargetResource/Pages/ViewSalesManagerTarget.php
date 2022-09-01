<?php

namespace App\Filament\Resources\SalesManagerTargetResource\Pages;

use App\Filament\Resources\SalesManagerTargetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSalesManagerTarget extends ViewRecord
{
    protected static string $resource = SalesManagerTargetResource::class;

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
