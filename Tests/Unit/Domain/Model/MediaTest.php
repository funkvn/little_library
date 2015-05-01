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

namespace VF\LittleLibrary\Tests\Unit\Domain\Model;

/**
 * Test case for class \VF\LittleLibrary\Domain\Model\Media.
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class MediaTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \VF\LittleLibrary\Domain\Model\Media
	 */
	protected $subject = NULL;

	/**
	 * @return void
	 */
	protected function setUp() {
		$this->subject = new \VF\LittleLibrary\Domain\Model\Media();
	}

	/**
	 * @return void
	 */
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
	public function getPublicationDateReturnsInitialValueForNull() {
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
	public function getTypeReturnsInitialValueForNull() {
		$this->assertEquals(
			NULL,
			$this->subject->getType()
		);
	}

	/**
	 * @test
	 */
	public function setTypeMediaTypeTypeSetsType() {
		$typeFixture = new \VF\LittleLibrary\Domain\Model\MediaType();
		$this->subject->setType($typeFixture);

		$this->assertAttributeEquals(
			$typeFixture,
			'type',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getInventoryItemsReturnsInitialValueForInventoryItem() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getInventoryItems()
		);
	}

	/**
	 * @test
	 */
	public function setInventoryItemsForObjectStorageContainingInventoryItemSetsInventoryItems() {
		$inventoryItem = new \VF\LittleLibrary\Domain\Model\InventoryItem();
		$objectStorageHoldingExactlyOneInventoryItems = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneInventoryItems->attach($inventoryItem);
		$this->subject->setInventoryItems($objectStorageHoldingExactlyOneInventoryItems);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneInventoryItems,
			'inventoryItems',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addInventoryItemToObjectStorageHoldingInventoryItems() {
		$inventoryItem = new \VF\LittleLibrary\Domain\Model\InventoryItem();
		$inventoryItemsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$inventoryItemsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($inventoryItem));
		$this->inject($this->subject, 'inventoryItems', $inventoryItemsObjectStorageMock);

		$this->subject->addInventoryItem($inventoryItem);
	}

	/**
	 * @test
	 */
	public function removeInventoryItemFromObjectStorageHoldingInventoryItems() {
		$inventoryItem = new \VF\LittleLibrary\Domain\Model\InventoryItem();
		$inventoryItemsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$inventoryItemsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($inventoryItem));
		$this->inject($this->subject, 'inventoryItems', $inventoryItemsObjectStorageMock);

		$this->subject->removeInventoryItem($inventoryItem);

	}

	/**
	 * @test
	 */
	public function getPublisherReturnsInitialValueForNull() {
		$this->assertEquals(
			NULL,
			$this->subject->getPublisher()
		);
	}

	/**
	 * @test
	 */
	public function setPublisherForPublisherSetsPublisher() {
		$publisherFixture = new \VF\LittleLibrary\Domain\Model\Publisher();
		$this->subject->setPublisher($publisherFixture);

		$this->assertAttributeEquals(
			$publisherFixture,
			'publisher',
			$this->subject
		);
	}
}