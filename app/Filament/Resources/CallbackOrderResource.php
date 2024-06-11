<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CallbackOrderResource\Pages;
use App\Models\CallbackOrder;
use App\Models\Connection;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


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
//                        ->toggleable(isToggledHiddenByDefault: true)
                        ->dateTime()
                        ->sortable(),
                    TextColumn::make('updated_at')
                        ->label(__('Updated at'))
            //                    ->toggleable(isToggledHiddenByDefault: true)
                        ->dateTime()
                        ->sortable(),
//                    TextColumn::make('user.name')
//                        ->label(__('Assigned to'))
//                        ->searchable()
//                        ->sortable(),
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
//                ->filters([
//                ])
                ->actions([
                    Tables\Actions\EditAction::make()
                        ->label(__('Go to order'))
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make(),
                    ]),
                ]);
        } catch (\Exception $e) {
            return $table;
        }
    }

    public static function getRelations(): array
    {
        return [
            CallbackOrderResource\RelationManagers\UserRelationManager::class,
            CallbackOrderResource\RelationManagers\CommentRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCallbackOrders::route('/'),
            'create' => Pages\CreateCallbackOrder::route('/create'),
            'edit' => Pages\EditCallbackOrder::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
