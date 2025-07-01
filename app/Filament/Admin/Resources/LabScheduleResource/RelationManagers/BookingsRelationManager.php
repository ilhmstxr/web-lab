<?php

namespace App\Filament\Admin\Resources\LabScheduleResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LabBookingsRelationManager extends RelationManager
{
    protected static string $relationship = 'bookings';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $modelLabel = 'Pemesanan';

    protected static ?string $pluralModelLabel = 'Pemesanan';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pemesan')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Pemesan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phoneNumber')
                            ->label('Nomor Telepon')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Section::make('Detail Pemesanan')
                    ->schema([
                        Forms\Components\DatePicker::make('bookingDate')
                            ->label('Tanggal Pemesanan')
                            ->required(),
                        Forms\Components\TextInput::make('sessionTime')
                            ->label('Sesi Waktu')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Pagi (08:00 - 12:00)'),
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Menunggu Konfirmasi',
                                'confirmed' => 'Dikonfirmasi',
                                'cancelled' => 'Dibatalkan',
                            ])
                            ->required()
                            ->native(false)
                            ->default('pending'),
                        Forms\Components\Textarea::make('purpose')
                            ->label('Tujuan Penggunaan')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('requiredEquipment')
                            ->label('Peralatan yang Dibutuhkan')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('notes')
                            ->label('Catatan Tambahan')
                            ->columnSpanFull(),
                    ])->columns(3),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pemesan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phoneNumber')
                    ->label('No. Telepon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('purpose')
                    ->label('Tujuan')
                    ->limit(40),
                Tables\Columns\TextColumn::make('bookingDate')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'confirmed',
                        'danger' => 'cancelled',
                    ])
                    ->formatStateUsing(fn(string $state): string => ucfirst($state)),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
