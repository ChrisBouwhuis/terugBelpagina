<?php

namespace App\Filament\Resources\CallbackOrderResource\RelationManagers;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use function Laravel\Prompts\select;

class ConnectionRelationManager extends RelationManager
{
    protected static string $relationship = 'Connection';
    protected static string $navigation = 'Connection History';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
//                //pluk users so we can select who it needs to be assigned to
//                Select::make('author_id')
//                    ->label('Author')
//                    ->options(User::all()->pluck('name', 'id'))
//                    ->searchable()
//                    ->required()
//                ,
                select::make('user_id')
                    ->label('User')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ConnectionHistory')
            ->heading(__('Connection History'))
            ->columns(components: [
                TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()

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
