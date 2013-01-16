<?php
/**
 * @version     1.0.0
 * @package     com_callbacks
 * @copyright   Copyright (C) 2011 Amy Stephen. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');
 
// Execute the task.
$controller	= JController::getInstance('CallBack');
$controller->execute(JRequest::getVar('task',''));
$controller->redirect();
