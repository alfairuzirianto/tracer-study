<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TracerResource\Pages;
use App\Filament\Resources\TracerResource\RelationManagers;
use App\Models\Alumni;
use App\Models\Tracer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TracerResource extends Resource
{
    protected static ?string $model = Tracer::class;

    protected static ?string $navigationGroup = 'Kelola Data';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $activeNavigationIcon = 'heroicon-s-academic-cap';
    protected static ?string $slug = 'tracer';
    protected static ?string $pluralLabel = 'tracer';
    protected static ?string $pluralModelLabel = 'tracer';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Select::make('nim')
                    ->label('NIM')
                    ->required()
                    ->placeholder('Pilih nim alumni')
                    ->native(false)
                    ->searchable()
                    ->options(
                        Alumni::orderBy('nim')->get()->pluck('nama', 'nim')->map(function ($nama, $nim) {
                            return "$nim - $nama";
                        })
                    ),
                Forms\Components\Select::make('status')
                    ->placeholder('Status saat ini')
                    ->required()
                    ->native(false)
                    ->options([
                        'Bekerja'=>'Bekerja',
                        'Wirausaha'=>'Wirausaha',
                        'Lanjut Studi'=>'Lanjut Studi',
                        'Belum bekerja'=>'Belum bekerja',
                    ]),
                Forms\Components\TextInput::make('waktu_tunggu')
                    ->placeholder('Waktu tunggu dari kelulusan (bulan)')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nama_instansi')
                    ->placeholder('Masukkan nama instansi/usaha/perusahaan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('jenis_instansi')
                    ->placeholder('Pilih jenis instansi/usaha/perusahaan')
                    ->required()
                    ->native(false)
                    ->options([
                        'Instansi Pemerintah' => 'Instansi Pemerintah',
                        'Instansi Swasta' => 'Instansi Swasta',
                        'BUMN/BUMD' => 'BUMN/BUMD',
                        'Wiraswasta/Perusahaan Sendiri' => 'Wiraswasta/Perusahaan Sendiri',
                        'Organisasi Non-Profit' => 'Organisasi Non-Profit',
                        'Lainnya' => 'Lainnya',
                    ]),
                Forms\Components\TextInput::make('kota_instansi')
                    ->placeholder('Masukkan kota letak instansi/usaha/perusahaan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat_instansi')
                    ->placeholder('Masukkan alamat letak instansi/usaha/perusahaan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatan')
                    ->placeholder('Jabatan atau posisi di instansi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pendapatan')
                    ->placeholder('Penghasilan per bulan')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->default(0)
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(','),
                Forms\Components\Select::make('keselarasan')
                    ->placeholder('Keselarasan pendidikan dengan kegiatan saat ini')
                    ->required()
                    ->native(false)
                    ->options([
                        'Sangat Erat' => 'Sangat Erat',
                        'Cukup Erat' => 'Cukup Erat',
                        'Erat' => 'Erat',
                        'Kurang Erat' => 'Kurang Erat',
                        'Tidak Erat' => 'Tidak Erat',
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
                Tables\Columns\TextColumn::make('alumni.nama')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('nama_instansi')
                    ->label('Instansi')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
                Fieldset::make('Data Tracer Study')
                    ->columns(1)
                    ->schema([
                        Group::make([
                            TextEntry::make('status')
                                ->badge()
                                ->columnSpanFull(),
                            TextEntry::make('nim')
                                ->label('NIM')
                                ->weight(FontWeight::Medium)
                                ->size(TextEntrySize::Large),
                            TextEntry::make('alumni.nama')
                                ->label('Nama')
                                ->weight(FontWeight::Medium)
                                ->size(TextEntrySize::Large),
                            TextEntry::make('waktu_tunggu')
                                ->weight(FontWeight::Medium)
                                ->size(TextEntrySize::Large)
                                ->suffix(' bulan'),
                        ])->columns(3),
                        Group::make([
                            TextEntry::make('nama_instansi')
                                ->weight(FontWeight::Medium)
                                ->size(TextEntrySize::Large),
                            TextEntry::make('jenis_instansi')
                                ->weight(FontWeight::Medium)
                                ->size(TextEntrySize::Large),
                            TextEntry::make('kota_instansi')
                                ->weight(FontWeight::Medium)
                                ->size(TextEntrySize::Large),
                            TextEntry::make('alamat_instansi')
                                ->weight(FontWeight::Medium)
                                ->size(TextEntrySize::Large)
                                ->columnSpanFull(),
                        ])->columns(3),
                        Group::make([
                            TextEntry::make('jabatan')
                                ->weight(FontWeight::Medium)
                                ->size(TextEntrySize::Large),
                            TextEntry::make('pendapatan')
                                ->weight(FontWeight::Medium)
                                ->size(TextEntrySize::Large)
                                ->money('IDR'),
                            TextEntry::make('keselarasan')
                                ->weight(FontWeight::Medium)
                                ->size(TextEntrySize::Large)
                                ->placeholder('Tidak ada keterangan'),
                        ])->columns(3),
                    ]),
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
            'index' => Pages\ListTracers::route('/'),
            'create' => Pages\CreateTracer::route('/create'),
            'view' => Pages\ViewTracer::route('/{record}'),
            'edit' => Pages\EditTracer::route('/{record}/edit'),
        ];
    }
}
