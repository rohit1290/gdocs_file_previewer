<?php

return [
	'routes' => [
		'default:object:gdocspreview' => [
			'path' => '/gdocspreview/{guid}/{token}/{timestamp?}',
			'resource' => 'gdocspreview',
		],
	],
];
