<div class="ledgers view">
<h2><?php echo __('Ledger'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ledger['Ledger']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Period Id'); ?></dt>
		<dd>
			<?php echo h($ledger['Ledger']['period_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Credit'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ledger['Credit']['id'], array('controller' => 'credits', 'action' => 'view', $ledger['Credit']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salary'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ledger['Salary']['id'], array('controller' => 'salaries', 'action' => 'view', $ledger['Salary']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expence'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ledger['Expence']['id'], array('controller' => 'expences', 'action' => 'view', $ledger['Expence']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Debit'); ?></dt>
		<dd>
			<?php echo h($ledger['Ledger']['debit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Credit'); ?></dt>
		<dd>
			<?php echo h($ledger['Ledger']['credit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Balance'); ?></dt>
		<dd>
			<?php echo h($ledger['Ledger']['balance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ledger['Ledger']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ledger['Ledger']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ledger'), array('action' => 'edit', $ledger['Ledger']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ledger'), array('action' => 'delete', $ledger['Ledger']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ledger['Ledger']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Ledgers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ledger'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Credits'), array('controller' => 'credits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Credit'), array('controller' => 'credits', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Salaries'), array('controller' => 'salaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salary'), array('controller' => 'salaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Expences'), array('controller' => 'expences', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Expence'), array('controller' => 'expences', 'action' => 'add')); ?> </li>
	</ul>
</div>
