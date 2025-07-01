<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KomunitasResource\Pages;
use App\Filament\Admin\Resources\KomunitasResource\RelationManagers;
use App\Models\Komunitas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KomunitasResource extends Resource
{
    protected static ?string $model = Komunitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Field untuk Nama Komunitas
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Komunitas')
                        ->required()
                        ->maxLength(255),

                    // Field untuk Tagline
                    Forms\Components\TextInput::make('tagline')
                        ->maxLength(255),

                    // Field untuk Upload Logo
                    Forms\Components\FileUpload::make('logo')
                        ->image()
                        ->directory('komunitas-logos'), // Simpan gambar di folder storage/app/public/komunitas-logos

                    // Field untuk Deskripsi 'Tentang Kami'
                    Forms\Components\RichEditor::make('about')
                        ->label('Tentang Kami')
                        ->required()
                        ->columnSpanFull(), 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom untuk menampilkan logo
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo'),
                
                // Kolom untuk menampilkan nama, bisa dicari dan diurutkan
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Komunitas')
                    ->searchable()
                    ->sortable(),

                // Kolom untuk menampilkan tagline
                Tables\Columns\TextColumn::make('tagline')
                    ->limit(50), // Batasi panjang teks agar tidak terlalu panjang

                // Kolom untuk menampilkan tanggal dibuat
                 Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Bisa disembunyikan
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            RelationManagers\KomunitasAnggotasRelationManager::class,
            RelationManagers\KomunitasAgendasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKomunitas::route('/'),
            'create' => Pages\CreateKomunitas::route('/create'),
            'edit' => Pages\EditKomunitas::route('/{record}/edit'),
        ];
    }
}
