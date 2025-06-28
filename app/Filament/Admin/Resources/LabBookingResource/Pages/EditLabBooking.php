<?php

namespace App\Filament\Admin\Resources\LabBookingResource\Pages;

use App\Filament\Admin\Resources\LabBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLabBooking extends EditRecord
{
    protected static string $resource = LabBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
