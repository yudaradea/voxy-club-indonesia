<?php

namespace App\Filament\Resources\MemberResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\RawJs;

class PaymentsRelationManager extends RelationManager
{
    protected static string $relationship = 'payments';
    protected static ?string $recordTitleAttribute = 'member_id';

    public function form(Form $form): Form // ❌ jangan static
    {
        return $form->schema([
            Forms\Components\TextInput::make('amount')
                ->required()
                ->prefix('Rp')
                ->mask(RawJs::make('$money($input)'))
                ->stripCharacters(',')
                ->numeric(),
            Forms\Components\Textarea::make('notes'),
            Forms\Components\DatePicker::make('paid_at'),
            Forms\Components\FileUpload::make('proof_image')
                ->image()
                ->disk('public')
                ->directory('payment_proofs')
                ->nullable(),
        ]);
    }

    public function table(Table $table): Table // ❌ jangan static
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('amount')->money('idr'),
                Tables\Columns\TextColumn::make('notes')->limit(250),
                Tables\Columns\TextColumn::make('paid_at')->date(),
                Tables\Columns\ImageColumn::make('proof_image'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
