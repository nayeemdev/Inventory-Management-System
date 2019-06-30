<div class="sells view">
<h2><?php echo __('Sell'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sell['Sell']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sell['Branch']['title'], array('controller' => 'branches', 'action' => 'view', $sell['Branch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sell['Customer']['id'], array('controller' => 'customers', 'action' => 'view', $sell['Customer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sell['Product']['name'], array('controller' => 'products', 'action' => 'view', $sell['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sale Date'); ?></dt>
		<dd>
			<?php echo h($sell['Sell']['sale_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($sell['Sell']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php echo h($sell['Sell']['rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Price'); ?></dt>
		<dd>
			<?php echo h($sell['Sell']['total_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($sell['Sell']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($sell['Sell']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sell'), array('action' => 'edit', $sell['Sell']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sell'), array('action' => 'delete', $sell['Sell']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sell['Sell']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Sells'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sell'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
