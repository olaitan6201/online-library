<?php

namespace App\Filament\Reader\Resources;

use App\Filament\Reader\Resources\BookResource\Pages;
use App\Filament\Reader\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('author')->searchable(),
                Tables\Columns\TextColumn::make('isbn')
                    ->label('ISBN')
                    ->searchable(),
                Tables\Columns\TextColumn::make('publisher')->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn($state) => ucwords(str_replace('_', ' ', $state)))
                    ->color(fn(string $state): string => match ($state) {
                        'available' => 'success',
                        'checked_out' => 'danger',
                    }),
            ])
            ->filters([
                // Add filters as needed
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
            'index' => Pages\ListBooks::route('/'),
//            'create' => Pages\CreateBook::route('/create'),
//            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
