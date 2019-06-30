<div class="employees view">
<h2><?php echo __('Employee'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salary'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['salary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Employee'), array('action' => 'edit', $employee['Employee']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Employee'), array('action' => 'delete', $employee['Employee']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $employee['Employee']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ledgers'), array('controller' => 'ledgers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ledger'), array('controller' => 'ledgers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Salaries'), array('controller' => 'salaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salary'), array('controller' => 'salaries', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ledgers'); ?></h3>
	<?php if (!empty($employee['Ledger'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Credit Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Expence Id'); ?></th>
		<th><?php echo __('Debit'); ?></th>
		<th><?php echo __('Credit'); ?></th>
		<th><?php echo __('Balance'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($employee['Ledger'] as $ledger): ?>
		<tr>
			<td><?php echo $ledger['id']; ?></td>
			<td><?php echo $ledger['credit_id']; ?></td>
			<td><?php echo $ledger['employee_id']; ?></td>
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
<div class="related">
	<h3><?php echo __('Related Salaries'); ?></h3>
	<?php if (!empty($employee['Salary'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Employee'); ?></th>
		<th><?php echo __('PaidBy'); ?></th>
		<th><?php echo __('Bonus'); ?></th>
		<th><?php echo __('Salary'); ?></th>
		<th><?php echo __('Created At'); ?></th>
		<th><?php echo __('Updated At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($employee['Salary'] as $salary): ?>
		<tr>
			<td><?php echo $salary['id']; ?></td>
			<td><?php echo $salary['employee_id']; ?></td>
			<td><?php echo $salary['employee']; ?></td>
			<td><?php echo $salary['paidBy']; ?></td>
			<td><?php echo $salary['bonus']; ?></td>
			<td><?php echo $salary['salary']; ?></td>
			<td><?php echo $salary['created_at']; ?></td>
			<td><?php echo $salary['updated_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'salaries', 'action' => 'view', $salary['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'salaries', 'action' => 'edit', $salary['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'salaries', 'action' => 'delete', $salary['id']), array('confirm' => __('Are you sure you want to delete # %s?', $salary['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Salary'), array('controller' => 'salaries', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
