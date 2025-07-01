<?php

namespace App\Filament\Admin\Resources\KomunitasResource\Pages;

use App\Filament\Admin\Resources\KomunitasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKomunitas extends EditRecord
{
    protected static string $resource = KomunitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
