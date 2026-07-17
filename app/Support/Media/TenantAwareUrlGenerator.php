<?php

namespace App\Support\Media;

use Spatie\MediaLibrary\Support\UrlGenerator\DefaultUrlGenerator;

class TenantAwareUrlGenerator extends DefaultUrlGenerator
{
    public function getUrl(): string
    {
        if (! tenancy()->initialized) {
            return parent::getUrl();
        }

        return $this->versionUrl(tenant_asset($this->getUrlEncodedPathRelativeToRoot()));
    }
}
