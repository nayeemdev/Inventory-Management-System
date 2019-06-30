<div class="brands view">
<h2><?php echo __('Brand'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Brand'), array('action' => 'edit', $brand['Brand']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Brand'), array('action' => 'delete', $brand['Brand']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $brand['Brand']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Byke Models'), array('controller' => 'byke_models', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Byke Model'), array('controller' => 'byke_models', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Byke Models'); ?></h3>
	<?php if (!empty($brand['BykeModel'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Brand Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($brand['BykeModel'] as $bykeModel): ?>
		<tr>
			<td><?php echo $bykeModel['id']; ?></td>
			<td><?php echo $bykeModel['brand_id']; ?></td>
			<td><?php echo $bykeModel['name']; ?></td>
			<td><?php echo $bykeModel['image']; ?></td>
			<td><?php echo $bykeModel['created']; ?></td>
			<td><?php echo $bykeModel['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'byke_models', 'action' => 'view', $bykeModel['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'byke_models', 'action' => 'edit', $bykeModel['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'byke_models', 'action' => 'delete', $bykeModel['id']), array('confirm' => __('Are you sure you want to delete # %s?', $bykeModel['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Byke Model'), array('controller' => 'byke_models', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
