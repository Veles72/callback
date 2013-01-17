<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
$form_action = JRoute::_('index.php?option=com_callback&layout=edit&id=' . (int) $this->item->id);
?>
<form action="<?php echo $form_action ?>" method="post" name="adminForm" id="callback-form" class="form-validate">

    <div class="width-60 fltlft">
            <?php var_dump($this->item)?>
    </div>
    <div>
        <input type="hidden" name="task" value="callback.edit" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>
