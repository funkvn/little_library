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
 * Test case for class \VF\LittleLibrary\Domain\Model\Media.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class MediaTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \VF\LittleLibrary\Domain\Model\Media
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \VF\LittleLibrary\Domain\Model\Media();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() {
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSubTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getSubTitle()
		);
	}

	/**
	 * @test
	 */
	public function setSubTitleForStringSetsSubTitle() {
		$this->subject->setSubTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'subTitle',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPublicationDateReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getPublicationDate()
		);
	}

	/**
	 * @test
	 */
	public function setPublicationDateForDateTimeSetsPublicationDate() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setPublicationDate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'publicationDate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPersonsReturnsInitialValueForPersonAssignment() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getPersons()
		);
	}

	/**
	 * @test
	 */
	public function setPersonsForObjectStorageContainingPersonAssignmentSetsPersons() {
		$person = new \VF\LittleLibrary\Domain\Model\PersonAssignment();
		$objectStorageHoldingExactlyOnePersons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOnePersons->attach($person);
		$this->subject->setPersons($objectStorageHoldingExactlyOnePersons);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOnePersons,
			'persons',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addPersonToObjectStorageHoldingPersons() {
		$person = new \VF\LittleLibrary\Domain\Model\PersonAssignment();
		$personsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$personsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($person));
		$this->inject($this->subject, 'persons', $personsObjectStorageMock);

		$this->subject->addPerson($person);
	}

	/**
	 * @test
	 */
	public function removePersonFromObjectStorageHoldingPersons() {
		$person = new \VF\LittleLibrary\Domain\Model\PersonAssignment();
		$personsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$personsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($person));
		$this->inject($this->subject, 'persons', $personsObjectStorageMock);

		$this->subject->removePerson($person);

	}

	/**
	 * @test
	 */
	public function getTypeReturnsInitialValueForMediaType() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getType()
		);
	}

	/**
	 * @test
	 */
	public function setTypeForObjectStorageContainingMediaTypeSetsType() {
		$type = new \VF\LittleLibrary\Domain\Model\MediaType();
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
		$type = new \VF\LittleLibrary\Domain\Model\MediaType();
		$typeObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$typeObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($type));
		$this->inject($this->subject, 'type', $typeObjectStorageMock);

		$this->subject->addType($type);
	}

	/**
	 * @test
	 */
	public function removeTypeFromObjectStorageHoldingType() {
		$type = new \VF\LittleLibrary\Domain\Model\MediaType();
		$typeObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$typeObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($type));
		$this->inject($this->subject, 'type', $typeObjectStorageMock);

		$this->subject->removeType($type);

	}

	/**
	 * @test
	 */
	public function getInventoryItemReturnsInitialValueForInventoryItem() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getInventoryItem()
		);
	}

	/**
	 * @test
	 */
	public function setInventoryItemForObjectStorageContainingInventoryItemSetsInventoryItem() {
		$inventoryItem = new \VF\LittleLibrary\Domain\Model\InventoryItem();
		$objectStorageHoldingExactlyOneInventoryItem = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneInventoryItem->attach($inventoryItem);
		$this->subject->setInventoryItem($objectStorageHoldingExactlyOneInventoryItem);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneInventoryItem,
			'inventoryItem',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addInventoryItemToObjectStorageHoldingInventoryItem() {
		$inventoryItem = new \VF\LittleLibrary\Domain\Model\InventoryItem();
		$inventoryItemObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$inventoryItemObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($inventoryItem));
		$this->inject($this->subject, 'inventoryItem', $inventoryItemObjectStorageMock);

		$this->subject->addInventoryItem($inventoryItem);
	}

	/**
	 * @test
	 */
	public function removeInventoryItemFromObjectStorageHoldingInventoryItem() {
		$inventoryItem = new \VF\LittleLibrary\Domain\Model\InventoryItem();
		$inventoryItemObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$inventoryItemObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($inventoryItem));
		$this->inject($this->subject, 'inventoryItem', $inventoryItemObjectStorageMock);

		$this->subject->removeInventoryItem($inventoryItem);

	}

	/**
	 * @test
	 */
	public function getPublisherReturnsInitialValueForPublisher() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getPublisher()
		);
	}

	/**
	 * @test
	 */
	public function setPublisherForObjectStorageContainingPublisherSetsPublisher() {
		$publisher = new \VF\LittleLibrary\Domain\Model\Publisher();
		$objectStorageHoldingExactlyOnePublisher = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOnePublisher->attach($publisher);
		$this->subject->setPublisher($objectStorageHoldingExactlyOnePublisher);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOnePublisher,
			'publisher',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addPublisherToObjectStorageHoldingPublisher() {
		$publisher = new \VF\LittleLibrary\Domain\Model\Publisher();
		$publisherObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$publisherObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($publisher));
		$this->inject($this->subject, 'publisher', $publisherObjectStorageMock);

		$this->subject->addPublisher($publisher);
	}

	/**
	 * @test
	 */
	public function removePublisherFromObjectStorageHoldingPublisher() {
		$publisher = new \VF\LittleLibrary\Domain\Model\Publisher();
		$publisherObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$publisherObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($publisher));
		$this->inject($this->subject, 'publisher', $publisherObjectStorageMock);

		$this->subject->removePublisher($publisher);

	}
}
