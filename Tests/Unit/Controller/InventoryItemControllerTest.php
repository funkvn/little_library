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
 * Test case for class VF\LittleLibrary\Controller\InventoryItemController.
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class InventoryItemControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \VF\LittleLibrary\Controller\InventoryItemController
	 */
	protected $subject = NULL;

	/**
	 * @return void
	 */
	protected function setUp() {
		$this->subject = $this->getMock('VF\\LittleLibrary\\Controller\\InventoryItemController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
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
	public function listActionFetchesAllInventoryItemsFromRepositoryAndAssignsThemToView() {

		$allInventoryItems = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$inventoryItemRepository = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\Repository', array('findAll'), array(), '', FALSE);
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

		$inventoryItemRepository = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\Repository', array('add'), array(), '', FALSE);
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

		$inventoryItemRepository = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\Repository', array('update'), array(), '', FALSE);
		$inventoryItemRepository->expects($this->once())->method('update')->with($inventoryItem);
		$this->inject($this->subject, 'inventoryItemRepository', $inventoryItemRepository);

		$this->subject->updateAction($inventoryItem);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenInventoryItemFromInventoryItemRepository() {
		$inventoryItem = new \VF\LittleLibrary\Domain\Model\InventoryItem();

		$inventoryItemRepository = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\Repository', array('remove'), array(), '', FALSE);
		$inventoryItemRepository->expects($this->once())->method('remove')->with($inventoryItem);
		$this->inject($this->subject, 'inventoryItemRepository', $inventoryItemRepository);

		$this->subject->deleteAction($inventoryItem);
	}
}