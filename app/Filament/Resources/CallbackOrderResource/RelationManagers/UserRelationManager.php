<?php

namespace App\Filament\Resources\CallbackOrderResource\RelationManagers;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserRelationManager extends RelationManager
{
    protected static string $relationship = 'Users';

    public function form(Form $form): Form
    {
        return $form
            ->schema(components: [
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name')),
                TextColumn::make('email')
                    ->label(__('Email')),
                TextColumn::make('pivot.created_at')
                    ->label(__('Created at'))])
            ->defaultSort('callback_order_user.created_at', 'desc')
            ->headerActions(actions: [
                AttachAction::make()
                    ->label(__('Attach to user'))
                    ->recordSelect(fn (Select $select) => $select
                        ->options(User::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required()
                    ),
            ]);
    }
}
