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
 * Test case for class \VF\LittleLibrary\Domain\Model\Loan.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class LoanTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \VF\LittleLibrary\Domain\Model\Loan
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \VF\LittleLibrary\Domain\Model\Loan();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getPeriodFromReturnsInitialValueForDateTime() {
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
	public function getPeriodToReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getPeriodTo()
		);
	}

	/**
	 * @test
	 */
	public function setPeriodToForStringSetsPeriodTo() {
		$this->subject->setPeriodTo('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
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
