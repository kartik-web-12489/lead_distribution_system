<?php
namespace App\Filament\Resources\Buyers\Schemas;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
class BuyerForm {
    public static function configure(Schema $schema): Schema {
        return $schema->components([
            TextInput::make('name')->required(),
            TextInput::make('priority')
                ->numeric()
                ->required(),
            Section::make('Rules Builder')
                ->description('Define matching conditions')
                ->columnSpanFull()
                ->schema([
                    Repeater::make('rules')
                        ->relationship()
                        ->schema([
                            Select::make('field')
                                ->options([
                                    'gender' => 'Gender',
                                    'age' => 'Age',
                                ])
                                ->required(),
                            Select::make('operator')
                                ->options([
                                    '=' => '=',
                                    '!=' => '!=',
                                    '>' => '>',
                                    '<' => '<',
                                    '>=' => '>=',
                                    '<=' => '<=',
                                ])
                                ->required(),
                            TextInput::make('value')
                                ->required(),
                        ])
                        ->columns(3)
                        ->addActionLabel('Add Rule'),
                ])
        ]);
    }
}
