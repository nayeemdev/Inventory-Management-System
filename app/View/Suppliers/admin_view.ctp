<div class="suppliers view">
<h2><?php echo __('Supplier'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($supplier['Supplier']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier Name'); ?></dt>
		<dd>
			<?php echo h($supplier['Supplier']['supplier_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($supplier['Supplier']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($supplier['Supplier']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($supplier['Supplier']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($supplier['Supplier']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($supplier['Supplier']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($supplier['Supplier']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Supplier'), array('action' => 'edit', $supplier['Supplier']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Supplier'), array('action' => 'delete', $supplier['Supplier']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $supplier['Supplier']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchases'), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase'), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Purchases'); ?></h3>
	<?php if (!empty($supplier['Purchase'])): ?>
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
	<?php foreach ($supplier['Purchase'] as $purchase): ?>
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
