<?php
namespace App\Filament\Resources\LeadLogs\Schemas;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
class LeadLogInfolist {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextEntry::make('lead.name')->label('Lead'),
                TextEntry::make('buyer.name')->label('Buyer'),
                TextEntry::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'matched' => 'success',
                        'unmatched' => 'danger',
                    }),
                TextEntry::make('created_at')->dateTime(),
                RepeatableEntry::make('meta') // 'meta' is your array field
                ->schema([
                    TextEntry::make('field'),
                    TextEntry::make('value'),
                    TextEntry::make('result'),
                ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
