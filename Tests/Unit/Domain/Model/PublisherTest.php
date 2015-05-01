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
 * Test case for class \VF\LittleLibrary\Domain\Model\Publisher.
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class PublisherTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \VF\LittleLibrary\Domain\Model\Publisher
	 */
	protected $subject = NULL;

	/**
	 * @return void
	 */
	protected function setUp() {
		$this->subject = new \VF\LittleLibrary\Domain\Model\Publisher();
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
	public function getNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName() {
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}
}