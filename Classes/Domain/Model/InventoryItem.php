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
 * The books, cds, dvds itself.
 */
class InventoryItem extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * shelfMark
	 *
	 * @var string
	 */
	protected $shelfMark = '';

	/**
	 * media
	 *
	 * @var \VF\LittleLibrary\Domain\Model\Media
	 */
	protected $media = NULL;

	/**
	 * loans
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\Loan>
	 * @cascade remove
	 */
	protected $loans = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->loans = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the shelfMark
	 *
	 * @return string $shelfMark
	 */
	public function getShelfMark() {
		return $this->shelfMark;
	}

	/**
	 * Sets the shelfMark
	 *
	 * @param string $shelfMark
	 * @return void
	 */
	public function setShelfMark($shelfMark) {
		$this->shelfMark = $shelfMark;
	}

	/**
	 * Returns the media
	 *
	 * @return \VF\LittleLibrary\Domain\Model\Media $media
	 */
	public function getMedia() {
		return $this->media;
	}

	/**
	 * Sets the media
	 *
	 * @param \VF\LittleLibrary\Domain\Model\Media $media
	 * @return void
	 */
	public function setMedia(\VF\LittleLibrary\Domain\Model\Media $media) {
		$this->media = $media;
	}

	/**
	 * Adds a Loan
	 *
	 * @param \VF\LittleLibrary\Domain\Model\Loan $loan
	 * @return void
	 */
	public function addLoan(\VF\LittleLibrary\Domain\Model\Loan $loan) {
		$this->loans->attach($loan);
	}

	/**
	 * Removes a Loan
	 *
	 * @param \VF\LittleLibrary\Domain\Model\Loan $loanToRemove The Loan to be removed
	 * @return void
	 */
	public function removeLoan(\VF\LittleLibrary\Domain\Model\Loan $loanToRemove) {
		$this->loans->detach($loanToRemove);
	}

	/**
	 * Returns the loans
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\Loan> $loans
	 */
	public function getLoans() {
		return $this->loans;
	}

	/**
	 * Sets the loans
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\Loan> $loans
	 * @return void
	 */
	public function setLoans(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $loans) {
		$this->loans = $loans;
	}

}