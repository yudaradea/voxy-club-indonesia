<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventScheduleResource\Pages;
use App\Models\EventSchedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventScheduled;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Str;

class EventScheduleResource extends Resource
{
    protected static ?string $model = EventSchedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Event Page';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\TextInput::make('title')->required()->maxLength(255)->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                        Forms\Components\Hidden::make('slug')
                            ->required(),
                        Forms\Components\RichEditor::make('description')->required(),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('events-schedules')
                            ->nullable(),
                        Forms\Components\Toggle::make('featured')
                            ->label('Tampilkan sebagai Featured'),
                    ]),

                Forms\Components\Section::make('Waktu & Lokasi')
                    ->schema([
                        Forms\Components\DateTimePicker::make('start_date')->required(),
                        Forms\Components\DateTimePicker::make('end_date')->nullable(),
                        Forms\Components\TextInput::make('location')
                            ->label('Lokasi Event')
                            ->required(),
                        Forms\Components\TextInput::make('maps')->required(),

                    ]),

                Forms\Components\Section::make('Status & Preview')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'upcoming' => 'Upcoming',
                                'ongoing' => 'Ongoing',
                                'past' => 'Past',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('upcoming'),
                        Forms\Components\Placeholder::make('preview_email')
                            ->label('Preview Email')
                            ->content(fn($record) => $record ? view('filament.components.email-preview', ['event' => $record]) : null)
                            ->columnSpanFull()
                            ->hidden(fn($record) => $record === null), // <-- sembunyikan saat create
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('image')->circular(),
                TextColumn::make('title')->searchable(),
                TextColumn::make('start_date')->dateTime(),
                BadgeColumn::make('status')
                    ->colors([
                        'primary' => 'upcoming',
                        'success' => 'ongoing',
                        'danger' => 'cancelled',
                        'secondary' => 'past',
                    ]),
                ToggleColumn::make('featured')->label('Featured'),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    Action::make('resendEmail')
                        ->label('Kirim Ulang Email')
                        ->icon('heroicon-o-paper-airplane')
                        ->color('success')
                        ->modalHeading('Preview Email')
                        ->modalContent(fn($record) => view('filament.components.email-preview-modal', ['event' => $record]))
                        ->action(function (EventSchedule $record) {
                            $verifiedMembers = \App\Models\Member::where('status', 'verified')->get();
                            foreach ($verifiedMembers as $member) {
                                Mail::to($member->user->email)->send(new EventScheduled($record, $member));
                            }
                            Notification::make()
                                ->title('Email berhasil dikirim ulang!')
                                ->success()
                                ->send();
                        }),
                    DeleteAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventSchedules::route('/'),
            'create' => Pages\CreateEventSchedule::route('/create'),
            'edit' => Pages\EditEventSchedule::route('/{record}/edit'),
        ];
    }
}
