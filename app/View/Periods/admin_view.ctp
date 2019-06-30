<div class="periods view">
<h2><?php echo __('Period'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($period['Period']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Period'); ?></dt>
		<dd>
			<?php echo h($period['Period']['period']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($period['Period']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($period['Period']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($period['Period']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Period'), array('action' => 'edit', $period['Period']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Period'), array('action' => 'delete', $period['Period']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $period['Period']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Periods'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Period'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ledgers'), array('controller' => 'ledgers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ledger'), array('controller' => 'ledgers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ledgers'); ?></h3>
	<?php if (!empty($period['Ledger'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Period Id'); ?></th>
		<th><?php echo __('Credit Id'); ?></th>
		<th><?php echo __('Salary Id'); ?></th>
		<th><?php echo __('Expence Id'); ?></th>
		<th><?php echo __('Debit'); ?></th>
		<th><?php echo __('Credit'); ?></th>
		<th><?php echo __('Balance'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($period['Ledger'] as $ledger): ?>
		<tr>
			<td><?php echo $ledger['id']; ?></td>
			<td><?php echo $ledger['period_id']; ?></td>
			<td><?php echo $ledger['credit_id']; ?></td>
			<td><?php echo $ledger['salary_id']; ?></td>
			<td><?php echo $ledger['expence_id']; ?></td>
			<td><?php echo $ledger['debit']; ?></td>
			<td><?php echo $ledger['credit']; ?></td>
			<td><?php echo $ledger['balance']; ?></td>
			<td><?php echo $ledger['created']; ?></td>
			<td><?php echo $ledger['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ledgers', 'action' => 'view', $ledger['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ledgers', 'action' => 'edit', $ledger['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ledgers', 'action' => 'delete', $ledger['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ledger['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ledger'), array('controller' => 'ledgers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
