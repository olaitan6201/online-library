<?php

namespace App\Filament\Reader\Resources\CheckoutResource\Pages;

use App\Filament\Reader\Resources\CheckoutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCheckout extends EditRecord
{
    protected static string $resource = CheckoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\DeleteAction::make(),
        ];
    }
}
