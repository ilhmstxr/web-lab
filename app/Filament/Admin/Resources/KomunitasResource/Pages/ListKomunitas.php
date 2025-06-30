<?php

namespace App\Filament\Admin\Resources\KomunitasResource\Pages;

use App\Filament\Admin\Resources\KomunitasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKomunitas extends ListRecords
{
    protected static string $resource = KomunitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
