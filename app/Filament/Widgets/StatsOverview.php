<?php
namespace App\Filament\Widgets;
use App\Models\Lead;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
class StatsOverview extends BaseWidget {
    protected static ?int $sort = 1;
    protected function getStats(): array {
        return [
            Stat::make('Total Leads', Lead::count()),
            Stat::make('Matched Leads',
                Lead::where('status', 'matched')->count()
            )
                ->color('success'),
            Stat::make('Unmatched Leads',
                Lead::where('status', 'unmatched')->count()
            )
                ->color('danger'),
        ];
    }
}
