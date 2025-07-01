<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\LabScheduleResource\Pages;
use App\Filament\Admin\Resources\LabScheduleResource\RelationManagers;
use App\Models\LabSchedule;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LabScheduleResource extends Resource
{
    protected static ?string $model = LabSchedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('day_of_week')
                    ->label('Hari')
                    ->options([
                        1 => 'Senin',
                        2 => 'Selasa',
                        3 => 'Rabu',
                        4 => 'Kamis',
                        5 => 'Jumat',
                        6 => 'Sabtu',
                        7 => 'Minggu',
                    ])
                    ->required()
                    ->native(false), // Use styled select dropdown
                TextInput::make('session')
                    ->label('Sesi')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(12),
                TimePicker::make('start_time')
                    ->label('Waktu Mulai')
                    ->required(),
                TimePicker::make('end_time')
                    ->label('Waktu Selesai')
                    ->required(),
            ])->columns(2);

        Section::make('Informasi Status')
            ->schema([
                TextInput::make('title')
                    ->label('Judul / Nama Kegiatan')
                    ->maxLength(255),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'available' => 'Tersedia',
                        'booked' => 'Dipesan',
                        'maintenance' => 'Perbaikan',
                    ])
                    ->required()
                    ->native(false)
                    ->default('available'),
                ColorPicker::make('color')
                    ->label('Warna Tampilan')
                    ->required(),
                Textarea::make('remarks')
                    ->label('Keterangan Tambahan')
                    ->columnSpanFull(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
              ->columns([
                TextColumn::make('day_of_week')
                    ->label('Hari')
                    ->formatStateUsing(fn (int $state): string => match ($state) {
                        1 => 'Senin',
                        2 => 'Selasa',
                        3 => 'Rabu',
                        4 => 'Kamis',
                        5 => 'Jumat',
                        6 => 'Sabtu',
                        7 => 'Minggu',
                        default => 'Tidak Diketahui',
                    })
                    ->sortable(),
                TextColumn::make('session')
                    ->label('Sesi')
                    ->sortable(),
                TextColumn::make('start_time')
                    ->label('Mulai')
                    ->time('H:i')
                    ->sortable(),
                TextColumn::make('end_time')
                    ->label('Selesai')
                    ->time('H:i')
                    ->sortable(),
                TextColumn::make('title')
                    ->label('Judul Kegiatan')
                    ->searchable()
                    ->limit(30),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'available',
                        'danger' => 'booked',
                        'warning' => 'maintenance',
                    ])
                    ->formatStateUsing(fn(string $state): string => ucfirst($state)), // Capitalize first letter
                ColorColumn::make('color')
                    ->label('Warna'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('day_of_week')
                    ->label('Hari')
                    ->options([
                        1 => 'Senin',
                        2 => 'Selasa',
                        3 => 'Rabu',
                        4 => 'Kamis',
                        5 => 'Jumat',
                    ]),
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'available' => 'Tersedia',
                        'booked' => 'Dipesan',
                        'maintenance' => 'Perbaikan',
                    ])
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
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
            'index' => Pages\ListLabSchedules::route('/'),
            'create' => Pages\CreateLabSchedule::route('/create'),
            'edit' => Pages\EditLabSchedule::route('/{record}/edit'),
        ];
    }
}
