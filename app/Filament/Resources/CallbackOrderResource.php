<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CallbackOrderResource\Pages;
use App\Filament\Resources\CallbackOrderResource\RelationManagers\UserRelationManager;
use App\Models\CallbackOrder;
use App\Models\User;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;


class CallbackOrderResource extends Resource
{
    protected static ?string $model = CallbackOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getPluralModelLabel() : string
    {
        return __('Callback orders');
    }

    public static function getNavigationLabel(): string
    {
        return __('Callback orders');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->columns(4)
            ->schema([
                // TODO remove buttons from form because it's read only
                Section::make()
                    ->columnSpan('full')
                    ->columns(4)
                    ->heading('Contact Information')
                    ->description('information about the person who made the callback request')
                    ->schema([
                        TextInput::make('name')
                            ->label(__('Name'))
                            ->readOnly()
                            ->columnSpan(['default' => 'full', 'lg' => '2'])
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->label(__('Telephone number'))
                            ->readOnly()
                            ->columnSpan(['default' => 'full', 'lg' => '2'])
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label(__('Email'))
                            ->readOnly()
                            ->columnSpan('full')
                            ->maxLength(255),
                        Textarea::make('comment')
                            ->label(__('Subject'))
                            ->readOnly()
                            ->columnSpan('full')
                            ->maxLength(255),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        try {
            return $table
                ->columns([
                    TextColumn::make('created_at')
                        ->label(__('Created at'))
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->dateTime()
                        ->sortable(),
                    TextColumn::make('updated_at')
                        ->label(__('Updated at'))
            //                    ->toggleable(isToggledHiddenByDefault: true)
                        ->dateTime()
                        ->sortable(),
                    TextColumn::make('user.name')
                        ->limit(12)
                        ->label(__('Assigned to'))
                        ->searchable()
                        ->sortable(),
                    TextColumn::make('phone')
                        ->label(__('Phone'))
                        ->searchable()
                        ->sortable(),
                    TextColumn::make('status')
                        ->label(__('Status'))
                        ->badge()
                        ->color(fn (CallbackOrder $record) => match ($record->status) {
                            'new' => 'gray',
                            'in progress' => 'warning',
                            'done' => 'success',
                        })
                        ->searchable()
                        ->sortable(),
                ])
                ->actions([
                    EditAction::make()
                        ->label(__('Go to order')),

                    // TODO fix relation
                    AttachAction::make()
                        ->label(__('Attach to user'))
                        ->color('primary')
                        ->icon('heroicon-o-link')
                        ->recordSelect(fn (Select $select) => $select
                            ->options(User::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required()
                        )
                ]);
        } catch (\Exception $e) {
            return $table;
        }
    }

    public static function getRelations(): array
    {
        return [
            CallbackOrderResource\RelationManagers\CommentRelationManager::class,
            CallbackOrderResource\RelationManagers\UserRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCallbackOrders::route('/'),
            'edit' => Pages\EditCallbackOrder::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }
}
