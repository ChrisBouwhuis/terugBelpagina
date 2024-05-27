<?php

namespace App\Filament\Resources\CallbackOrderResource\Pages;

use App\Filament\Resources\CallbackOrderResource;
use Filament\Actions;
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
}
