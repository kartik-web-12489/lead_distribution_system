<?php
namespace App\Filament\Resources\Buyers\Pages;
use App\Filament\Resources\Buyers\BuyerResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
class ViewBuyer extends ViewRecord {
    protected static string $resource = BuyerResource::class;
    protected function getHeaderActions(): array {
        return [
            EditAction::make(),
        ];
    }
}
