<?php
namespace App\Filament\Resources\Leads\Schemas;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
class LeadInfolist {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('gender'),
                TextEntry::make('age')
                    ->numeric(),
                TextEntry::make('buyer.name')
                    ->label('Assigned Buyer')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'matched' => 'success',
                        'unmatched' => 'danger',
                    }),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
