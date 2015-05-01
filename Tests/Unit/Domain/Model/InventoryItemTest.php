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
 * Test case for class \VF\LittleLibrary\Domain\Model\InventoryItem.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class InventoryItemTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \VF\LittleLibrary\Domain\Model\InventoryItem
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \VF\LittleLibrary\Domain\Model\InventoryItem();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getShelfMarkReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getShelfMark()
		);
	}

	/**
	 * @test
	 */
	public function setShelfMarkForStringSetsShelfMark() {
		$this->subject->setShelfMark('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'shelfMark',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMediaReturnsInitialValueForMedia() {
		$this->assertEquals(
			NULL,
			$this->subject->getMedia()
		);
	}

	/**
	 * @test
	 */
	public function setMediaForMediaSetsMedia() {
		$mediaFixture = new \VF\LittleLibrary\Domain\Model\Media();
		$this->subject->setMedia($mediaFixture);

		$this->assertAttributeEquals(
			$mediaFixture,
			'media',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLoansReturnsInitialValueForLoan() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getLoans()
		);
	}

	/**
	 * @test
	 */
	public function setLoansForObjectStorageContainingLoanSetsLoans() {
		$loan = new \VF\LittleLibrary\Domain\Model\Loan();
		$objectStorageHoldingExactlyOneLoans = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneLoans->attach($loan);
		$this->subject->setLoans($objectStorageHoldingExactlyOneLoans);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneLoans,
			'loans',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addLoanToObjectStorageHoldingLoans() {
		$loan = new \VF\LittleLibrary\Domain\Model\Loan();
		$loansObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$loansObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($loan));
		$this->inject($this->subject, 'loans', $loansObjectStorageMock);

		$this->subject->addLoan($loan);
	}

	/**
	 * @test
	 */
	public function removeLoanFromObjectStorageHoldingLoans() {
		$loan = new \VF\LittleLibrary\Domain\Model\Loan();
		$loansObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$loansObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($loan));
		$this->inject($this->subject, 'loans', $loansObjectStorageMock);

		$this->subject->removeLoan($loan);

	}
}
