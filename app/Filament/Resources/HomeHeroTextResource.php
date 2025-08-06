<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeHeroTextResource\Pages;
use App\Filament\Resources\HomeHeroTextResource\RelationManagers;
use App\Models\HomeHeroText;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomeHeroTextResource extends Resource
{
    protected static ?string $model = HomeHeroText::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Hero Text';
    protected static ?string $modelLabel = 'Hero Text';
    protected static ?string $navigationGroup = 'Home Page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title'),
                TextInput::make('subtitle'),
                TextInput::make('button_text'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            'index' => Pages\ListHomeHeroTexts::route('/'),
            'create' => Pages\CreateHomeHeroText::route('/create'),
            'edit' => Pages\EditHomeHeroText::route('/{record}/edit'),
        ];
    }
}
