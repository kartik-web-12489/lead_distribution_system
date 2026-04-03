<?php
namespace App\Filament\Resources\Buyers\Schemas;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
class BuyerInfolist {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('priority')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
