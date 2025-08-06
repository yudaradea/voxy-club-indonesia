<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DewanPengurusResource\Pages;
use App\Filament\Resources\DewanPengurusResource\RelationManagers;
use App\Models\DewanPengurus;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DewanPengurusResource extends Resource
{
    protected static ?string $model = DewanPengurus::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'About Page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('jabatan')->required(),
                FileUpload::make('image')->required()->image()->directory('dewan-pengurus'),
                Select::make('order')->options([
                    '1' => '1',
                    '2' => '2',
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->circular(),
                TextColumn::make('name'),
                TextColumn::make('jabatan'),
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
            'index' => Pages\ListDewanPenguruses::route('/'),
            'create' => Pages\CreateDewanPengurus::route('/create'),
            'edit' => Pages\EditDewanPengurus::route('/{record}/edit'),
        ];
    }
}
