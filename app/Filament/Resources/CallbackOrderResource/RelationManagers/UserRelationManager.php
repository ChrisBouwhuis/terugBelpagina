<?php

namespace App\Filament\Resources\CallbackOrderResource\RelationManagers;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use function Laravel\Prompts\text;

class UserRelationManager extends RelationManager
{
    protected static string $relationship = 'User';

    public function form(Form $form): Form
    {
        return $form
            ->schema(components: [
                select::make('user')
                    ->label('User')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('assigned_at'),
            ])
            ->filters([
                //
            ])
            ->headerActions(actions: [
                AttachAction::make()
                    ->label(__('Attach to User'))
                    ->recordSelect(fn (Select $select) => $select
                        ->options(User::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required()
                    ),
            ])
            ->actions([
            ])
            ->bulkActions([
            ]);
    }
}
