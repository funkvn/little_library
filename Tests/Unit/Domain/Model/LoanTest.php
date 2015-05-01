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
 * Test case for class \VF\LittleLibrary\Domain\Model\Loan.
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class LoanTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \VF\LittleLibrary\Domain\Model\Loan
	 */
	protected $subject = NULL;

	/**
	 * @return void
	 */
	protected function setUp() {
		$this->subject = new \VF\LittleLibrary\Domain\Model\Loan();
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
	public function getPeriodFromReturnsInitialValueForNull() {
		$this->assertEquals(
			NULL,
			$this->subject->getPeriodFrom()
		);
	}

	/**
	 * @test
	 */
	public function setPeriodFromForDateTimeSetsPeriodFrom() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setPeriodFrom($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'periodFrom',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPeriodToReturnsInitialValueForNull() {
		$this->assertSame(
			NULL,
			$this->subject->getPeriodTo()
		);
	}

	/**
	 * @test
	 */
	public function setPeriodToForDateTimeSetsPeriodTo() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setPeriodTo($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'periodTo',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLibraryUserReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLibraryUser()
		);
	}

	/**
	 * @test
	 */
	public function setLibraryUserForStringSetsLibraryUser() {
		$this->subject->setLibraryUser('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'libraryUser',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getInventoryItemReturnsInitialValueForInventoryItem() {
		$this->assertEquals(
			NULL,
			$this->subject->getInventoryItem()
		);
	}

	/**
	 * @test
	 */
	public function setInventoryItemForInventoryItemSetsInventoryItem() {
		$inventoryItemFixture = new \VF\LittleLibrary\Domain\Model\InventoryItem();
		$this->subject->setInventoryItem($inventoryItemFixture);

		$this->assertAttributeEquals(
			$inventoryItemFixture,
			'inventoryItem',
			$this->subject
		);
	}
}