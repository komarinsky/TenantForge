<?php

namespace App\Filament\Resources\Tenants\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
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
                Section::make('Tenant admin')
                    ->description('The first user, created inside the tenant database. They can log in at the tenant panel (/app on the tenant domain).')
                    ->visibleOn('create')
                    ->schema([
                        TextInput::make('admin_name')
                            ->label('Admin name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('admin_email')
                            ->label('Admin email / login')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('admin_password')
                            ->label('Admin password')
                            ->password()
                            ->revealable()
                            ->required()
                            ->minLength(8)
                            ->maxLength(255),
                    ]),
            ]);
    }
}
