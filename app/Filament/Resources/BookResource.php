<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('cover_image')
                    ->image()
                    ->directory('book-covers')
                    ->required(),
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('isbn')->required(),
                Forms\Components\TextInput::make('revision_number'),
                Forms\Components\DatePicker::make('published_date')->required(),
                Forms\Components\TextInput::make('publisher')->required(),
                Forms\Components\TextInput::make('author')->required(),
                Forms\Components\DatePicker::make('date_added')->required(),
                Forms\Components\Select::make('genre')
                    ->options([
                        'fiction' => 'Fiction',
                        'non-fiction' => 'Non-Fiction',
                        'science' => 'Science',
                        'history' => 'History',
                        'biography' => 'Biography',
                    ])
                    ->required(),
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
            'create' => Pages\CreateBook::route('/create'),
//            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
