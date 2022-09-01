<?php

namespace App\Filament\Resources\ItemTypeResource\Pages;

use App\Filament\Resources\ItemTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewItemType extends ViewRecord
{
    protected static string $resource = ItemTypeResource::class;

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
