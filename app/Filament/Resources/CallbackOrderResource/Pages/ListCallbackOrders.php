<?php

namespace App\Filament\Resources\CallbackOrderResource\Pages;

use App\Filament\Resources\CallbackOrderResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListCallbackOrders extends ListRecords
{
    protected static string $resource = CallbackOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make(__('All')),
            'new' => Tab::make(__('New')) -> query(fn ($query) => $query->where('status', 'new')),
            'in_progress' => Tab::make(__('In Progress')) -> query(fn ($query) => $query->where('status', 'In progress')),
//            'in progress and assigned to me' => Tab::make(__('In Progress and Assigned to Me')) -> query(fn ($query) => $query->where('status', 'In progress')->where('user_id', auth()->id())),
            'completed' => Tab::make(__('Done')) -> query(fn ($query) => $query->where('status', 'Done')),
        ];
    }
}
