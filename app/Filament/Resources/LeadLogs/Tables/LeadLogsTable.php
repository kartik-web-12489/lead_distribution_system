<?php
namespace App\Filament\Resources\LeadLogs\Tables;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
class LeadLogsTable {
    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('lead.name')
                    ->label('Lead')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('buyer.name')
                    ->label('Buyer')
                    ->placeholder('Unmatched'),
                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'pending' => 'warning',
                        'success' => 'matched',
                        'danger' => 'unmatched',
                    ]),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'matched' => 'Matched',
                        'unmatched' => 'Unmatched',
                    ]),
                SelectFilter::make('buyer')
                    ->relationship('buyer', 'name'),
            ])
            ->recordActions([
                ViewAction::make(),
                //EditAction::make(),
            ])
            ->defaultSort('created_at', 'desc')
            ->toolbarActions([
                /*BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),*/
            ]);
    }
}
