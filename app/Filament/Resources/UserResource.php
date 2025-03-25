<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\FileUpload::make('profile_photo')->avatar(),

                Forms\Components\Select::make('role')
                    ->options(Role::all()->pluck('name', 'id'))
                    ->required()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('role_id', $state); // Store the role ID for processing
                    })
                    ->required(fn(string $context): bool => $context === 'create')
                    ->hiddenOn('edit')
                    ->dehydrated(false), // Don't save this field directly to the model

                // Hidden field to store the role ID for processing
                Forms\Components\Hidden::make('role_id'),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(fn(string $context): bool => $context === 'create')
                    ->hiddenOn('edit'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('profile_photo')
                    ->disk('public')
                    ->rounded()->default(asset('/images/img_1.png')),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('roles.name')->label('Role'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->relationship('roles', 'name'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
