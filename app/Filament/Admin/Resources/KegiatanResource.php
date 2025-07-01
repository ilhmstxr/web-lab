<?php

namespace App\Filament\Admin\Resources;

use App\Models\Kegiatan;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Filament\Admin\Resources\KegiatanResource\Pages;
use Filament\Forms\Components\Embed; 

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
                ->maxLength(255)
                ->columnSpanFull(),

            RichEditor::make('deskripsi')
                ->required()
                ->toolbarButtons([
                    'blockquote',
                    'bold',
                    'bulletList',
                    'codeBlock',
                    'h2',
                    'h3',
                    'italic',
                    'link',
                    'orderedList',
                    'redo',
                    'strike',
                    'undo',
                    'attachFiles',
                    'media',
                ])
                ->fileAttachmentsDirectory('kegiatan-attachments')
                ->fileAttachmentsVisibility('public')
                ->columnSpanFull()
                ->placeholder('Deskripsikan kegiatan secara detail, Anda bisa menambahkan format teks, gambar, dan video.'),

            TextInput::make('youtube_url')
                ->label('YouTube Video URL')
                ->placeholder('Contoh: youtube.com')
                ->url()
                ->nullable()
                ->columnSpanFull(),

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
                ->preserveFilenames()
                ->nullable(),
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
                TextColumn::make('tempat')
                    ->searchable(),
                ImageColumn::make('poster')
                    ->circular()
                    ->size(40),
            ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}