<?php

namespace App\Filament\Resources\HeadQuarterResource\Pages;

use App\Filament\Resources\HeadQuarterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHeadQuarter extends ViewRecord
{
    protected static string $resource = HeadQuarterResource::class;

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
