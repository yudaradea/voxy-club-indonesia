<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MerchandiseResource\Pages;
use App\Filament\Resources\MerchandiseResource\RelationManagers;
use App\Models\Merchandise;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;


class MerchandiseResource extends Resource
{
    protected static ?string $model = Merchandise::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = 'Merchandise Page';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->maxLength(255)->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                Hidden::make('slug')
                    ->required(),
                TextInput::make('short_description')->required()->maxLength(255),
                Textarea::make('description')->required()->rows(5)->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->prefix('Rp')
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->numeric(),
                TextInput::make('stock')->required()->numeric(),
                TagsInput::make('sizes')
                    ->label('Ukuran')
                    ->placeholder('Contoh: S, M, L')
                    ->separator(',')
                    ->saveRelationshipsUsing(null) // jangan pakai relasi
                    ->dehydrateStateUsing(fn($state) => $state) // simpan langsung array
                    ->afterStateHydrated(
                        fn($component, $state) =>
                        $component->state(is_string($state) ? explode(',', $state) : $state)
                    ),
                FileUpload::make('images')
                    ->multiple()
                    ->image()
                    ->directory('merchandises')
                    ->maxFiles(5)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('idr'),
                Tables\Columns\TextColumn::make('stock'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListMerchandises::route('/'),
            'create' => Pages\CreateMerchandise::route('/create'),
            'edit' => Pages\EditMerchandise::route('/{record}/edit'),
        ];
    }
}
