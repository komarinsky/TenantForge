<?php

namespace App\Models;

use Filament\Models\Contracts\HasAvatar;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as TenantModel;

class Tenant extends TenantModel implements HasAvatar, TenantWithDatabase
{
    use HasDatabase, HasDomains;

    public function getFilamentAvatarUrl(): ?string
    {
        // TODO: Implement getFilamentAvatarUrl() method.
    }
}
