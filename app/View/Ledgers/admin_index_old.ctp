<div class="ledgers index">
	<h2><?php echo __('Ledgers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('period_id'); ?></th>
			<th><?php echo $this->Paginator->sort('credit_id'); ?></th>
			<th><?php echo $this->Paginator->sort('salary_id'); ?></th>
			<th><?php echo $this->Paginator->sort('expence_id'); ?></th>
			<th><?php echo $this->Paginator->sort('debit'); ?></th>
			<th><?php echo $this->Paginator->sort('credit'); ?></th>
			<th><?php echo $this->Paginator->sort('balance'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($ledgers as $ledger): ?>
	<tr>
		<td><?php echo h($ledger['Ledger']['id']); ?>&nbsp;</td>
		<td><?php echo h($ledger['Ledger']['period_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ledger['Credit']['id'], array('controller' => 'credits', 'action' => 'view', $ledger['Credit']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ledger['Salary']['id'], array('controller' => 'salaries', 'action' => 'view', $ledger['Salary']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ledger['Expence']['id'], array('controller' => 'expences', 'action' => 'view', $ledger['Expence']['id'])); ?>
		</td>
		<td><?php echo h($ledger['Ledger']['debit']); ?>&nbsp;</td>
		<td><?php echo h($ledger['Ledger']['credit']); ?>&nbsp;</td>
		<td><?php echo h($ledger['Ledger']['balance']); ?>&nbsp;</td>
		<td><?php echo h($ledger['Ledger']['created']); ?>&nbsp;</td>
		<td><?php echo h($ledger['Ledger']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ledger['Ledger']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ledger['Ledger']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ledger['Ledger']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ledger['Ledger']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Ledger'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Credits'), array('controller' => 'credits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Credit'), array('controller' => 'credits', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Salaries'), array('controller' => 'salaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salary'), array('controller' => 'salaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Expences'), array('controller' => 'expences', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Expence'), array('controller' => 'expences', 'action' => 'add')); ?> </li>
	</ul>
</div>
