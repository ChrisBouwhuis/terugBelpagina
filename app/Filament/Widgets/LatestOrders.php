<?php

namespace App\Filament\Widgets;

use App\Models\CallbackOrder;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->searchable(false)
            ->query(CallbackOrder::query()->latest()->limit(5))
            ->columns([
                Stack::make([
                    TextColumn::make('name')
                        ->size('lg')
                        ->weight(FontWeight::ExtraBold),
                    TextColumn::make('comment')
                        ->weight(FontWeight::ExtraLight),
                ]),
            ]);
    }
}
