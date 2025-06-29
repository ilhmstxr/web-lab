<?php

namespace App\Filament\Admin\Resources;

use App\Models\Kegiatan;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Filament\Admin\Resources\KegiatanResource\Pages;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'Kegiatan';
    protected static ?string $navigationGroup = 'Lab Komputer';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('judul')
                ->required()
                ->maxLength(255),

            Textarea::make('deskripsi')
                ->rows(5)
                ->placeholder('Deskripsikan kegiatan secara singkat'),

            TextInput::make('kategori')
                ->required()
                ->placeholder('Contoh: Workshop, Seminar, dll'),

            DatePicker::make('tanggal')
                ->required()
                ->displayFormat('d F Y'),

            TextInput::make('tempat')
                ->placeholder('Lokasi kegiatan'),

            FileUpload::make('poster')
                ->image()
                ->directory('kegiatan/posters')
                ->preserveFilenames(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('tanggal')
                    ->date('d F Y')
                    ->sortable(),

                TextColumn::make('kategori')
                    ->badge(),

                TextColumn::make('tempat'),

                ImageColumn::make('poster')
                    ->circular()
                    ->size(40),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}
