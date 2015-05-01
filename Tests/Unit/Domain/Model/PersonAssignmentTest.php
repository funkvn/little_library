<?php

namespace VF\LittleLibrary\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Valentin Funk <valentin.funk@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \VF\LittleLibrary\Domain\Model\PersonAssignment.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class PersonAssignmentTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \VF\LittleLibrary\Domain\Model\PersonAssignment
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \VF\LittleLibrary\Domain\Model\PersonAssignment();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTypeReturnsInitialValueForPersonType() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getType()
		);
	}

	/**
	 * @test
	 */
	public function setTypeForObjectStorageContainingPersonTypeSetsType() {
		$type = new \VF\LittleLibrary\Domain\Model\PersonType();
		$objectStorageHoldingExactlyOneType = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneType->attach($type);
		$this->subject->setType($objectStorageHoldingExactlyOneType);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneType,
			'type',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addTypeToObjectStorageHoldingType() {
		$type = new \VF\LittleLibrary\Domain\Model\PersonType();
		$typeObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$typeObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($type));
		$this->inject($this->subject, 'type', $typeObjectStorageMock);

		$this->subject->addType($type);
	}

	/**
	 * @test
	 */
	public function removeTypeFromObjectStorageHoldingType() {
		$type = new \VF\LittleLibrary\Domain\Model\PersonType();
		$typeObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$typeObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($type));
		$this->inject($this->subject, 'type', $typeObjectStorageMock);

		$this->subject->removeType($type);

	}

	/**
	 * @test
	 */
	public function getPersonReturnsInitialValueForPerson() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getPerson()
		);
	}

	/**
	 * @test
	 */
	public function setPersonForObjectStorageContainingPersonSetsPerson() {
		$person = new \VF\LittleLibrary\Domain\Model\Person();
		$objectStorageHoldingExactlyOnePerson = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOnePerson->attach($person);
		$this->subject->setPerson($objectStorageHoldingExactlyOnePerson);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOnePerson,
			'person',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addPersonToObjectStorageHoldingPerson() {
		$person = new \VF\LittleLibrary\Domain\Model\Person();
		$personObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$personObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($person));
		$this->inject($this->subject, 'person', $personObjectStorageMock);

		$this->subject->addPerson($person);
	}

	/**
	 * @test
	 */
	public function removePersonFromObjectStorageHoldingPerson() {
		$person = new \VF\LittleLibrary\Domain\Model\Person();
		$personObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$personObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($person));
		$this->inject($this->subject, 'person', $personObjectStorageMock);

		$this->subject->removePerson($person);

	}
}
