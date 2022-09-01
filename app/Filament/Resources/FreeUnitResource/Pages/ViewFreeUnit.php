<?php

namespace App\Filament\Resources\FreeUnitResource\Pages;

use App\Filament\Resources\FreeUnitResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFreeUnit extends ViewRecord
{
    protected static string $resource = FreeUnitResource::class;

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
