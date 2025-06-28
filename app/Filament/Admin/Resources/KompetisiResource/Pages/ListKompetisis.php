<?php

namespace App\Filament\Admin\Resources\KompetisiResource\Pages;

use App\Filament\Admin\Resources\KompetisiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKompetisis extends ListRecords
{
    protected static string $resource = KompetisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
