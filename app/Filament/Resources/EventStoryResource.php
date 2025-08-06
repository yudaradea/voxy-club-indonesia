<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventStoryResource\Pages;
use App\Filament\Resources\EventStoryResource\RelationManagers;
use App\Models\EventStory;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class EventStoryResource extends Resource
{
    protected static ?string $model = EventStory::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Event Page';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                Forms\Components\Hidden::make('slug')
                    ->required(),

                Forms\Components\Hidden::make('user_id')
                    ->default(Auth::user()->id),

                Forms\Components\FileUpload::make('hero_image')
                    ->image()
                    ->directory('event_stories')
                    ->required(),

                DatePicker::make('event_date')
                    ->required(),

                Forms\Components\TextInput::make('location')
                    ->required()
                    ->maxLength(255),

                Grid::make(1)
                    ->schema([
                        Forms\Components\RichEditor::make('content')
                            ->fileAttachmentsDirectory('event_stories')
                            ->extraInputAttributes(['style' => 'min-height: 20rem; max-height: 50vh; overflow-y: auto;'])
                            ->toolbarButtons([
                                'attachFiles',
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
                                'underline',
                                'undo',
                            ])
                            ->required(),
                    ]),


                Forms\Components\Toggle::make('is_featured')
                    ->label('Featured')
                    ->default(false),

                // Author otomatis diisi, tidak perlu ditampilkan
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('hero_image')->circular(),
                TextColumn::make('title')->searchable(),
                TextColumn::make('event_date')->date('d F Y')->sortable(),
                ToggleColumn::make('is_featured')->label('Featured'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventStories::route('/'),
            'create' => Pages\CreateEventStory::route('/create'),
            'edit' => Pages\EditEventStory::route('/{record}/edit'),
        ];
    }
}
