<?php

namespace App\Filament\Resources\SalesManagerResource\Pages;

use App\Filament\Resources\SalesManagerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSalesManager extends ViewRecord
{
    protected static string $resource = SalesManagerResource::class;

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
