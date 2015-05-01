<?php
namespace VF\LittleLibrary\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Valentin Funk <valentin.funk@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Loan
 */
class Loan extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * periodFrom
	 *
	 * @var \DateTime
	 */
	protected $periodFrom = NULL;

	/**
	 * periodTo
	 *
	 * @var string
	 */
	protected $periodTo = '';

	/**
	 * libraryUser
	 *
	 * @var string
	 */
	protected $libraryUser = '';

	/**
	 * inventoryItem
	 *
	 * @var \VF\LittleLibrary\Domain\Model\InventoryItem
	 */
	protected $inventoryItem = NULL;

	/**
	 * Returns the periodFrom
	 *
	 * @return \DateTime $periodFrom
	 */
	public function getPeriodFrom() {
		return $this->periodFrom;
	}

	/**
	 * Sets the periodFrom
	 *
	 * @param \DateTime $periodFrom
	 * @return void
	 */
	public function setPeriodFrom(\DateTime $periodFrom) {
		$this->periodFrom = $periodFrom;
	}

	/**
	 * Returns the periodTo
	 *
	 * @return string $periodTo
	 */
	public function getPeriodTo() {
		return $this->periodTo;
	}

	/**
	 * Sets the periodTo
	 *
	 * @param string $periodTo
	 * @return void
	 */
	public function setPeriodTo($periodTo) {
		$this->periodTo = $periodTo;
	}

	/**
	 * Returns the libraryUser
	 *
	 * @return string $libraryUser
	 */
	public function getLibraryUser() {
		return $this->libraryUser;
	}

	/**
	 * Sets the libraryUser
	 *
	 * @param string $libraryUser
	 * @return void
	 */
	public function setLibraryUser($libraryUser) {
		$this->libraryUser = $libraryUser;
	}

	/**
	 * Returns the inventoryItem
	 *
	 * @return \VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem
	 */
	public function getInventoryItem() {
		return $this->inventoryItem;
	}

	/**
	 * Sets the inventoryItem
	 *
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem
	 * @return void
	 */
	public function setInventoryItem(\VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem) {
		$this->inventoryItem = $inventoryItem;
	}

}