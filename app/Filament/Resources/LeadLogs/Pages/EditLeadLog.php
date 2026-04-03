<?php
namespace App\Filament\Resources\LeadLogs\Pages;
use App\Filament\Resources\LeadLogs\LeadLogResource;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
class EditLeadLog extends EditRecord {
    protected static string $resource = LeadLogResource::class;
    protected function getHeaderActions(): array {
        return [
            ViewAction::make(),
            //DeleteAction::make(),
        ];
    }
}
