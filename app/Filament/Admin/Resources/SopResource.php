<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SopResource\Pages;
use App\Filament\Admin\Resources\SopResource\RelationManagers;
use App\Models\Sop;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select; // Import Select
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Actions\Action;

class SopResource extends Resource
{
    protected static ?string $model = Sop::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    protected static ?string $navigationGroup = 'Laboratorium';

    protected static ?string $navigationLabel = 'Manajemen SOP';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul SOP')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('description')
                    ->label('Deskripsi')
                    ->nullable()
                    ->columnSpanFull(),
                // Tambahkan field Select untuk lab_type
                Select::make('lab_type')
                    ->label('Jenis Laboratorium')
                    ->options([
                        'solusi' => 'Lab Solusi',
                        'msi' => 'Lab MSI',
                    ])
                    ->required()
                    ->placeholder('Pilih jenis laboratorium'),
                FileUpload::make('file_path')
                    ->label('File PDF SOP')
                    ->disk('public')
                    ->directory('sops')
                    ->acceptedFileTypes(['application/pdf'])
                    ->visibility('public')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul SOP')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('lab_type') // Tampilkan jenis lab di tabel
                    ->label('Jenis Lab')
                    ->badge() // Tampilkan sebagai badge
                    ->color(fn(string $state): string => match ($state) {
                        'solusi' => 'info', // Warna biru
                        'msi' => 'warning', // Warna kuning
                        default => 'gray',
                    }),
                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('file_path')
                    ->label('Unduh File')
                    ->url(fn(Sop $record): string => asset('storage/' . $record->file_path))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('primary')
                    ->tooltip('Klik untuk mengunduh SOP')
                    ->formatStateUsing(fn(string $state): string => 'Unduh PDF'),
            ])
            ->filters([
                // Anda bisa menambahkan filter di sini jika diperlukan
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSops::route('/'),
            'create' => Pages\CreateSop::route('/create'),
            'edit' => Pages\EditSop::route('/{record}/edit'),
        ];
    }
}