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
 * The books, cds, dvds itself.
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
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