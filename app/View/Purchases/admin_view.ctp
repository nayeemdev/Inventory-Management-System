<div class="purchases view">
<h2><?php echo __('Purchase'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchase['Branch']['title'], array('controller' => 'branches', 'action' => 'view', $purchase['Branch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchase['Supplier']['id'], array('controller' => 'suppliers', 'action' => 'view', $purchase['Supplier']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NumberReceived'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['numberReceived']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PurchaseDate'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['purchaseDate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchase['Category']['title'], array('controller' => 'categories', 'action' => 'view', $purchase['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Purchase Price'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['purchase_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Price'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['total_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paid Amount'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['paid_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment Status'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['payment_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Due Amount'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['due_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment Method'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['payment_method']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($purchase['Purchase']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Purchase'), array('action' => 'edit', $purchase['Purchase']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Purchase'), array('action' => 'delete', $purchase['Purchase']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchase['Purchase']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchases'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
