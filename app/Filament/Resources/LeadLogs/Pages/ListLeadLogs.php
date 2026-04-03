<?php
namespace App\Filament\Resources\LeadLogs\Pages;
use App\Filament\Resources\LeadLogs\LeadLogResource;
use Filament\Resources\Pages\ListRecords;
class ListLeadLogs extends ListRecords {
    protected static string $resource = LeadLogResource::class;
    protected function getHeaderActions(): array {
        return [
            //CreateAction::make(),
        ];
    }
}
