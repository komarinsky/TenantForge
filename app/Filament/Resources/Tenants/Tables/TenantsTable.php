<?php

namespace App\Filament\Resources\Tenants\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TenantsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable(query: fn (Builder $query, string $search): Builder => $query->where('data->name', 'like', "%{$search}%"))
                    ->sortable(query: fn (Builder $query, string $direction): Builder => $query->orderBy('data->name', $direction)),
                TextColumn::make('id')
                    ->label('ID')
                    ->badge()
                    ->copyable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('domains.domain')
                    ->label('Domains')
                    ->badge()
                    ->placeholder('—'),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // Deleting a tenant fires TenantDeleted, which drops its database.
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
