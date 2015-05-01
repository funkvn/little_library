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
 * @author Valentin Funk <valentin.funk@gmail.com>
 */

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_littlelibrary_domain_model_media'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_littlelibrary_domain_model_media']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, title, sub_title, publication_date, persons, type, inventory_item, publisher',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, title, sub_title, publication_date, persons, type, inventory_item, publisher, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		//
		// Domain model properties
		//
		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_media.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'sub_title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_media.sub_title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'persons' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_media.persons',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_littlelibrary_domain_model_person_assignment',
				'MM' => 'tx_littlelibrary_media_person_assignment_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_littlelibrary_domain_model_person_assignment',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'publication_date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_media.publication_date',
			'config' => array(
				'dbType' => 'date',
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 0,
				'default' => '0000-00-00'
			),
		),
		'publisher' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_media.publisher',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_littlelibrary_domain_model_publisher',
				'foreign_field' => 'media',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_media.type',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_littlelibrary_domain_model_mediatype',
				'foreign_field' => 'media',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'inventory_items' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_media.inventory_item',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_littlelibrary_domain_model_inventory_item',
				'foreign_field' => 'media',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
	),
);