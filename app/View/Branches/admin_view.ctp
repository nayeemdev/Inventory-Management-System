<div class="branches view">
<h2><?php echo __('Branch'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Branch'), array('action' => 'edit', $branch['Branch']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Branch'), array('action' => 'delete', $branch['Branch']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $branch['Branch']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchases'), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase'), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sells'), array('controller' => 'sells', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sell'), array('controller' => 'sells', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Purchases'); ?></h3>
	<?php if (!empty($branch['Purchase'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Branch Id'); ?></th>
		<th><?php echo __('Supplier Id'); ?></th>
		<th><?php echo __('NumberReceived'); ?></th>
		<th><?php echo __('PurchaseDate'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Purchase Price'); ?></th>
		<th><?php echo __('Total Price'); ?></th>
		<th><?php echo __('Paid Amount'); ?></th>
		<th><?php echo __('Payment Status'); ?></th>
		<th><?php echo __('Due Amount'); ?></th>
		<th><?php echo __('Payment Method'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($branch['Purchase'] as $purchase): ?>
		<tr>
			<td><?php echo $purchase['id']; ?></td>
			<td><?php echo $purchase['branch_id']; ?></td>
			<td><?php echo $purchase['supplier_id']; ?></td>
			<td><?php echo $purchase['numberReceived']; ?></td>
			<td><?php echo $purchase['purchaseDate']; ?></td>
			<td><?php echo $purchase['category_id']; ?></td>
			<td><?php echo $purchase['type']; ?></td>
			<td><?php echo $purchase['purchase_price']; ?></td>
			<td><?php echo $purchase['total_price']; ?></td>
			<td><?php echo $purchase['paid_amount']; ?></td>
			<td><?php echo $purchase['payment_status']; ?></td>
			<td><?php echo $purchase['due_amount']; ?></td>
			<td><?php echo $purchase['payment_method']; ?></td>
			<td><?php echo $purchase['note']; ?></td>
			<td><?php echo $purchase['created']; ?></td>
			<td><?php echo $purchase['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'purchases', 'action' => 'view', $purchase['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'purchases', 'action' => 'edit', $purchase['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'purchases', 'action' => 'delete', $purchase['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchase['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Purchase'), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Sells'); ?></h3>
	<?php if (!empty($branch['Sell'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Branch Id'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Sale Date'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Rate'); ?></th>
		<th><?php echo __('Total Price'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($branch['Sell'] as $sell): ?>
		<tr>
			<td><?php echo $sell['id']; ?></td>
			<td><?php echo $sell['branch_id']; ?></td>
			<td><?php echo $sell['customer_id']; ?></td>
			<td><?php echo $sell['product_id']; ?></td>
			<td><?php echo $sell['sale_date']; ?></td>
			<td><?php echo $sell['quantity']; ?></td>
			<td><?php echo $sell['rate']; ?></td>
			<td><?php echo $sell['total_price']; ?></td>
			<td><?php echo $sell['created']; ?></td>
			<td><?php echo $sell['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sells', 'action' => 'view', $sell['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sells', 'action' => 'edit', $sell['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sells', 'action' => 'delete', $sell['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sell['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sell'), array('controller' => 'sells', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Stocks'); ?></h3>
	<?php if (!empty($branch['Stock'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Cur Qty'); ?></th>
		<th><?php echo __('Cur Price'); ?></th>
		<th><?php echo __('Branch Id'); ?></th>
		<th><?php echo __('Int Qty'); ?></th>
		<th><?php echo __('Int Price'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($branch['Stock'] as $stock): ?>
		<tr>
			<td><?php echo $stock['id']; ?></td>
			<td><?php echo $stock['product_id']; ?></td>
			<td><?php echo $stock['cur_qty']; ?></td>
			<td><?php echo $stock['cur_price']; ?></td>
			<td><?php echo $stock['branch_id']; ?></td>
			<td><?php echo $stock['int_qty']; ?></td>
			<td><?php echo $stock['int_price']; ?></td>
			<td><?php echo $stock['created']; ?></td>
			<td><?php echo $stock['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'stocks', 'action' => 'view', $stock['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'stocks', 'action' => 'edit', $stock['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'stocks', 'action' => 'delete', $stock['id']), array('confirm' => __('Are you sure you want to delete # %s?', $stock['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
