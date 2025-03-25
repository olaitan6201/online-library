<?php

namespace App\Filament\Reader\Resources\BookResource\Pages;

use App\Filament\Reader\Resources\BookResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBooks extends ListRecords
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }
}
