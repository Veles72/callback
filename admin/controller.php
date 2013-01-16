<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 
/**
 * General Controller of CallBack component
 */
class CallBackController extends JController
{
	/**
	 * display task
	 *
	 * @return void
	 */
	function display($cachable = false) 
	{
		// set default view if not set
		JRequest::setVar('view', JRequest::getCmd('view', 'CallBacks'));
 
		// call parent behavior
		parent::display($cachable);
 
		// Set the submenu
		CallBackHelper::addSubmenu('messages');
	}
}
