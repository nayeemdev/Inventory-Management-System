<div class="periods form">
<?php echo $this->Form->create('Period'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Period'); ?></legend>
	<?php
		echo $this->Form->input('period');
		echo $this->Form->input('amount');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Periods'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ledgers'), array('controller' => 'ledgers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ledger'), array('controller' => 'ledgers', 'action' => 'add')); ?> </li>
	</ul>
</div>
