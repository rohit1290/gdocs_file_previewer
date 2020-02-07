<?php
require_once(__DIR__ . "/lib/functions.php");

return [
	'bootstrap' => GdocsFilePreviewer::class,
	'routes' => [
		'default:object:gdocspreview' => [
			'path' => '/gdocspreview/{guid}/{token}/{timestamp?}',
			'resource' => 'gdocspreview',
		],
	],
];
