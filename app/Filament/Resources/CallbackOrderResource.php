<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CallbackOrderResource\Pages;
use App\Filament\Resources\CallbackOrderResource\RelationManagers;
use App\Models\CallbackOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CallbackOrderResource extends Resource
{
    protected static ?string $model = CallbackOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('comment')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->default('new'),
                Forms\Components\TextInput::make('department')
                    ->maxLength(255)
                    ->default('sales'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
//                Tables\Columns\TextColumn::make('email')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('comment')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
//                Tables\Columns\TextColumn::make('department')
//                    ->searchable(),
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
            'index' => Pages\ListCallbackOrders::route('/'),
            'create' => Pages\CreateCallbackOrder::route('/create'),
            'edit' => Pages\EditCallbackOrder::route('/{record}/edit'),
        ];
    }
}
