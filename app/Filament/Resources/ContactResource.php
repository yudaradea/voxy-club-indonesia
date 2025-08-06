<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationGroup = 'Other';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('whatsapp')->label('WhatsApp Number')->numeric()->required(),
                TextInput::make('email')->email()->required(),
                Textarea::make('address')->required(),
                Textarea::make('maps')->required(),
                TextInput::make('instagram')->required()->placeholder('https://www.instagram.com/@username'),
                TextInput::make('facebook')->required()->placeholder('https://www.facebook.com/@username'),
                TextInput::make('youtube')->required()->placeholder('https://www.youtube.com/@username'),
                TextInput::make('tiktok')->required()->placeholder('https://www.tiktok.com/@username'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('whatsapp')->label('WhatsApp Number'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('address')->label('Address'),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
