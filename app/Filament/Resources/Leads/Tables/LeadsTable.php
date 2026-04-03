<?php
namespace App\Filament\Resources\Leads\Tables;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
class LeadsTable {
    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('gender')
                    ->searchable(),
                TextColumn::make('age')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('buyer.name')
                    ->label('Assigned Buyer')
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
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('date'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['date'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '=', $date),
                        );
                    }),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->defaultSort('id', 'desc')
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
