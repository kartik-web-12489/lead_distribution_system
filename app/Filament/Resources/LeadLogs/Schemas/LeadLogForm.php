<?php
namespace App\Filament\Resources\LeadLogs\Schemas;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
class LeadLogForm {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('lead_id')
                    ->required()
                    ->numeric(),
                TextInput::make('buyer_id')
                    ->numeric(),
                TextInput::make('status')
                    ->required(),
                Textarea::make('meta'),
            ]);
    }
}
