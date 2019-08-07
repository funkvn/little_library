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
 * Media
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class Media extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * subTitle
	 *
	 * @var string
	 */
	protected $subTitle = '';

	/**
	 * publicationDate
	 *
	 * @var \DateTime
	 */
	protected $publicationDate = NULL;

	/**
	 * persons
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\PersonAssignment>
	 */
	protected $persons = NULL;

	/**
	 * @var \VF\LittleLibrary\Domain\Model\MediaType
	 */
	protected $type = NULL;

	/**
	 * inventoryItems
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\InventoryItem>
	 * @cascade remove
	 */
	protected $inventoryItems = NULL;

	/**
	 * @var \VF\LittleLibrary\Domain\Model\Publisher
	 */
	protected $publisher = NULL;

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
		$this->persons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->inventoryItems = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * @return string
	 */
	public function __toString() {
		return $this->getTitle();
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the subTitle
	 *
	 * @return string $subTitle
	 */
	public function getSubTitle() {
		return $this->subTitle;
	}

	/**
	 * Sets the subTitle
	 *
	 * @param string $subTitle
	 * @return void
	 */
	public function setSubTitle($subTitle) {
		$this->subTitle = $subTitle;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\PersonAssignment> $persons
	 */
	public function getPersons() {
		return $this->persons;
	}

	/**

	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\PersonAssignment> $persons
	 * @return void
	 */
	public function setPersons(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $persons) {
		$this->persons = $persons;
	}

	/**
	 * @param PersonAssignment $person
	 * @return void
	 */
	public function addPerson(PersonAssignment $person) {
		$this->persons->attach($person);
	}

	/**
	 * @param PersonAssignment $person
	 * @return void
	 */
	public function removePerson(PersonAssignment $person) {
		$this->persons->detach($person);
	}

	/**
	 * Returns the publicationDate
	 *
	 * @return \DateTime $publicationDate
	 */
	public function getPublicationDate() {
		return $this->publicationDate;
	}

	/**
	 * Sets the publicationDate
	 *
	 * @param \DateTime $publicationDate
	 * @return void
	 */
	public function setPublicationDate(\DateTime $publicationDate) {
		$this->publicationDate = $publicationDate;
	}

	/**
	 * @return Publisher $publisher
	 */
	public function getPublisher() {
		return $this->publisher;
	}

	/**
	 * @param Publisher $publisher
	 */
	public function setPublisher(Publisher $publisher) {
		$this->publisher = $publisher;
	}

	/**
	 * @return MediaType $type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param MediaType $type
	 */
	public function setType(MediaType $type) {
		$this->type = $type;
	}

	/**
	 * Adds a InventoryItem
	 *
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem
	 * @return void
	 */
	public function addInventoryItem(\VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem) {
		$this->inventoryItems->attach($inventoryItem);
	}

	/**
	 * Removes a InventoryItem
	 *
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItemToRemove The InventoryItem to be removed
	 * @return void
	 */
	public function removeInventoryItem(\VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItemToRemove) {
		$this->inventoryItems->detach($inventoryItemToRemove);
	}

	/**
	 * Returns the inventoryItems
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\InventoryItem> $inventoryItems
	 */
	public function getInventoryItems() {
		return $this->inventoryItems;
	}

	/**
	 * Sets the inventoryItems
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\InventoryItem> $inventoryItems
	 * @return void
	 */
	public function setInventoryItems(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $inventoryItems) {
		$this->inventoryItems = $inventoryItems;
	}
}