<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers\PaymentsRelationManager;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Columns\ImageColumn;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Member List';
    protected static ?string $navigationGroup = 'Data Member';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Login')
                    ->schema([
                        Forms\Components\TextInput::make('user_name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255)
                            ->afterStateHydrated(
                                fn($component, $state, $record) =>
                                $component->state($record?->user?->name)
                            ),

                        Forms\Components\TextInput::make('user_email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->afterStateHydrated(
                                fn($component, $state, $record) =>
                                $component->state($record?->user?->email)
                            ),


                        Forms\Components\Select::make('user_role')
                            ->label('Role')
                            ->required()
                            ->options(['member' => 'Member', 'admin' => 'Admin'])
                            ->afterStateHydrated(
                                fn($component, $state, $record) =>
                                $component->state($record?->user?->role)
                            ),


                        Forms\Components\TextInput::make('user_password')
                            ->label('Password Baru (opsional)')
                            ->password()
                            ->nullable()
                            ->minLength(7),
                        // tidak disimpan ke tabel members
                    ]),

                Forms\Components\Section::make('Data Member')
                    ->schema([
                        Forms\Components\TextInput::make('phone')->required(),
                        Forms\Components\FileUpload::make('profile_photo')
                            ->image()
                            ->directory('profile')
                            ->required(),
                        Forms\Components\TextInput::make('ktp_sim')->required(),
                        Forms\Components\TextInput::make('birth_place'),
                        Forms\Components\DatePicker::make('birth_date')->required(),
                        Forms\Components\Textarea::make('address')->required(),
                        Forms\Components\Select::make('shirt_size')
                            ->options([
                                '-' => '-',
                                'S' => 'S',
                                'M' => 'M',
                                'L' => 'L',
                                'XL' => 'XL',
                                'XXL' => 'XXL',
                                'XXXL' => 'XXXL',
                            ])
                            ->required(),
                        Forms\Components\Select::make('vehicle_type')
                            ->options([
                                'R 80' => 'R 80',
                                'R 90' => 'R 90',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('vehicle_color'),
                        Forms\Components\TextInput::make('vehicle_year')->numeric()->required(),
                        Forms\Components\TextInput::make('license_plate')->required(),
                        Forms\Components\FileUpload::make('stnk_photo')
                            ->image()
                            ->directory('stnk')
                            ->required(),
                        Forms\Components\FileUpload::make('car_photo')
                            ->image()
                            ->directory('car')
                            ->nullable(),
                        Forms\Components\Textarea::make('reason'),
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'verified' => 'Verified',
                                'rejected' => 'Rejected',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('jabatan')->default('member'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('profile_photo')
                    ->label('Foto Profil')
                    ->circular(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')->label('No HP'),
                Tables\Columns\TextColumn::make('license_plate')->label('Plat Nomor'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'verified',
                        'danger' => 'rejected',
                    ]),
                Tables\Columns\TextColumn::make('jabatan')->label('Jabatan'),
            ])
            ->filters([])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            PaymentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
