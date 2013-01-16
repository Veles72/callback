<?php
// No direct access to this file
defined('_JEXEC') or die;
 
/**
 * CallBack component helper.
 */
abstract class CallBackHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu) 
	{
		JSubMenuHelper::addEntry(JText::_('COM_CALLBACK_CALLBACKS'), 'index.php?option=com_callback', $submenu == 'messages');
		// set some global property
		$document = JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-callback {background-image: url(../media/com_callback/images/tux-48x48.png);}');
		if ($submenu == 'categories') 
		{
			$document->setTitle(JText::_('COM_CALLBACK_ADMINISTRATION_CATEGORIES'));
		}
	}
	/**
	 * Get the actions
	 */
	public static function getActions($messageId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;
 
		if (empty($messageId)) {
			$assetName = 'com_callback';
		}
		else {
			$assetName = 'com_callback.message.'.(int) $messageId;
		}
 
		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.delete'
		);
 
		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}
 
		return $result;
	}
}
