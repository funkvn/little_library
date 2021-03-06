<?php
/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/*
 * Database and extension configuration
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

// Register the plugin
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'll',
	'Little Library'
);

// Add static TypoScript
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Little Library');

// Configure the database tables
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_littlelibrary_domain_model_inventory_item', 'EXT:little_library/Resources/Private/Language/locallang_csh_tx_littlelibrary_domain_model_inventory_item.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_littlelibrary_domain_model_inventory_item');
$GLOBALS['TCA']['tx_littlelibrary_domain_model_inventory_item'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_inventory_item',
		'label' => 'shelf_mark',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'shelf_mark,media,loans,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/InventoryItem.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_littlelibrary_domain_model_inventory_item.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_littlelibrary_domain_model_media', 'EXT:little_library/Resources/Private/Language/locallang_csh_tx_littlelibrary_domain_model_media.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_littlelibrary_domain_model_media');
$GLOBALS['TCA']['tx_littlelibrary_domain_model_media'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_media',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,sub_title,publication_date,persons,type,inventory_items,publisher,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Media.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_littlelibrary_domain_model_media.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_littlelibrary_domain_model_person', 'EXT:little_library/Resources/Private/Language/locallang_csh_tx_littlelibrary_domain_model_person.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_littlelibrary_domain_model_person');
$GLOBALS['TCA']['tx_littlelibrary_domain_model_person'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_person',
		'label' => 'last_name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'first_name,last_name,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Person.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_littlelibrary_domain_model_person.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_littlelibrary_domain_model_person_assignment', 'EXT:little_library/Resources/Private/Language/locallang_csh_tx_littlelibrary_domain_model_person_assignment.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_littlelibrary_domain_model_person_assignment');
$GLOBALS['TCA']['tx_littlelibrary_domain_model_person_assignment'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_person_assignment',
		'label' => 'person',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'type,person,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/PersonAssignment.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_littlelibrary_domain_model_person_assignment.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_littlelibrary_domain_model_person_type', 'EXT:little_library/Resources/Private/Language/locallang_csh_tx_littlelibrary_domain_model_person_type.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_littlelibrary_domain_model_person_type');
$GLOBALS['TCA']['tx_littlelibrary_domain_model_person_type'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_person_type',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/PersonType.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_littlelibrary_domain_model_person_type.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_littlelibrary_domain_model_media_type', 'EXT:little_library/Resources/Private/Language/locallang_csh_tx_littlelibrary_domain_model_media_type.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_littlelibrary_domain_model_media_type');
$GLOBALS['TCA']['tx_littlelibrary_domain_model_media_type'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_media_type',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/MediaType.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_littlelibrary_domain_model_media_type.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_littlelibrary_domain_model_loan', 'EXT:little_library/Resources/Private/Language/locallang_csh_tx_littlelibrary_domain_model_loan.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_littlelibrary_domain_model_loan');
$GLOBALS['TCA']['tx_littlelibrary_domain_model_loan'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_loan',
		'label' => 'period_from',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'period_from,period_to,library_user,inventory_item,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Loan.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_littlelibrary_domain_model_loan.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_littlelibrary_domain_model_publisher', 'EXT:little_library/Resources/Private/Language/locallang_csh_tx_littlelibrary_domain_model_publisher.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_littlelibrary_domain_model_publisher');
$GLOBALS['TCA']['tx_littlelibrary_domain_model_publisher'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_publisher',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Publisher.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_littlelibrary_domain_model_publisher.gif'
	),
);