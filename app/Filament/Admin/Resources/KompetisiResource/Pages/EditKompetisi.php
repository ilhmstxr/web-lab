<?php

namespace App\Filament\Admin\Resources\KompetisiResource\Pages;

use App\Filament\Admin\Resources\KompetisiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKompetisi extends EditRecord
{
    protected static string $resource = KompetisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
