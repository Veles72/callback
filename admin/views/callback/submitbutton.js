Joomla.submitbutton = function(task)
{
	if (task == '')
	{
            return false;
	}
	else
	{
            Joomla.submitform(task);
	}
}
jQuery(document).ready(function($){
   $.mask.definitions['#']='[9]';  
   $("#jform_telnum").mask("+7(#99) 999-99-99");
});
