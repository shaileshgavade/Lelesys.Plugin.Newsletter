<?php
namespace Lelesys\Plugin\Newsletter\Controller\Module\NewsletterManagement\EmailLog;

/*
 * This script belongs to the package "Lelesys.Plugin.Newsletter".         *
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

use TYPO3\Flow\Annotations as Flow;
use Lelesys\Plugin\Newsletter\Controller\Module\NewsletterManagementController;
use Lelesys\Plugin\Newsletter\Domain\Model\EmailLog;

/**
 * A EmailLog Controller
 *
 * @Flow\Scope("singleton")
 */
class EmailLogController extends NewsletterManagementController {

	/**
	 * EmailLog Service
	 *
	 * @Flow\Inject
	 * @var \Lelesys\Plugin\Newsletter\Domain\Service\EmailLogService
	 */
	protected $emailLogService;

	/**
	 * List of all email logs
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('emailLogs', $this->emailLogService->listAllUndeliveredMailsLogs(0,0));
	}

	/**
	 * Detail of email log
	 *
	 * @param \Lelesys\Plugin\Newsletter\Domain\Model\EmailLog $emailLog EmailLog object
	 * @return void
	 */
	public function showAction(\Lelesys\Plugin\Newsletter\Domain\Model\EmailLog $emailLog) {
		$this->view->assign('emailLog', $emailLog);
	}

	/**
	 * Creates email log
	 *
	 * @param \Lelesys\Plugin\Newsletter\Domain\Model\EmailLog $newEmailLog EmailLog object
	 * @return void
	 */
	public function createAction(\Lelesys\Plugin\Newsletter\Domain\Model\EmailLog $newEmailLog) {
		$this->emailLogService->create($newEmailLog);
		$this->addFlashMessage('Created a new email log.');
		$this->redirect('index');
	}

}
?>