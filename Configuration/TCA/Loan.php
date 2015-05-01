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

$GLOBALS['TCA']['tx_littlelibrary_domain_model_loan'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_littlelibrary_domain_model_loan']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, period_from, period_to, library_user, inventory_item',
	),
	'types' => array(
		'1' => array('showitem' => 'inventory_item, period_from, period_to, library_user, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
		'inventory_item' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_loan.inventory_item',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_littlelibrary_domain_model_inventory_item',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'period_from' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_loan.period_from',
			'config' => array(
				'dbType' => 'date',
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 0,
				'default' => '0000-00-00'
			),
		),
		'period_to' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_loan.period_to',
			'config' => array(
				'dbType' => 'date',
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 0,
				'default' => '0000-00-00'
			),
		),
		'library_user' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:little_library/Resources/Private/Language/locallang.xlf:tx_littlelibrary_domain_model_loan.library_user',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
	),
);