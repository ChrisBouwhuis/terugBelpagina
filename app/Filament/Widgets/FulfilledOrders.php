<?php

namespace App\Filament\Widgets;
use App\Models\CallbackOrder;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB; // Add this line

class FulfilledOrders extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'labels' => [__('Completed'),__( 'In progress'), __('new')],
            'datasets' => [
                [
                    'data' => $this->getStatusData(),
                    'backgroundColor' => [
                        'rgba(30, 252, 10, 0.5)',
                        'rgba(245, 255, 56, 0.5)',
                        'rgba(52, 52, 209, 0.5)',
                    ],
                    'borderColor' => [
                        'rgba(30, 252, 20, 1)',
                        'rgba(245, 255, 70, 1)',
                        'rgba(52, 52, 255, 1)',
                    ],
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getStatusData(): array
    {
        return CallbackOrder::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->values() // Reset the keys of the collection
            ->toArray();
    }
}
