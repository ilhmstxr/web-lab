<?php

namespace App\Filament\Admin\Resources\LabResourceResource\Pages;

use App\Filament\Admin\Resources\LabResourceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLabResources extends ListRecords
{
    protected static string $resource = LabResourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
