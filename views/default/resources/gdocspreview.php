<?php
// Read the URI parameters based on <siteurl>/gdocspreview/param1/param2
$file_guid = elgg_extract('guid', $vars, 0);
$token = elgg_extract('token', $vars, 0);
$timestamp = intval(elgg_extract('timestamp', $vars, 0));

elgg_call(ELGG_IGNORE_ACCESS, function() use ($file_guid, $token, $timestamp) {
	$file = get_entity($file_guid);
	if (!($file instanceof \ElggFile)) {
		register_error(elgg_echo("file:downloadfailed"));
		forward();
	}

	// validate timestamp
	$date = new DateTime();
	$diff = $date->format('U') - $timestamp;
	$timeout = (int) elgg_get_plugin_setting('timeout', 'gdocs_file_previewer');
	if ($timeout === 0) {
		$timeout = 180; // 3 min is plenty for a default
	}

	if ($diff > $timeout) {
		register_error(elgg_echo("file:downloadfailed"));
		forward();
	}

	// validate token
	if (!gdocs_file_previewer_validate_token($token, $file, $timestamp)) {
		register_error(elgg_echo("file:downloadfailed"));
		forward();
	}

	$mime = $file->getMimeType();
	if (!$mime) {
		$mime = "application/octet-stream";
	}
	$filename = $file->originalfilename;
	// fix for IE https issue
	header("Pragma: public");
	header("Content-type: $mime");
	if (strpos($mime, "image/") !== false || $mime == "application/pdf") {
		header("Content-Disposition: inline; filename=\"$filename\"");
	} else {
		header("Content-Disposition: attachment; filename=\"$filename\"");
	}
	ob_clean();
	flush();
	readfile($file->getFilenameOnFilestore());
});
	