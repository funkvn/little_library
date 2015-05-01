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

$GLOBALS['TCA']['tx_littlelibrary_domain_model_inventory_item'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_littlelibrary_domain_model_inventory_item']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, shelf_mark, media, loans',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, shelf_mark, media, loans, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
		'shelf_mark' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_inventory_item.shelf_mark',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'media' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_inventory_item.media',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_littlelibrary_domain_model_media',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'loans' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_inventory_item.loans',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_littlelibrary_domain_model_loan',
				'foreign_field' => 'inventoryitem',
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