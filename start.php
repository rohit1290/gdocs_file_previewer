<?php

elgg_register_event_handler('init', 'system', 'gdocs_file_previewer_init');

function gdocs_file_previewer_init() {
	// We will create a special publicly accessible URL that Google Docs Viewer
	// can use to preview the file temporarily.
	elgg_register_plugin_hook_handler('public_pages', 'walled_garden', 'expages_public_pages');
}

function expages_public_pages($hook, $type, $return_value, $params) {
	$allowed_pages = array();
	$allowed_pages[] = 'gdocspreview/*.*/*.*';
	return $allowed_pages;
}

function gdocs_file_previewer_get_token($file, $timestamp) {
	if (!elgg_instanceof($file) || !is_numeric($timestamp)) {
		return false;
	}

	$secret = rand();
	return sha1($file->guid . $secret . $timestamp);
}


function gdocs_file_previewer_validate_token($token, $file, $timestamp) {
	return $token === gdocs_file_previewer_get_token($file, $timestamp);
}
