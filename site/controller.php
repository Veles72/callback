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
        $data['name'] = JRequest::getString('name');
        $data['phone'] = JRequest::getString('phone');
        $data['user_id'] = JRequest::getInt('user_id');
        
        $model = new CallBackModelCallback;
        if($model->save($data))
        {
            echo JTEXT::_('DATA_SAVED');
        }
        else 
        {
            echo JTEXT::_('ERROR_SAVE_DATA');
        }
        exit;
    }
}
