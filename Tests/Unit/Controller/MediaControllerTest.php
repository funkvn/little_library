<?php
namespace VF\LittleLibrary\Tests\Unit\Controller;
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
 * Test case for class VF\LittleLibrary\Controller\MediaController.
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class MediaControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \VF\LittleLibrary\Controller\MediaController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('VF\\LittleLibrary\\Controller\\MediaController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllMediasFromRepositoryAndAssignsThemToView() {

		$allMedias = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$mediaRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
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

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenMediaToView() {
		$media = new \VF\LittleLibrary\Domain\Model\Media();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newMedia', $media);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($media);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenMediaToMediaRepository() {
		$media = new \VF\LittleLibrary\Domain\Model\Media();

		$mediaRepository = $this->getMock('', array('add'), array(), '', FALSE);
		$mediaRepository->expects($this->once())->method('add')->with($media);
		$this->inject($this->subject, 'mediaRepository', $mediaRepository);

		$this->subject->createAction($media);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenMediaToView() {
		$media = new \VF\LittleLibrary\Domain\Model\Media();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('media', $media);

		$this->subject->editAction($media);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenMediaInMediaRepository() {
		$media = new \VF\LittleLibrary\Domain\Model\Media();

		$mediaRepository = $this->getMock('', array('update'), array(), '', FALSE);
		$mediaRepository->expects($this->once())->method('update')->with($media);
		$this->inject($this->subject, 'mediaRepository', $mediaRepository);

		$this->subject->updateAction($media);
	}
}
