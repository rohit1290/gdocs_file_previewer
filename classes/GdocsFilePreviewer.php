<?php
use Elgg\DefaultPluginBootstrap;

class GdocsFilePreviewer extends DefaultPluginBootstrap {

  public function init() {
  	// We will create a special publicly accessible URL that Google Docs Viewer
  	// can use to preview the file temporarily.
  	elgg_register_plugin_hook_handler('public_pages', 'walled_garden', 'expages_public_pages');
  }
}