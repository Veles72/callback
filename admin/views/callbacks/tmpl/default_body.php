<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
        <?php
                preg_match("/([0-9]{3})([0-9]{3})([0-9]{2})([0-9]{2})/", $item->telnum, $regs);
                preg_match("/([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9]{2}):([0-9]{2}):([0-9]{2})/", $item->time_create, $t_regs);
        ?>
	<tr class="row<?php echo $i % 2; ?>">
		<td>
			<?php echo $item->id; ?>
		</td>
		<td>
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td>
			<?php echo $item->name; ?>
		</td>
		<td>
			<?=count($regs)>0?'+7('.$regs[1].') '.$regs[2].'-'.$regs[3].'-'.$regs[4]:''; ?>
		</td>
		<td>
			<?=count($t_regs)>0?$t_regs[3].'.'.$t_regs[2].'.'.$t_regs[1].' '.$t_regs[4].':'.$t_regs[5].':'.$t_regs[6]:''; ?>
		</td>
	</tr>
<?php endforeach; ?>
