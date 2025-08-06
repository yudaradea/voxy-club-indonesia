<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroEventPageResource\Pages;
use App\Filament\Resources\HeroEventPageResource\RelationManagers;
use App\Models\HeroEventPage;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroEventPageResource extends Resource
{
    protected static ?string $model = HeroEventPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Event Page';
    // protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                TextInput::make('subtitle')->required(),
                FileUpload::make('image')->required()->image()->directory('hero-event-images'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->circular(),
                TextColumn::make('title'),
                TextColumn::make('subtitle'),
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
            'index' => Pages\ListHeroEventPages::route('/'),
            'create' => Pages\CreateHeroEventPage::route('/create'),
            'edit' => Pages\EditHeroEventPage::route('/{record}/edit'),
        ];
    }
}
