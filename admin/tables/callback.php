<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
 
// import Joomla table library
jimport('joomla.database.table');
 
/**
 * Hello Table class
 */
class CallBackTableCallBack extends JTable
{
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function __construct(&$db) 
	{
		parent::__construct('#__callback_callback', 'id', $db);
	}
	/**
	 * Overloaded bind function
	 *
	 * @param       array           named array
	 * @return      null|string     null is operation was satisfactory, otherwise returns an error
	 * @see JTable:bind
	 * @since 1.5
	 */
	public function bind($array, $ignore = '') 
	{
            // Конвертируем номер телефона
            if (isset($array['telnum']) AND substr($array['telnum'],1,3 == '+7(')) 
            {
                preg_match("/\+7\(([0-9]{3})\) ([0-9]{3})-([0-9]{2})-([0-9]{2})/", $array['telnum'], $regs);
                $array['telnum'] = $regs[1].$regs[2].$regs[3].$regs[4];
            }
            // Конвертируем дату и время создания
            if (isset($array['time_create']) AND substr_count('.',$array['time_create']) == 3) 
            {
                preg_match("/([0-9]{2}).([0-9]{2}).([0-9]{4}) ([0-9]{2}):([0-9]{2}):([0-9]{2})/", $array['time_create'], $regs);
                $array['time_create'] = $regs[3].'-'.$regs[2].'-'.$regs[1].' '.$regs[4].':'.$regs[5].':'.$regs[6];
            }
            // Конвертируем дату и время закрытия
            if (isset($array['time_create']) AND substr_count('.',$array['time_close']) == 3) 
            {
                preg_match("/([0-9]{2}).([0-9]{2}).([0-9]{4}) ([0-9]{2}):([0-9]{2}):([0-9]{2})/", $array['time_close'], $regs);
                $array['time_create'] = $regs[3].'-'.$regs[2].'-'.$regs[1].' '.$regs[4].':'.$regs[5].':'.$regs[6];
            }
            // Конвертируем наименование клиента
            if (isset($array['name'])) 
            {
                $array['name'] = htmlspecialchars($array['name']);
            }
            // Конвертируем наименование темы
            if (isset($array['theme'])) 
            {
                $array['theme'] = htmlspecialchars($array['theme']);
            }
            return parent::bind($array, $ignore);
	}
 
	/**
	 * Overloaded load function
	 *
	 * @param       int $pk primary key
	 * @param       boolean $reset reset data
	 * @return      boolean
	 * @see JTable:load
	 */
	public function load($pk = null, $reset = true) 
	{
		if (parent::load($pk, $reset)) 
		{
                    // Конвертируем номер телефона
                    preg_match("/([0-9]{3})([0-9]{3})([0-9]{2})([0-9]{2})/", $this->telnum, $regs);
                    if(count($regs) == 5)
                    {
                        $this->telnum = '+7('.$regs[1].') '.$regs[2].'-'.$regs[3].'-'.$regs[4];
                    }
                    // Конвертируем дату и время создания
                    preg_match("/([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9]{2}):([0-9]{2}):([0-9]{2})/", $this->time_create, $regs);
                    if(count($regs) == 7)
                    {
                        $this->time_create = $regs[3].'.'.$regs[2].'.'.$regs[1].' '.$regs[4].':'.$regs[5].':'.$regs[6];
                    }
                    // Конвертируем дату и время закрытия
                    preg_match("/([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9]{2}):([0-9]{2}):([0-9]{2})/", $this->time_close, $regs);
                    if(count($regs) == 7)
                    {
                        $this->time_close = $regs[3].'.'.$regs[2].'.'.$regs[1].' '.$regs[4].':'.$regs[5].':'.$regs[6];
                    }
		}
		else
		{
			return false;
		}
                return true;
	}

	/**
	 * Method to return the title to use for the asset table.
	 *
	 * @return	string
	 * @since	1.6
	 */
	protected function _getAssetTitle()
	{
		return $this->name;
	}
 
}
