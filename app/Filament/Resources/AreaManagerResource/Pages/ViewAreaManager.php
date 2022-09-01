<?php

namespace App\Filament\Resources\AreaManagerResource\Pages;

use App\Filament\Resources\AreaManagerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAreaManager extends ViewRecord
{
    protected static string $resource = AreaManagerResource::class;

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
