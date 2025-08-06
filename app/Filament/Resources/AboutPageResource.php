<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutPageResource\Pages;
use App\Filament\Resources\AboutPageResource\RelationManagers;
use App\Models\AboutPage;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutPageResource extends Resource
{
    protected static ?string $model = AboutPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationLabel = 'About Content';
    protected static ?string $modelLabel = 'About Content';
    protected static ?string $navigationGroup = 'About Page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Hero Section')->schema([
                    TextInput::make('title')->required(),
                    TextInput::make('subtitle')->required(),
                    FileUpload::make('image_hero')->required()->image()->directory('about-images'),
                    FileUpload::make('image_about')->required()->image()->directory('about-images'),
                ]),
                Section::make('About Section')->schema([

                    Textarea::make('visi')->required()->rows(5),
                    Textarea::make('misi')->required()->rows(5),
                    Textarea::make('description')->required()->rows(6),

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_about')->circular(),
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
            'index' => Pages\ListAboutPages::route('/'),
            'create' => Pages\CreateAboutPage::route('/create'),
            'edit' => Pages\EditAboutPage::route('/{record}/edit'),
        ];
    }
}
