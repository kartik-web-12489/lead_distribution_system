<?php
namespace App\Filament\Resources\LeadLogs;
use App\Filament\Resources\LeadLogs\Pages\CreateLeadLog;
use App\Filament\Resources\LeadLogs\Pages\EditLeadLog;
use App\Filament\Resources\LeadLogs\Pages\ListLeadLogs;
use App\Filament\Resources\LeadLogs\Pages\ViewLeadLog;
use App\Filament\Resources\LeadLogs\Schemas\LeadLogForm;
use App\Filament\Resources\LeadLogs\Schemas\LeadLogInfolist;
use App\Filament\Resources\LeadLogs\Tables\LeadLogsTable;
use App\Models\LeadLog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
class LeadLogResource extends Resource {
    protected static ?string $model = LeadLog::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClock;
    protected static ?string $recordTitleAttribute = 'Lead Logs';
    protected static ?int $navigationSort = 3;
    public static function form(Schema $schema): Schema {
        return LeadLogForm::configure($schema)->disabled();
    }
    public static function infolist(Schema $schema): Schema {
        return LeadLogInfolist::configure($schema);
    }
    public static function table(Table $table): Table {
        return LeadLogsTable::configure($table);
    }
    public static function getRelations(): array {
        return [
            //
        ];
    }
    public static function getPages(): array {
        return [
            'index' => ListLeadLogs::route('/'),
            'create' => CreateLeadLog::route('/create'),
            'view' => ViewLeadLog::route('/{record}'),
            'edit' => EditLeadLog::route('/{record}/edit'),
        ];
    }
}
