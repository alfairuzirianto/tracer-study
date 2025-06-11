<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $activeNavigationIcon = 'heroicon-s-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns([
                        'sm'=>1,
                        'md'=>2,
                    ])
                    ->schema([
                        Select::make('role')->label('Role')
                            ->options(User::ROLES)
                            ->preload()
                            ->native(false)
                            ->placeholder('Pilih role'),
                        Forms\Components\TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Nama user'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->prefixIcon('heroicon-m-envelope')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Alamat email user'),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->revealable()
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Isi kata sandi'),
                    ])
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Nama')
                ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('Role')
                    ->badge()
                    ->sortable()
                    ->color(fn (string $state): string => match ($state) {
                        'ADMIN' => 'success',
                        'DOSEN' => 'warning',
                    }),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
            ])
            ->defaultSort('role')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->size(ActionSize::Medium),
                Tables\Actions\EditAction::make()
                    ->size(ActionSize::Medium),
                Tables\Actions\DeleteAction::make()
                    ->size(ActionSize::Medium),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Fieldset::make('Informasi user')
                    ->columns([
                        'sm'=>1,
                        'md'=>3,
                        'lg'=>3,
                    ])
                    ->schema([
                        TextEntry::make('role')
                            ->label('Role')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'ADMIN' => 'success',
                                'DOSEN' => 'warning',
                            }),
                        TextEntry::make('name')
                            ->icon('heroicon-s-user')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Medium),
                        TextEntry::make('email')
                            ->icon('heroicon-s-envelope')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Medium),
                    ])
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
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
