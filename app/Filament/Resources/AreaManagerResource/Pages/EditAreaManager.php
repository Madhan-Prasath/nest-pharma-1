<?php

namespace App\Filament\Resources\AreaManagerResource\Pages;

use App\Filament\Resources\AreaManagerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAreaManager extends EditRecord
{
    protected static string $resource = AreaManagerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
