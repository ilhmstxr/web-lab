<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ResearchResource\Pages;
use App\Filament\Admin\Resources\ResearchResource\RelationManagers;
use App\Models\Research;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResearchResource extends Resource
{
    protected static ?string $model = Research::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ])
                    ->default('draft')
                    ->required(),
                Forms\Components\DateTimePicker::make('published_at')
                    ->label('Published At')
                    ->required()
                    ->default(now())
                    ->when(fn($get) => $get('status') === 'published'),
                Forms\Components\TextInput::make('author')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('document')
                    ->label('Research Document')
                    ->required()
                    ->disk('public')
                    ->directory('research_documents')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(10240) // 10 MB
                    ->enableDownload()
                    ->enableOpen()
                    ->preserveFilenames()
                    ->columnSpanFull(),
            ])->columns([
                'sm' => 1,
                'md' => 2,
                'lg' => 3,
                'xl' => 4,
                '2xl' => 5,
            ])->columnSpan([
                'sm' => 'full',
                'md' => 'full',
                'lg' => 'full',
                'xl' => 'full',
                '2xl' => 'full',
            ])->statePath('research')
            ->inlineLabel(false)
            ->validationAttributes([
                'title' => 'Title',
                'description' => 'Description',
                'status' => 'Status',
                'published_at' => 'Published At',
                'author' => 'Author',
                'document' => 'Research Document',
            ])->hidden([
                'status' => fn($get) => $get('status') === 'draft',
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([])
            ->filters([])
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
            //
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
