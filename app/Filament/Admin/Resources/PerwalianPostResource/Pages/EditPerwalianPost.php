<?php

namespace App\Filament\Admin\Resources\PerwalianPostResource\Pages;

use App\Filament\Admin\Resources\PerwalianPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerwalianPost extends EditRecord
{
    protected static string $resource = PerwalianPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
