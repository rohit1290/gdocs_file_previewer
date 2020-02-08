<?php 

function expages_public_pages() {
	$allowed_pages = [];
	$allowed_pages[] = 'gdocspreview/*.*/*.*';
	return $allowed_pages;
}

function gdocs_file_previewer_get_token($file, $timestamp) {
	if (!$file instanceof ElggFile || !is_numeric($timestamp)) {
		return false;
	}

	return sha1($file->guid . $timestamp);
}


function gdocs_file_previewer_validate_token($token, $file, $timestamp) {
	return $token === gdocs_file_previewer_get_token($file, $timestamp);
}