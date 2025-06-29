<?php

namespace App\Filament\Admin\Resources\KegiatanResource\Pages;

use App\Filament\Admin\Resources\KegiatanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKegiatan extends CreateRecord
{
    protected static string $resource = KegiatanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }
}
