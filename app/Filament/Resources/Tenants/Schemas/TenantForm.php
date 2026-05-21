<?php

namespace App\Filament\Resources\Tenants\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TenantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),
                Repeater::make('domains')
                    ->relationship()
                    ->schema([
                        TextInput::make('domain')
                            ->label('Domain')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->label('Domains')
                    ->addActionLabel('Add domain')
                    ->columnSpanFull(),
            ]);
    }
}
