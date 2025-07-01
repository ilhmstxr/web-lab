<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set; // Import class Set untuk form reaktif
use Filament\Forms\Form;
use App\Models\LabBooking;
use App\Models\LabSchedule;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Admin\Resources\LabBookingResource\Pages;

class LabBookingResource extends Resource
{
    protected static ?string $model = LabBooking::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationLabel = 'Lab Booking';
    protected static ?string $modelLabel = 'Pemesanan Laboratorium';
    protected static ?string $pluralModelLabel = 'Pemesanan Laboratorium';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detail Pemesanan')
                    ->schema([
                        // Perbaikan: Form dibuat reaktif. Memilih jadwal akan mengisi otomatis LabName dan Sesi Waktu
                        Select::make('schedule_id')
                            ->label('Jadwal Sesi')
                            ->relationship('schedule', 'title')
                            ->getOptionLabelFromRecordUsing(fn(LabSchedule $record) => "{$record->title} | Hari: " . match ($record->day_of_week) {
                                1 => 'Senin',
                                2 => 'Selasa',
                                3 => 'Rabu',
                                4 => 'Kamis',
                                5 => 'Jumat',
                                default => 'Lainnya'
                            } . " ({$record->start_time} - {$record->end_time})")
                            ->searchable(['title', 'day_of_week'])
                            ->live() // Penting untuk membuat form reaktif
                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                if (blank($state)) return;

                                $schedule = LabSchedule::find($state);
                                if ($schedule) {
                                    // Mengisi otomatis LabName dari title schedule
                                    $set('LabName', $schedule->title);
                                    // Mengisi otomatis Sesi Waktu dari start_time dan end_time schedule
                                    $set('sessionTime', date('H:i', strtotime($schedule->start_time)) . ' - ' . date('H:i', strtotime($schedule->end_time)));
                                }
                            })
                            ->required(),

                        // Tambahan: Menambahkan field LabName
                        Select::make('LabName')
                            ->label('Nama Laboratorium')
                            ->options([
                                'Lab MSI' => 'Lab MSI',
                                'Lab SSI' => 'Lab SSI',
                            ])
                            ->required(),
                            
                        DatePicker::make('bookingDate')
                            ->label('Tanggal Pemesanan')
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->required(),

                        // Perbaikan: sessionTime dibuat readonly karena sudah diisi otomatis
                        TextInput::make('sessionTime')
                            ->label('Sesi Waktu')
                            ->placeholder('Akan terisi otomatis setelah memilih jadwal')
                            ->required()
                            ->readonly(), // Dibuat readonly untuk mencegah kesalahan input
                    ])->columns(2),

                Section::make('Informasi Pemesan')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Pemesan')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('phoneNumber')
                            ->label('Nomor Telepon')
                            ->tel()
                            ->required(),
                        Select::make('status')
                            ->label('Status Pemesanan')
                            ->options([
                                'pending' => 'Menunggu Konfirmasi',
                                'confirmed' => 'Dikonfirmasi',
                                'cancelled' => 'Dibatalkan',
                            ])
                            ->default('pending')
                            ->required()
                            ->native(false),
                    ])->columns(3),

                Section::make('Keperluan')
                    ->schema([
                        Textarea::make('purpose')
                            ->label('Tujuan Penggunaan')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('requiredEquipment')
                            ->label('Peralatan Khusus yang Dibutuhkan')
                            ->placeholder('Contoh: Mikroskop Elektron, Spektrometer'),
                        Textarea::make('notes')
                            ->label('Catatan Tambahan')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Perbaikan: Urutan kolom diubah agar lebih logis
                TextColumn::make('LabName')
                    ->label('Laboratorium')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Nama Pemesan')
                    ->searchable()
                    ->description(fn(LabBooking $record): string => $record->phoneNumber), // Menampilkan nomor telepon di bawah nama
                TextColumn::make('bookingDate')
                    ->label('Tanggal Booking')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('sessionTime')
                    ->label('Sesi')
                    ->searchable(),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'confirmed',
                        'danger' => 'cancelled',
                    ])
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'pending' => 'Menunggu Konfirmasi',
                        'confirmed' => 'Dikonfirmasi',
                        'cancelled' => 'Dibatalkan',
                        default => $state,
                    }),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Menunggu Konfirmasi',
                        'confirmed' => 'Dikonfirmasi',
                        'cancelled' => 'Dibatalkan',
                    ]),
                SelectFilter::make('LabName')
                    ->options(
                        LabBooking::query()->distinct()->pluck('LabName', 'LabName')->all()
                    )
            ])
            ->actions([
                EditAction::make(),
                ViewAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('bookingDate', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLabBookings::route('/'),
            'create' => Pages\CreateLabBooking::route('/create'),
            'edit' => Pages\EditLabBooking::route('/{record}/edit'),
        ];
    }
}
