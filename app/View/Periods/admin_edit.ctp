<div class="periods form">
<?php echo $this->Form->create('Period'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Period'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('period');
		echo $this->Form->input('amount');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Period.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Period.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Periods'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ledgers'), array('controller' => 'ledgers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ledger'), array('controller' => 'ledgers', 'action' => 'add')); ?> </li>
	</ul>
</div>
