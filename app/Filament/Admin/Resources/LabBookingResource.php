<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\LabBookingResource\Pages;
use App\Models\LabBooking;
use App\Models\LabSchedule; // Import LabSchedule
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class LabBookingResource extends Resource
{
    protected static ?string $model = LabBooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    
    protected static ?string $navigationLabel = 'Lab Booking';

    protected static ?string $modelLabel = 'Pemesanan Laboratorium';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detail Pemesanan')
                    ->schema([
                        // Dropdown untuk memilih jadwal yang tersedia
                        Select::make('schedule_id')
                            ->label('Jadwal Sesi')
                            ->relationship('schedule', 'title') // Menampilkan 'title' dari relasi 'schedule'
                            ->getOptionLabelFromRecordUsing(fn (LabSchedule $record) => "{$record->title} (Hari: " . match($record->day_of_week){1=>'Senin', 2=>'Selasa', 3=>'Rabu', 4=>'Kamis', 5=>'Jumat', default=>'Lainnya'} . ", Sesi: {$record->session})")
                            ->searchable(['title', 'day_of_week'])
                            ->required(),
                        DatePicker::make('bookingDate')
                            ->label('Tanggal Pemesanan')
                            ->required(),
                        TextInput::make('sessionTime')
                            ->label('Sesi Waktu (Deskripsi)')
                            ->placeholder('Contoh: Pagi (08:00 - 12:00)')
                            ->required(),
                    ])->columns(3),

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
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Menampilkan data dari tabel relasi
                TextColumn::make('schedule.title')
                    ->label('Jadwal Dipesan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Nama Pemesan')
                    ->searchable(),
                TextColumn::make('bookingDate')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'confirmed',
                        'danger' => 'cancelled',
                    ]),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Menunggu Konfirmasi',
                        'confirmed' => 'Dikonfirmasi',
                        'cancelled' => 'Dibatalkan',
                    ]),
            ])
            ->actions([
                EditAction::make(),
                ViewAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListLabBookings::route('/'),
            'create' => Pages\CreateLabBooking::route('/create'),
            'edit' => Pages\EditLabBooking::route('/{record}/edit'),
        ];
    }    
}
