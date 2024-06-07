<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CallbackOrderResource\Pages;
use App\Models\CallbackOrder;
use App\Models\User;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

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
                Select::make('user_id')
                    ->label(__('Assign to'))
                    ->columnSpan(['default' => 'full', 'lg' => '2'])
                    ->options(User::all()->pluck('name', 'id')->toArray())
                    ->placeholder('No user assigned')
                    ->searchable(),
                Select::make('status')
                    ->columnSpan(['default' => 'full', 'lg' => '2'])
                    ->options([
                        'new' => __('New'),
                        'in progress' => __('In progress'),
                        'done' => __('Done'),
                    ])
                    ->placeholder(__('Select a status'))
                    ->required(),
                RichEditor::make('companyComment')
                    ->label(__('Company comment'))
                    ->columnSpan('full')
                    ->toolbarButtons(['undo', 'redo', 'bold', 'italic', 'underline', 'strike', 'link', 'heading', 'numberedList', 'bulletedList', 'alignment', 'indent', 'outdent', 'codeBlock', 'code', 'table', 'image', 'video', 'fullScreen', 'removeFormat'])
                    ->placeholder(__('Internal comment')),
            ]);
    }

    public static function table(Table $table): Table
    {
        try {
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make('created_at')
                        ->label(__('Created at'))
//                        ->toggleable(isToggledHiddenByDefault: true)
                        ->dateTime()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('updated_at')
                        ->label(__('Updated at'))
                        //                    ->toggleable(isToggledHiddenByDefault: true)
                        ->dateTime()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('user.name')
                        ->label(__('Assigned to'))
                        ->searchable()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('status')
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
                ->filters([
                    Filter::make('is_not_done')
                        ->label(__('Not finished'))
                        ->query(function (EloquentBuilder $query) {
                            $query->where('status', 'not like', 'done');
                        })
                        ->default(true),
                    Filter::make('is_assigned_to_me')
                        ->label(__('Assigned to me'))
                        ->query(function (EloquentBuilder $query) {
                            $query->where('user_id', auth()->id());
                        })
                        ->default(true),
                    Filter::make('is_done')
                        ->label(__('Finished'))
                        ->query(function (EloquentBuilder $query) {
                            $query->where('status', 'done');
                        }),
                ])
                ->actions([
                    Tables\Actions\EditAction::make()
                        ->label(__('Assign'))
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

    public static function canCreate(): bool
    {
        return false;
    }
}
