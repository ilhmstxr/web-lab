<?php

namespace App\Filament\Admin\Resources\KegiatanResource\Pages;

use App\Filament\Admin\Resources\KegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKegiatan extends EditRecord
{
    protected static string $resource = KegiatanResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {

        $data['judul'] = ucwords(strtolower($data['judul'] ?? ''));

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
