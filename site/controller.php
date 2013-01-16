<?php
/**
 * @version     1.0.0
 * @package     com_callback
 * @copyright   Copyright (C) 2011 Amy Stephen. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');
require_once JPATH_COMPONENT_ADMINISTRATOR.'/models/callback.php';

class CallBackController extends JController
{
    /**
     * __construct
     *
     * @param array $config
     */
    function __construct($config = array())
    {
        parent::__construct($config);
    }

    /**
     * Method to add a new record.
     *
     * @return	boolean	True if the callback can be added, false if not.
     * @since	1.6
     */
    public function save()
    {
        // Check for request forgeries
        JRequest::checkToken() or jexit( 'Invalid Token' );
        $phone = JRequest::getString('phone');
        preg_match("/\+7\(([0-9]{3})\) ([0-9]{3})-([0-9]{2})-([0-9]{2})/", $phone, $regs);

        $data['name'] = htmlspecialchars(JRequest::getString('name'));
        $data['telnum'] = $regs[1].$regs[2].$regs[3].$regs[4];
        $data['user_id'] = JRequest::getInt('user_id');
        $data['time_create'] = date('Y-m-d H:i:s');
        $model = new CallBackModelCallback;
        if($model->save($data))
        {
            $msg = JTEXT::_('COM_CALLBACK_DATA_SAVED');
//            $tmpl = 'error';
        }
        else 
        {
            $msg = JTEXT::_('COM_CALLBACK_ERROR_SAVE_DATA');
//            $tmpl = 'success';
        }
        // Check the table in so it can be edited.... we are done with it anyway
//        $link = 'index.php?option=com_callback&tmpl='.$tmpl;
        $link = 'index.php';
        $this->setRedirect($link, $msg);
    }
}
