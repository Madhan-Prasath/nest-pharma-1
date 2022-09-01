<?php

namespace App\Filament\Resources\SpecialistResource\Pages;

use App\Filament\Resources\SpecialistResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSpecialist extends ViewRecord
{
    protected static string $resource = SpecialistResource::class;

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
