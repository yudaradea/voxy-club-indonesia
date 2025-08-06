<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeHeroImageResource\Pages;
use App\Filament\Resources\HomeHeroImageResource\RelationManagers;
use App\Models\HomeHeroImage;
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

class HomeHeroImageResource extends Resource
{
    protected static ?string $model = HomeHeroImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Hero Image';
    protected static ?string $modelLabel = 'Hero Image';
    protected static ?string $navigationGroup = 'Home Page';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                FileUpload::make('image')->image()->directory('home-hero-images')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->circular(),
                TextColumn::make('title'),
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
            'index' => Pages\ListHomeHeroImages::route('/'),
            'create' => Pages\CreateHomeHeroImage::route('/create'),
            'edit' => Pages\EditHomeHeroImage::route('/{record}/edit'),
        ];
    }
}
