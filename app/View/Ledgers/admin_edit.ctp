<div class="ledgers form">
<?php echo $this->Form->create('Ledger'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Ledger'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('period_id');
		echo $this->Form->input('credit_id');
		echo $this->Form->input('salary_id');
		echo $this->Form->input('expence_id');
		echo $this->Form->input('debit');
		echo $this->Form->input('credit');
		echo $this->Form->input('balance');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ledger.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Ledger.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Ledgers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Credits'), array('controller' => 'credits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Credit'), array('controller' => 'credits', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Salaries'), array('controller' => 'salaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salary'), array('controller' => 'salaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Expences'), array('controller' => 'expences', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Expence'), array('controller' => 'expences', 'action' => 'add')); ?> </li>
	</ul>
</div>
