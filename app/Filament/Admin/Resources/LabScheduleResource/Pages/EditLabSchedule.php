<?php

namespace App\Filament\Admin\Resources\LabScheduleResource\Pages;

use App\Filament\Admin\Resources\LabScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLabSchedule extends EditRecord
{
    protected static string $resource = LabScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
