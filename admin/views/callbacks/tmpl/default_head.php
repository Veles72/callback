<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<tr>
	<th width="5">
		<?php echo JText::_('COM_CALLBACK_CALLBACK_ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>			
	<th>
		<?php echo JText::_('COM_CALLBACK_CALLBACK_NAME'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_CALLBACK_CALLBACK_TELNUM'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_CALLBACK_CALLBACK_TIME_CREATE'); ?>
	</th>
</tr>
