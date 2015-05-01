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

namespace VF\LittleLibrary\Domain\Model;

/**
 * Loan
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class Loan extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var \DateTime
	 */
	protected $periodFrom = NULL;

	/**
	 * @var \DateTime
	 */
	protected $periodTo = NULL;

	/**
	 * @var string
	 */
	protected $libraryUser = '';

	/**
	 * @var \VF\LittleLibrary\Domain\Model\InventoryItem
	 */
	protected $inventoryItem = NULL;

	/**
	 * @return \DateTime $periodFrom
	 */
	public function getPeriodFrom() {
		return $this->periodFrom;
	}

	/**
	 * @param \DateTime $periodFrom
	 * @return void
	 */
	public function setPeriodFrom(\DateTime $periodFrom) {
		$this->periodFrom = $periodFrom;
	}

	/**
	 * Returns the periodTo
	 *
	 * @return \DateTime $periodTo
	 */
	public function getPeriodTo() {
		return $this->periodTo;
	}

	/**
	 * Sets the periodTo
	 *
	 * @param \DateTime $periodTo
	 * @return void
	 */
	public function setPeriodTo(\DateTime $periodTo) {
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