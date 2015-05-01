<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'VF.' . $_EXTKEY,
	'Ll',
	array(
		'InventoryItem' => 'list, show, new, create, edit, update, delete, loan, return',
		'Media' => 'list, show, new, create, edit, update',
		
	),
	// non-cacheable actions
	array(
		'InventoryItem' => 'create, update, delete, ',
		'Media' => 'create, update',
		
	)
);
