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
 * PersonAssignment
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class PersonAssignment extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var PersonType
	 */
	protected $type = NULL;

	/**
	 * @var Person
	 */
	protected $person = NULL;

	/**
	 * @return PersonType
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param PersonType $type
	 * @return void
	 */
	public function setType(PersonType $type) {
		$this->type = $type;
	}

	/**
	 * @return Person
	 */
	public function getPerson() {
		return $this->person;
	}

	/**
	 * @param Person $person
	 * @return void
	 */
	public function setPerson(Person $person) {
		$this->person = $person;
	}
}