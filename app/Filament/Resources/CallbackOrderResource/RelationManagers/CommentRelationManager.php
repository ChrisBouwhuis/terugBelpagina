<?php

namespace App\Filament\Resources\CallbackOrderResource\RelationManagers;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class CommentRelationManager extends RelationManager
{
    protected static string $relationship = 'Comments';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // TODO Find a way to make this read only and make it only show the user who is currently logged in
                Forms\Components\Select::make('user_id')
                    ->label('Name')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->columnSpan('2'),
                Forms\Components\RichEditor::make('comment')
                    ->label('Comment')
                    ->columnSpan('full')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Comments')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('Name of User')),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created at')),
            ])
            ->defaultSort('created_at', 'desc')
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Add Comment')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
