<?php

namespace App\Filament\Resources\PatchResource\Pages;

use App\Filament\Resources\PatchResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPatch extends ViewRecord
{
    protected static string $resource = PatchResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
