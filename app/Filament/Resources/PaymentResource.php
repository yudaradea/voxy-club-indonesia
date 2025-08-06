<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Models\Payment;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Contracts\View\View;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Payment';
    protected static ?string $navigationGroup = 'Data Member';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('member_id')
                    ->label('Nama Member')
                    ->relationship(
                        name: 'member',
                        titleAttribute: 'user.name', // ini yang bikin bisa search by nama user
                        modifyQueryUsing: fn($query) => $query->with('user') // eager load user
                    )
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->user->name} ({$record->license_plate})")
                    ->preload()
                    ->searchable()
                    ->required(),
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

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('member.user.name')->label('Nama Member'),
                TextColumn::make('amount')->money('idr'),
                TextColumn::make('paid_at')->date(),
                ImageColumn::make('proof_image')
                    ->action(
                        Action::make('Lihat Gambar')
                            ->modalHeading('Lihat Gambar')
                            ->modalContent(fn($record): View => view(
                                'filament.modals.view-image', // Buat file view ini
                                ['imageUrl' => $record->proof_image]
                            ))
                            ->modalSubmitAction(false) // Tombol submit tidak diperlukan
                            ->modalCancelAction(false), // Tombol cancel juga tidak perlu
                    ),
            ])
            ->filters([])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
