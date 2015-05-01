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
 * Test case for class \VF\LittleLibrary\Domain\Model\PersonAssignment.
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class PersonAssignmentTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \VF\LittleLibrary\Domain\Model\PersonAssignment
	 */
	protected $subject = NULL;

	/**
	 * @return void
	 */
	protected function setUp() {
		$this->subject = new \VF\LittleLibrary\Domain\Model\PersonAssignment();
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
	public function getTypeReturnsInitialValueForNull() {
		$this->assertEquals(
			NULL,
			$this->subject->getType()
		);
	}

	/**
	 * @test
	 */
	public function setTypeForPersonTypeSetsType() {
		$personTypeFixture = new \VF\LittleLibrary\Domain\Model\PersonType();
		$this->subject->setType($personTypeFixture);

		$this->assertAttributeEquals(
			$personTypeFixture,
			'type',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPersonReturnsInitialValueForNull() {
		$this->assertEquals(
			NULL,
			$this->subject->getPerson()
		);
	}

	/**
	 * @test
	 */
	public function setPersonForPersonSetsPerson() {
		$personFixture = new \VF\LittleLibrary\Domain\Model\Person();
		$this->subject->setPerson($personFixture);

		$this->assertAttributeEquals(
			$personFixture,
			'person',
			$this->subject
		);
	}
}