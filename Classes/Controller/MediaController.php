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
 * MediaController
 *
 * @author Valentin Funk <valentin.funk@gmail.com>
 */
class MediaController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\Repository
	 * @inject
	 */
	protected $mediaRepository = NULL;

	/**
	 * @return void
	 */
	public function listAction() {
		$medias = $this->mediaRepository->findAll();
		$this->view->assign('medias', $medias);
	}

	/**
	 * @param \VF\LittleLibrary\Domain\Model\Media $media
	 * @return void
	 */
	public function showAction(\VF\LittleLibrary\Domain\Model\Media $media) {
		$this->view->assign('media', $media);
	}
}