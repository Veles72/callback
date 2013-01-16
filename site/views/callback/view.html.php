<?php
/**
 * @version     1.0.0
 * @package     com_callback
 * @copyright   Copyright (C) 2011 Amy Stephen. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * HTML View class for the CallBack component
 *
 * @package		Joomla
 * @subpackage	com_callback
 * @since 1.5
 */
class CallBackViewCallBack extends JView
{
	protected $state;

	function display($tpl = null)
	{
		$app	= JFactory::getApplication();
		$user	= JFactory::getUser();
		$this->assignRef('user', $user);

		parent::display($tpl);
	}

}
