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

namespace VF\LittleLibrary\Controller;

/**
 * InventoryItemController
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class InventoryItemController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \VF\LittleLibrary\Domain\Repository\InventoryItemRepository
	 * @inject
	 */
	protected $inventoryItemRepository;

	/**
	 * @return void
	 */
	public function listAction() {
		$inventoryItems = $this->inventoryItemRepository->findAll();
		$this->view->assign('inventoryItems', $inventoryItems);
	}

	/**
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem
	 * @return void
	 */
	public function showAction(\VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem) {
		$this->view->assign('inventoryItem', $inventoryItem);
	}

	/**
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem
	 * @ignorevalidation $iventoryItem
	 * @return void
	 */
	public function newAction(\VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem = NULL) {
		$this->view->assign('newInventoryItem', $inventoryItem);
	}

	/**
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem
	 * @return void
	 */
	public function createAction(\VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->inventoryItemRepository->add($inventoryItem);
		$this->redirect('list');
	}

	/**
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem
	 * @ignorevalidation $inventoryItem
	 * @return void
	 */
	public function editAction(\VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem) {
		$this->view->assign('inventoryItem', $inventoryItem);
	}

	/**
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem
	 * @return void
	 */
	public function updateAction(\VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->inventoryItemRepository->update($inventoryItem);
		$this->redirect('list');
	}

	/**
	 * @param \VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem
	 * @return void
	 */
	public function deleteAction(\VF\LittleLibrary\Domain\Model\InventoryItem $inventoryItem) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->inventoryItemRepository->remove($inventoryItem);
		$this->redirect('list');
	}

	/**
	 * @return void
	 */
	public function loanAction() {
		
	}

	/**
	 * @return void
	 */
	public function returnAction() {
		
	}
}