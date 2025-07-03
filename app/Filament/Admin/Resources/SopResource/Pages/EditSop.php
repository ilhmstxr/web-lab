<?php

namespace App\Filament\Admin\Resources\SopResource\Pages;

use App\Filament\Admin\Resources\SopResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSop extends EditRecord
{
    protected static string $resource = SopResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['title'] = ucwords(strtolower($data['title'] ?? ''));

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}