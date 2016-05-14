<?php

require(dirname(dirname(APPPATH)) . '/vendor/autoload.php');

$config['app'] = array(
	// 'route' => '',
	// 'dir' => '',
	// 'namespace' => '',
	// 'excluded' => array(),
);
$config['lib'] = array(
	'core' => array(
		'language' => 'en',
		'encoding' => 'UTF-8',
		'request' => array(
			'uri' => 'codeigniter/xajax/process',
		),
		'prefix' => array(
			'class' => '',
		),
		'debug' => array(
			'on' => false,
			'verbose' => false,
		),
		'error' => array(
			'handle' => false,
		),
	),
	'js' => array(
		'lib' => array(
			// 'uri' => '',
		),
		'app' => array(
			// 'uri' => '',
			// 'dir' => '',
			'export' => false,
			'minify' => false,
			'options' => '',
		),
	),
	'toastr' => array(
		'options' => array(
			'closeButton' => true,
			'positionClass' => 'toast-bottom-right'
		),
	),
);
