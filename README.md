GridFieldAjaxRefresh
=================

Adds the ability to either automatically or manually refresh a SilverStripe GridField

## Requirements
* SilverStripe 4.x

## Installation
```bash
composer require silverstripe/gridfieldajaxrefresh
```

After you install the package make sure to run a dev build

## Usage

### Single Gridfield
To add grid refreshing to a Gridfield, first get it's config, and then add the `GridFieldAjaxRefresh` component. Then configure the component for either automatic and manual refreshing.

**Automatic refreshing** - Hides the refresh button and triggers the refresh at a specific interval (in milliseconds):
```php
use Silverstripe\GridfieldAjaxRefresh\Forms\GridField\GridFieldAjaxRefresh;

$gridfieldConfig = $yourGridfield->getConfig();
$gridfieldConfig->addComponents(
	new GridFieldAjaxRefresh(30000, true) # Refresh the grid every 30 seconds
);
```

**Manual refreshing** - Creates a button to trigger the refresh
```php
use Silverstripe\GridfieldAjaxRefresh\Forms\GridField\GridFieldAjaxRefresh;

$gridfieldConfig = $yourGridfield->getConfig();
$gridfieldConfig->addComponents(
	new GridFieldAjaxRefresh(1000, false)
);
```

### All Gridfields
If you would like to add the `GridFieldAjaxRefresh` component to all Gridfields*
at once, you can apply the provided extensions to the Base and Record Editor config
classes like so:

config.yml
```yaml
SilverStripe\Forms\GridField\GridFieldConfig_Base:
  extensions:
    - Silverstripe\GridfieldAjaxRefresh\Extensions\GridFieldBaseConfigExtension

SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor:
  extensions:
    - Silverstripe\GridfieldAjaxRefresh\Extensions\GridFieldRecordEditorConfigExtension
```

By default, manual refresh buttons are added to all Gridfields*. If you want to use the automatic refresh feature instead, add the following configuration as well:
```yaml
Silverstripe\GridfieldAjaxRefresh\Forms\GridField\GridFieldAjaxRefresh:
  auto_refresh_enabled: true
  auto_refresh_interval: 180000 # Interval defaults to 3 minutes (180000ms = 180s = 3min)
```

**\*** "All Gridfields" can be expanded to "all Gridfields that use the `GridFieldConfig_RecordEditor` class or a config class that extends `GridFieldConfig_Base`". In most Silverstripe installs that will be all the Gridfields