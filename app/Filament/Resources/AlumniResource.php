<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumniResource\Pages;
use App\Filament\Resources\AlumniResource\RelationManagers;
use App\Models\Alumni;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
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

class AlumniResource extends Resource
{
    protected static ?string $model = Alumni::class;

    protected static ?string $navigationGroup = 'Kelola Data';
    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $activeNavigationIcon = 'heroicon-s-identification';
    protected static ?string $slug = 'alumni';
    protected static ?string $pluralLabel = 'alumni';
    protected static ?string $pluralModelLabel = 'alumni';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Pribadi')
                    ->description('Data personal alumni')
                    ->columns([
                        'sm' => 1,
                        'md' => 3,
                    ])
                    ->schema([
                        Forms\Components\TextInput::make('nim')
                            ->label('NIM')
                            ->placeholder('Isi nomor induk mahasiswa')
                            ->numeric()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->placeholder('Isi nama lengkap')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->native(false)
                            ->required(),
                        Forms\Components\Select::make('jenis_kelamin')
                            ->required()
                            ->placeholder('Pilih jenis kelamin')
                            ->native(false)
                            ->options([
                                'Laki-Laki' => 'Laki-Laki',
                                'Perempuan' => 'Perempuan'
                            ]),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->placeholder('Isi alamat email')
                            ->prefixIcon('heroicon-o-envelope')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('telepon')
                            ->label('Nomor Telepon')
                            ->placeholder('08123456789')
                            ->tel()
                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                            ->prefixIcon('heroicon-o-phone')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('alamat')
                            ->columnSpanFull()
                            ->placeholder('Isi alamat tempat tinggal')
                            ->autosize()
                            ->maxLength(255),
                    ]),
                Section::make('Data Kuliah')
                    ->description('Data riwayat perkuliahan alumni')
                    ->columns([
                        'sm' => 1,
                        'md' => 2,
                    ])
                    ->schema([
                        Forms\Components\Select::make('program_studi')
                            ->label('Program Studi')
                            ->placeholder('Pilih program studi')
                            ->native(false)
                            ->required()
                            ->options([
                                'D3 Manajemen Informatika' => 'D3 Manajemen Informatika', 
                                'D4 Manajemen Informatika' => 'D4 Manajemen Informatika'
                            ]),
                        Forms\Components\TextInput::make('tahun_masuk')
                            ->label('Tahun Masuk')
                            ->placeholder('Isi tahun masuk perkuliahan')
                            ->numeric()
                            ->required(),
                            Forms\Components\TextInput::make('tahun_lulus')
                            ->label('Tahun Lulus')
                            ->placeholder('Isi tahun lulus perkuliahan')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('ipk')
                            ->label('Indeks Prestasi Kumulatif')
                            ->placeholder('cth: 3.80')
                            ->step(0.01)
                            ->minValue(0)
                            ->maxValue(4)
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('nomor_ijazah')
                            ->label('Nomor Ijazah')
                            ->placeholder('Isi nomor ijazah')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\ToggleButtons::make('mengisi_tracer')
                            ->label('Telah mengisi form tracer study?')
                            ->required()
                            ->options([true => 'Telah mengisi', false => 'Belum mengisi'])
                            ->colors([true => 'success', false => 'danger'])
                            ->icons([true => 'heroicon-o-check', false => 'heroicon-o-x-mark'])
                            ->default(false)
                            ->inline(),
                        Forms\Components\FileUpload::make('foto_ijazah')
                            ->label('Foto Ijazah')
                            ->directory('foto_ijazah')
                            ->image()
                            ->imageCropAspectRatio('9:16')
                            ->imageEditor()
                            ->required()
                            ->downloadable()
                            ->openable()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\IconColumn::make('mengisi_tracer')
                    ->label('Mengisi Form')
                    ->boolean()
                    ->alignCenter(),
            ])
            ->defaultSort('nim')
            ->extremePaginationLinks()
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
                Fieldset::make('Data Pribadi')
                    ->columns([
                        'sm'=>1,
                        'md'=>2,
                    ])
                    ->schema([
                        Group::make()
                            ->schema([
                                TextEntry::make('nim')
                                    ->size(TextEntrySize::Large)
                                    ->weight(FontWeight::Medium)
                                    ->label('NIM'),
                                TextEntry::make('nama')
                                    ->size(TextEntrySize::Large)
                                    ->weight(FontWeight::Medium),
                                TextEntry::make('email')
                                    ->size(TextEntrySize::Large)
                                    ->weight(FontWeight::Medium)
                                    ->placeholder('Tidak ada keterangan'),
                                TextEntry::make('telepon')
                                    ->size(TextEntrySize::Large)
                                    ->weight(FontWeight::Medium)
                                    ->placeholder('Tidak ada keterangan')
                                    ->label('Nomor Telepon'),
                            ]),
                        Group::make()
                            ->schema([
                                TextEntry::make('jenis_kelamin')
                                    ->size(TextEntrySize::Large)
                                    ->weight(FontWeight::Medium),
                                TextEntry::make('tanggal_lahir')
                                    ->size(TextEntrySize::Large)
                                    ->weight(FontWeight::Medium)
                                    ->date()
                                    ->label('Tanggal Lahir'),
                                TextEntry::make('alamat')
                                    ->size(TextEntrySize::Large)
                                    ->weight(FontWeight::Medium)
                                    ->placeholder('Tidak ada keterangan'),
                            ]),
                    ]),

                Fieldset::make('Data Alumni')
                    ->columns([
                        'sm'=>1,
                        'md'=>3,
                        'lg'=>3,
                    ])
                    ->schema([
                        Group::make()
                            ->schema([
                                TextEntry::make('program_studi')
                                    ->size(TextEntrySize::Large)
                                    ->weight(FontWeight::Medium)
                                    ->label('Program Studi'),
                                TextEntry::make('ipk')
                                    ->size(TextEntrySize::Large)
                                    ->weight(FontWeight::Medium)
                                    ->numeric(decimalPlaces: 2)
                                    ->label('Indeks Prestasi Kumulatif'),
                                TextEntry::make('nomor_ijazah')
                                    ->size(TextEntrySize::Large)
                                    ->weight(FontWeight::Medium)
                                    ->label('Nomor Ijazah'),
                            ]),
                        Group::make()
                            ->schema([
                                TextEntry::make('tahun_masuk')
                                    ->size(TextEntrySize::Large)
                                    ->weight(FontWeight::Medium)
                                    ->label('Tahun Masuk'),
                                TextEntry::make('tahun_lulus')
                                    ->size(TextEntrySize::Large)
                                    ->weight(FontWeight::Medium)
                                    ->label('Tahun Lulus'),
                                IconEntry::make('mengisi_tracer')
                                    ->label('Mengisi Form')
                                    ->boolean(),
                            ]),
                        ImageEntry::make('foto_ijazah')
                            ->label('Foto Ijazah')
                            ->height(200)
                            ->visibility('private'),
                    ]),
                ]
            );
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
            'index' => Pages\ListAlumnis::route('/'),
            'create' => Pages\CreateAlumni::route('/create'),
            'view' => Pages\ViewAlumni::route('/{record}'),
            'edit' => Pages\EditAlumni::route('/{record}/edit'),
        ];
    }
}
