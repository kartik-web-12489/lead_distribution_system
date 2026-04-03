<?php
namespace App\Filament\Resources\Leads\Schemas;
use App\Models\Buyer;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
class LeadForm {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                Select::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                        'other' => 'Other',
                    ])
                    ->required(),
                TextInput::make('age')
                    ->required()
                    ->numeric(),
                Select::make('buyer_id')
                    ->label('Buyer')
                    ->options(Buyer::query()->pluck('name', 'id'))
                    ->required(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'matched' => 'Matched',
                        'unmatched' => 'Unmatched',
                    ])
                    ->required(),
            ]);
    }
}
