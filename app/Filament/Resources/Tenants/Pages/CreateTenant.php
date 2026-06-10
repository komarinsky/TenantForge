<?php

namespace App\Filament\Resources\Tenants\Pages;

use App\Filament\Resources\Tenants\TenantResource;
use App\Models\Post;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;

class CreateTenant extends CreateRecord
{
    protected static string $resource = TenantResource::class;

    protected array $adminData = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->adminData = [
            'name' => $data['admin_name'],
            'email' => $data['admin_email'],
            'password' => $data['admin_password'],
        ];

        unset($data['admin_name'], $data['admin_email'], $data['admin_password']);

        return $data;
    }

    protected function afterCreate(): void
    {
        $this->record->run(function (): void {
            User::create($this->adminData);

            Post::factory()->count(3)->create();
        });
    }
}
