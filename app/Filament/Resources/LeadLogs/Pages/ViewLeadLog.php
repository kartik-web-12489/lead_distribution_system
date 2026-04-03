<?php
namespace App\Filament\Resources\LeadLogs\Pages;
use App\Filament\Resources\LeadLogs\LeadLogResource;
use Filament\Resources\Pages\ViewRecord;
class ViewLeadLog extends ViewRecord {
    protected static string $resource = LeadLogResource::class;
    protected function getHeaderActions(): array {
        return [
            //EditAction::make(),
        ];
    }
}
