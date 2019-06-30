<div class="stocks view">
<h2><?php echo __('Stock'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stock['Product']['name'], array('controller' => 'products', 'action' => 'view', $stock['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cur Qty'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['cur_qty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cur Price'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['cur_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stock['Branch']['title'], array('controller' => 'branches', 'action' => 'view', $stock['Branch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Int Qty'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['int_qty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Int Price'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['int_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stock'), array('action' => 'edit', $stock['Stock']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stock'), array('action' => 'delete', $stock['Stock']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $stock['Stock']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
	</ul>
</div>
