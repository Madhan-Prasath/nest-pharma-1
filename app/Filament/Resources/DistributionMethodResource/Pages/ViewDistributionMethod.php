<?php

namespace App\Filament\Resources\DistributionMethodResource\Pages;

use App\Filament\Resources\DistributionMethodResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDistributionMethod extends ViewRecord
{
    protected static string $resource = DistributionMethodResource::class;

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
