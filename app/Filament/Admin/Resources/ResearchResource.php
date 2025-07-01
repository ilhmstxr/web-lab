<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ResearchResource\Pages;
use App\Models\Research;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ResearchResource extends Resource
{
    protected static ?string $model = Research::class;

    // Pengaturan Navigasi
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Manajemen Akademik';
    protected static ?string $modelLabel = 'Penelitian & Skripsi';
    protected static ?string $pluralModelLabel = 'Daftar Penelitian & Skripsi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // === GRUP KIRI ===
                Section::make('Informasi Utama & Kategori')
                    ->description('Detail inti mengenai data penelitian atau skripsi.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        // Dropdown untuk Kategori, berdiri sendiri
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->label('Kategori'),

                        // Dropdown untuk Topik, berdiri sendiri
                        Select::make('topic_id')
                            ->relationship('topic', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->label('Topik'),

                        Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->rows(4)
                            ->columnSpanFull(),

                    ])->columnSpan(['lg' => 2]),

                // === GRUP KANAN ===
                Section::make('Detail Penulis & Publikasi')
                    ->schema([
                        TextInput::make('author')
                            ->label('Penulis Utama')
                            ->required(),

                        TextInput::make('year')
                            ->label('Tahun')
                            ->numeric()
                            ->minValue(2000)
                            ->maxValue(date('Y') + 5), // Batasan tahun

                        Select::make('status')
                            ->options([
                                'ongoing' => 'Ongoing',
                                'completed' => 'Completed',
                            ])
                            ->default('completed')
                            ->required(),

                        TextInput::make('interest')
                            ->label('Bidang Minat'),

                        TextInput::make('institution')
                            ->label('Institusi'),

                    ])->columnSpan(['lg' => 1]),

                // === GRUP BAWAH (FULL WIDTH) ===
                Section::make('Informasi Tambahan')
                    ->schema([
                        TextInput::make('funding')
                            ->label('Sumber Pendanaan'),
                        TextInput::make('fund')
                            ->label('Jumlah Dana')
                            ->numeric()
                            ->prefix('Rp'),
                        TextInput::make('npm')
                            ->label('NPM (jika mahasiswa)'),
                        TextInput::make('angkatan')
                            ->label('Angkatan (jika mahasiswa)')
                            ->numeric(),
                        TextInput::make('repositoryLink')
                            ->label('Link Repositori/Jurnal')
                            ->url()
                            ->columnSpanFull(),
                        TextInput::make('youtubeLink')
                            ->label('Link Video YouTube')
                            ->url()
                            ->columnSpanFull(),
                    ])->columns(2),

            ])->columns(3); // Layout utama 3 kolom
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(40)
                    ->tooltip(fn(Research $record): string => $record->title), // Tampilkan judul penuh saat hover

                TextColumn::make('author')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('topic.name')
                    ->label('Topik')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable(),

                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'ongoing',
                        'success' => 'completed',
                    ]),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->label('Filter Kategori'),

                SelectFilter::make('topic')
                    ->relationship('topic', 'name')
                    ->searchable()
                    ->preload()
                    ->label('Filter Topik'),

                SelectFilter::make('year')
                    ->options(fn() => Research::query()->select('year')->distinct()->pluck('year', 'year')->sortDesc())
                    ->label('Filter Tahun'),
            ])
            ->actions([
                ViewAction::make(),
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
            // Relation managers bisa ditambahkan di sini jika perlu
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResearch::route('/'),
            'create' => Pages\CreateResearch::route('/create'),
            'edit' => Pages\EditResearch::route('/{record}/edit'),
        ];
    }
}
