<?php

namespace Silverstripe\GridfieldAjaxRefresh\Extensions;

use SilverStripe\Core\Config\Config;
use SilverStripe\Core\Extension;
use Silverstripe\GridfieldAjaxRefresh\Forms\GridField\GridFieldAjaxRefresh;

/**
 * Automatically integrates the ajax refresh button into the Base {@link GridField} config
 */
class GridFieldBaseConfigExtension extends Extension
{
    public function updateConfig()
    {
        $this->owner->addComponent(
            new GridFieldAjaxRefresh(
                Config::inst()->get(GridFieldAjaxRefresh::class, 'auto_refresh_interval'),
                Config::inst()->get(GridFieldAjaxRefresh::class, 'auto_refresh_enabled')
            )
        );
    }
}
