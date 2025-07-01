<?php

namespace App\Filament\Admin\Resources\KomunitasResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KomunitasAgendasRelationManager extends RelationManager
{
    protected static string $relationship = 'komunitasAgendas';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Field untuk Judul Agenda
                Forms\Components\TextInput::make('title')
                    ->label('Nama Agenda')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(), 

                // Field untuk Jadwal
                Forms\Components\DateTimePicker::make('schedule')
                    ->label('Jadwal Pelaksanaan')
                    ->placeholder('Contoh: Setiap hari Jumat, pukul 19:00 WIB')
                    ->required(),

                // Field untuk Deskripsi
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi Singkat Agenda')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Nama Agenda'),
                Tables\Columns\TextColumn::make('schedule')->label('Jadwal'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->label('Tambah Agenda Baru'),
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
