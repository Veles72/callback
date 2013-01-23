<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
$form_action = JRoute::_('index.php?option=com_callback&layout=edit&id=' . (int) $this->item->id);
?>
<form action="<?php echo $form_action ?>" method="post" name="adminForm" id="callback-form" class="form-validate">

    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <legend>
                <?php echo empty($this->item->id) ? JText::_('COM_CALLBACKS_NEW_CALLBACK') : JText::sprintf('COM_CALLBACKS_CALLBACK_DETAILS', $this->item->id); ?>
            </legend>
                <ul class="adminformlist">
                    <?if($this->item->id == 0):?>
			<?php foreach($this->form->getFieldset('new') as $field): ?>
				<li><?php echo $field->label; ?>
					<?php echo $field->input; ?></li>
			<?php endforeach; ?>
                    <?php else:?>
			<?php foreach($this->form->getFieldset('edit') as $field): ?>
				<li><?php echo $field->label; ?>
					<?php echo $field->input; ?></li>
			<?php endforeach; ?>
                    <?php endif?>
                </ul>
        </fieldset>

    </div>
    <div>
        <input type="hidden" name="task" value="callback.edit" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>
