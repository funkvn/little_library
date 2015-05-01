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
 * PersonAssignment
 */
class PersonAssignment extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * type
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\PersonType>
	 * @cascade remove
	 */
	protected $type = NULL;

	/**
	 * person
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\Person>
	 * @cascade remove
	 */
	protected $person = NULL;

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
		$this->type = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->person = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a PersonType
	 *
	 * @param \VF\LittleLibrary\Domain\Model\PersonType $type
	 * @return void
	 */
	public function addType(\VF\LittleLibrary\Domain\Model\PersonType $type) {
		$this->type->attach($type);
	}

	/**
	 * Removes a PersonType
	 *
	 * @param \VF\LittleLibrary\Domain\Model\PersonType $typeToRemove The PersonType to be removed
	 * @return void
	 */
	public function removeType(\VF\LittleLibrary\Domain\Model\PersonType $typeToRemove) {
		$this->type->detach($typeToRemove);
	}

	/**
	 * Returns the type
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\PersonType> $type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the type
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\PersonType> $type
	 * @return void
	 */
	public function setType(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $type) {
		$this->type = $type;
	}

	/**
	 * Adds a Person
	 *
	 * @param \VF\LittleLibrary\Domain\Model\Person $person
	 * @return void
	 */
	public function addPerson(\VF\LittleLibrary\Domain\Model\Person $person) {
		$this->person->attach($person);
	}

	/**
	 * Removes a Person
	 *
	 * @param \VF\LittleLibrary\Domain\Model\Person $personToRemove The Person to be removed
	 * @return void
	 */
	public function removePerson(\VF\LittleLibrary\Domain\Model\Person $personToRemove) {
		$this->person->detach($personToRemove);
	}

	/**
	 * Returns the person
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\Person> $person
	 */
	public function getPerson() {
		return $this->person;
	}

	/**
	 * Sets the person
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VF\LittleLibrary\Domain\Model\Person> $person
	 * @return void
	 */
	public function setPerson(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $person) {
		$this->person = $person;
	}

}