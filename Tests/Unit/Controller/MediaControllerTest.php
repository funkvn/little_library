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

namespace VF\LittleLibrary\Tests\Unit\Controller;

/**
 * Test case for class VF\LittleLibrary\Controller\MediaController.
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class MediaControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \VF\LittleLibrary\Controller\MediaController
	 */
	protected $subject = NULL;

	/**
	 * @return void
	 */
	protected function setUp() {
		$this->subject = $this->getMock('VF\\LittleLibrary\\Controller\\MediaController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
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
	public function listActionFetchesAllMediasFromRepositoryAndAssignsThemToView() {
		$allMedias = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);
		$mediaRepository = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\Repository', array('findAll'), array(), '', FALSE);
		$mediaRepository->expects($this->once())->method('findAll')->will($this->returnValue($allMedias));
		$this->inject($this->subject, 'mediaRepository', $mediaRepository);
		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('medias', $allMedias);
		$this->inject($this->subject, 'view', $view);
		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenMediaToView() {
		$media = new \VF\LittleLibrary\Domain\Model\Media();
		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('media', $media);
		$this->subject->showAction($media);
	}
}