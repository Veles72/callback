<?php
/**
 * @version     1.0.0
 * @package     com_callback
 * @copyright   Copyright (C) 2011 Amy Stephen. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

$document =& JFactory::getDocument();
$document->addScript('https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js');
$document->addScript(JURI::base().'components/com_callback/assets/jquery.maskedinput-1.3.min.js');
$action = JROUTE::_(JURI::base()."index.php"); 
?>
<script type="text/javascript">
jQuery(document).ready(function($){
   $.mask.definitions['#']='[9]';  
   $("#callback_phone").mask("+7(#99) 999-99-99");
   $('#callback_form').submit(function(e){
//       e.preventDefault();
       var val_callback_name = $('#callback_name').val();
       var val_callback_phone = $('#callback_phone').val();
       if (val_callback_name==null || val_callback_name=='')
        {
            $('#callback_name').css('border','1px red solid');
            alert("<?=JTEXT::_('COM_CALLBACK_USERNAME_EMPTY')?>");
            return false;
        }
       if (val_callback_phone.length != 17)
        {
            $('#callback_phone').css('border','1px red solid');
            alert("<?=JTEXT::_('COM_CALLBACK_PHONE_EMPTY')?>");
            return false;
        }
   });
});
</script>
<form id="callback_form" action="<?=$action?>" method="post">
    <label for="callback_name"><?php echo JTEXT::_('COM_CALLBACK_INPUT_NAME')?></label>
    <input id="callback_name" type="text" name="name" value="">
    <label for="callback_phone"><?php echo JTEXT::_('COM_CALLBACK_INPUT_TELEPHON')?></label>
    <input id="callback_phone" type="text" name="phone" value=""/>
    <input type="submit" value="<?=JTEXT::_('COM_CALLBACK_CONFIRM')?>"/>
    
    <input type="hidden" name="user_id" value="<?=$this->user->id?>"/>
    <input type="hidden" name="option" value="com_callback"/>
    <input type="hidden" name="task" value="save"/>
    <?php echo JHTML::_( 'form.token' ); // устанавливаем токен?>
</form>

