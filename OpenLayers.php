<?php

if ( version_compare( $GLOBALS['wgVersion'], '1.26', '>=' ) ) {
	wfLoadExtension( 'OpenLayers' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['OpenLayers'] = __DIR__ . '/i18n';
	/* wfWarn(
		'Deprecated PHP entry point used for OpenLayers extension. ' .
		'Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	); */
	return;
}

$GLOBALS['wgExtensionCredits']['other'][] = array(
	'path' => __FILE__,
	'name' => 'OpenLayers',
	'version' => '1.0.0',
	'author' => array( 'Yaron Koren', 'Paladox', '...' ),
	'url' => 'https://www.mediawiki.org/wiki/Extension:OpenLayers',
	'descriptionmsg' => 'openlayers-desc',
	'license-name' => 'GPL-2.0+'
);

// Register client-side modules.
$openlayersResourceTemplate = array(
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'OpenLayers'
);
$GLOBALS['wgResourceModules'] += array(
	'ext.openlayers.main' => $openlayersResourceTemplate + array(
		'scripts' => array(
			'libs/OpenLayers/OpenLayers.js'
		),
	),
);
