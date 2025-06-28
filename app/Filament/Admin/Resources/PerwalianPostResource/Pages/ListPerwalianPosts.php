<?php

namespace App\Filament\Admin\Resources\PerwalianPostResource\Pages;

use App\Filament\Admin\Resources\PerwalianPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerwalianPosts extends ListRecords
{
    protected static string $resource = PerwalianPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
