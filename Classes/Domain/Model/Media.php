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
 * Media
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
	 * type
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\MediaType>
	 * @cascade remove
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
	 * publisher
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\Publisher>
	 * @cascade remove
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
		$this->type = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->inventoryItems = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->publisher = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Adds a PersonAssignment
	 *
	 * @param \VF\LittleLibrary\Domain\Model\PersonAssignment $person
	 * @return void
	 */
	public function addPerson(\VF\LittleLibrary\Domain\Model\PersonAssignment $person) {
		$this->persons->attach($person);
	}

	/**
	 * Removes a PersonAssignment
	 *
	 * @param \VF\LittleLibrary\Domain\Model\PersonAssignment $personToRemove The PersonAssignment to be removed
	 * @return void
	 */
	public function removePerson(\VF\LittleLibrary\Domain\Model\PersonAssignment $personToRemove) {
		$this->persons->detach($personToRemove);
	}

	/**
	 * Returns the persons
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\PersonAssignment> $persons
	 */
	public function getPersons() {
		return $this->persons;
	}

	/**
	 * Sets the persons
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\PersonAssignment> $persons
	 * @return void
	 */
	public function setPersons(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $persons) {
		$this->persons = $persons;
	}

	/**
	 * Adds a MediaType
	 *
	 * @param \VF\LittleLibrary\Domain\Model\MediaType $type
	 * @return void
	 */
	public function addType(\VF\LittleLibrary\Domain\Model\MediaType $type) {
		$this->type->attach($type);
	}

	/**
	 * Removes a MediaType
	 *
	 * @param \VF\LittleLibrary\Domain\Model\MediaType $typeToRemove The MediaType to be removed
	 * @return void
	 */
	public function removeType(\VF\LittleLibrary\Domain\Model\MediaType $typeToRemove) {
		$this->type->detach($typeToRemove);
	}

	/**
	 * Returns the type
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\MediaType> $type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the type
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\MediaType> $type
	 * @return void
	 */
	public function setType(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $type) {
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

	/**
	 * Adds a Publisher
	 *
	 * @param \VF\LittleLibrary\Domain\Model\Publisher $publisher
	 * @return void
	 */
	public function addPublisher(\VF\LittleLibrary\Domain\Model\Publisher $publisher) {
		$this->publisher->attach($publisher);
	}

	/**
	 * Removes a Publisher
	 *
	 * @param \VF\LittleLibrary\Domain\Model\Publisher $publisherToRemove The Publisher to be removed
	 * @return void
	 */
	public function removePublisher(\VF\LittleLibrary\Domain\Model\Publisher $publisherToRemove) {
		$this->publisher->detach($publisherToRemove);
	}

	/**
	 * Returns the publisher
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\Publisher> $publisher
	 */
	public function getPublisher() {
		return $this->publisher;
	}

	/**
	 * Sets the publisher
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\Publisher> $publisher
	 * @return void
	 */
	public function setPublisher(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $publisher) {
		$this->publisher = $publisher;
	}

}