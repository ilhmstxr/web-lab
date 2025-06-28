<?php

namespace App\Filament\Admin\Resources\LabBookingResource\Pages;

use App\Filament\Admin\Resources\LabBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLabBookings extends ListRecords
{
    protected static string $resource = LabBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
