<?php

namespace App\Filament\Admin\Resources\KomunitasResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KomunitasAnggotasRelationManager extends RelationManager
{
    protected static string $relationship = 'komunitasAnggotas';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->required(),
                Forms\Components\TextInput::make('role')
                        ->label('Jabatan / Peran')
                        ->helperText('Contoh: Ketua, Wakil Ketua, Anggota')
                        ->required(),
                Forms\Components\FileUpload::make('photo')
                        ->label('Foto')
                        ->image()
                        ->directory('anggota-photos'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                    Tables\Columns\ImageColumn::make('photo')->label('Foto'),
                    Tables\Columns\TextColumn::make('name'),
                    Tables\Columns\TextColumn::make('role')->label('Jabatan'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                    Tables\Actions\CreateAction::make()->label('Tambah Anggota Baru'),
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
