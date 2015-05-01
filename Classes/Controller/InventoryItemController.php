<?php
namespace VF\LittleLibrary\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Valentin Funk <valentin.funk@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * InventoryItemController
 */
class InventoryItemController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$inventoryItems = $this->inventoryItemRepository->findAll();
		$this->view->assign('inventoryItems', $inventoryItems);
	}

	/**
	 * action show
	 *
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem
	 * @return void
	 */
	public function showAction(\VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem) {
		$this->view->assign('inventoryItem', $inventoryItem);
	}

	/**
	 * action new
	 *
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $newInventoryItem
	 * @ignorevalidation $newInventoryItem
	 * @return void
	 */
	public function newAction(\VF\LittleLibrary\Domain\Model\InventoryItem $newInventoryItem = NULL) {
		$this->view->assign('newInventoryItem', $newInventoryItem);
	}

	/**
	 * action create
	 *
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $newInventoryItem
	 * @return void
	 */
	public function createAction(\VF\LittleLibrary\Domain\Model\InventoryItem $newInventoryItem) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->inventoryItemRepository->add($newInventoryItem);
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem
	 * @ignorevalidation $inventoryItem
	 * @return void
	 */
	public function editAction(\VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem) {
		$this->view->assign('inventoryItem', $inventoryItem);
	}

	/**
	 * action update
	 *
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem
	 * @return void
	 */
	public function updateAction(\VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->inventoryItemRepository->update($inventoryItem);
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem
	 * @return void
	 */
	public function deleteAction(\VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->inventoryItemRepository->remove($inventoryItem);
		$this->redirect('list');
	}

	/**
	 * action loan
	 *
	 * @return void
	 */
	public function loanAction() {
		
	}

	/**
	 * action return
	 *
	 * @return void
	 */
	public function returnAction() {
		
	}

}