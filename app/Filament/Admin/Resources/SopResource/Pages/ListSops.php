<?php

namespace App\Filament\Admin\Resources\SopResource\Pages;

use App\Filament\Admin\Resources\SopResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSops extends ListRecords
{
    protected static string $resource = SopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Tindakan untuk membuat record baru, ini sudah benar untuk halaman daftar
            Actions\CreateAction::make(),
        ];
    }
}
