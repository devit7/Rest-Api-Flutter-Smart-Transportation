<?php

namespace App\Filament\Resources\HalteResource\Pages;

use App\Filament\Resources\HalteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHalte extends EditRecord
{
    protected static string $resource = HalteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
