<?php

namespace App\Filament\Reader\Resources\BookResource\Pages;

use App\Filament\Reader\Resources\BookResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBook extends CreateRecord
{
    protected static string $resource = BookResource::class;
}
