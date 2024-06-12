<?php

namespace App\Filament\Resources\CallbackOrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentRelationManager extends RelationManager
{
    protected static string $relationship = 'Comments';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
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
                Tables\Columns\TextColumn::make('Comments'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
