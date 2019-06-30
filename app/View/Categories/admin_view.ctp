<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($category['Category']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($category['Category']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($category['Category']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchases'), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase'), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Purchases'); ?></h3>
	<?php if (!empty($category['Purchase'])): ?>
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
	<?php foreach ($category['Purchase'] as $purchase): ?>
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
