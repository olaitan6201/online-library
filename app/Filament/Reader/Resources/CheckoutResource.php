<?php

namespace App\Filament\Reader\Resources;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Reader\Resources\CheckoutResource\Pages;
use App\Filament\Reader\Resources\CheckoutResource\RelationManagers;
use App\Models\Checkout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CheckoutResource extends Resource
{
    protected static ?string $model = Checkout::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public static function table(Table $table): Table
    {
        /** @var ?User $authUser */
        $authUser = filament()->auth()->user();

        return $table
            ->query(Checkout::query()->whereBelongsTo($authUser))
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('book.title'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('checked_out_at')->dateTime(),
                Tables\Columns\TextColumn::make('due_date')->dateTime(),
                Tables\Columns\TextColumn::make('checked_in_at')->dateTime(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'checked_out' => 'warning',
                        'overdue' => 'danger',
                        'returned' => 'success',
                    })
                    ->getStateUsing(function (Model $record) {
                        if ($record->checked_in_at) {
                            return 'returned';
                        }
                        if (now() > $record->due_date) {
                            return 'overdue';
                        }
                        return 'checked_out';
                    })
                    ->formatStateUsing(fn($state) => ucwords(str_replace('_', ' ', $state))),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'checked_out' => 'Checked Out',
                        'overdue' => 'Overdue',
                        'returned' => 'Returned',
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (empty($data['value'])) {
                            return $query;
                        }

                        $status = $data['value'];

                        return $query->where(function ($query) use ($status) {
                            if ($status === 'returned') {
                                $query->whereNotNull('checked_in_at');
                            } else {
                                $query->whereNull('checked_in_at');
                                if ($status === 'overdue') {
                                    $query->where('due_date', '<', now());
                                } else {
                                    $query->where('due_date', '>=', now());
                                }
                            }
                        });
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCheckouts::route('/'),
//            'create' => Pages\CreateCheckout::route('/create'),
//            'edit' => Pages\EditCheckout::route('/{record}/edit'),
        ];
    }
}
