<?php

namespace App\Filament\Resources\CheckoutResource\Pages;

use App\Models\Checkout;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\CheckoutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCheckout extends EditRecord
{
    protected static string $resource = CheckoutResource::class;

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        /** @var Checkout $record */
        $record = parent::handleRecordUpdate($record, $data);

        if ( ! is_null($record->checked_in_at)) {
            $record->book()->update([
                'status' => 'available',
            ]);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
//            Actions\DeleteAction::make(),
        ];
    }
}
