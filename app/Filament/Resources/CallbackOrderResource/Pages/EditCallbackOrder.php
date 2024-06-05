<?php

namespace App\Filament\Resources\CallbackOrderResource\Pages;

use App\Filament\Resources\CallbackOrderResource;
use App\Models\Assignment;
use App\Models\CallbackOrder;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCallbackOrder extends EditRecord
{
    protected static string $resource = CallbackOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
