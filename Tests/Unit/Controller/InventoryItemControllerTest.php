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
 * Test case for class VF\LittleLibrary\Controller\InventoryItemController.
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class InventoryItemControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \VF\LittleLibrary\Controller\InventoryItemController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('VF\\LittleLibrary\\Controller\\InventoryItemController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllInventoryItemsFromRepositoryAndAssignsThemToView() {

		$allInventoryItems = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$inventoryItemRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$inventoryItemRepository->expects($this->once())->method('findAll')->will($this->returnValue($allInventoryItems));
		$this->inject($this->subject, 'inventoryItemRepository', $inventoryItemRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('inventoryItems', $allInventoryItems);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenInventoryItemToView() {
		$inventoryItem = new \VF\LittleLibrary\Domain\Model\InventoryItem();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('inventoryItem', $inventoryItem);

		$this->subject->showAction($inventoryItem);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenInventoryItemToView() {
		$inventoryItem = new \VF\LittleLibrary\Domain\Model\InventoryItem();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newInventoryItem', $inventoryItem);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($inventoryItem);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenInventoryItemToInventoryItemRepository() {
		$inventoryItem = new \VF\LittleLibrary\Domain\Model\InventoryItem();

		$inventoryItemRepository = $this->getMock('', array('add'), array(), '', FALSE);
		$inventoryItemRepository->expects($this->once())->method('add')->with($inventoryItem);
		$this->inject($this->subject, 'inventoryItemRepository', $inventoryItemRepository);

		$this->subject->createAction($inventoryItem);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenInventoryItemToView() {
		$inventoryItem = new \VF\LittleLibrary\Domain\Model\InventoryItem();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('inventoryItem', $inventoryItem);

		$this->subject->editAction($inventoryItem);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenInventoryItemInInventoryItemRepository() {
		$inventoryItem = new \VF\LittleLibrary\Domain\Model\InventoryItem();

		$inventoryItemRepository = $this->getMock('', array('update'), array(), '', FALSE);
		$inventoryItemRepository->expects($this->once())->method('update')->with($inventoryItem);
		$this->inject($this->subject, 'inventoryItemRepository', $inventoryItemRepository);

		$this->subject->updateAction($inventoryItem);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenInventoryItemFromInventoryItemRepository() {
		$inventoryItem = new \VF\LittleLibrary\Domain\Model\InventoryItem();

		$inventoryItemRepository = $this->getMock('', array('remove'), array(), '', FALSE);
		$inventoryItemRepository->expects($this->once())->method('remove')->with($inventoryItem);
		$this->inject($this->subject, 'inventoryItemRepository', $inventoryItemRepository);

		$this->subject->deleteAction($inventoryItem);
	}
}
