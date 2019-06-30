<div class="bykeModels view">
<h2><?php echo __('Byke Model'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bykeModel['BykeModel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bykeModel['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $bykeModel['Brand']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bykeModel['BykeModel']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($bykeModel['BykeModel']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bykeModel['BykeModel']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($bykeModel['BykeModel']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Byke Model'), array('action' => 'edit', $bykeModel['BykeModel']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Byke Model'), array('action' => 'delete', $bykeModel['BykeModel']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $bykeModel['BykeModel']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Byke Models'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Byke Model'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Models Products'), array('controller' => 'models_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Models Product'), array('controller' => 'models_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Models Products'); ?></h3>
	<?php if (!empty($bykeModel['ModelsProduct'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Byke Model Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bykeModel['ModelsProduct'] as $modelsProduct): ?>
		<tr>
			<td><?php echo $modelsProduct['id']; ?></td>
			<td><?php echo $modelsProduct['product_id']; ?></td>
			<td><?php echo $modelsProduct['byke_model_id']; ?></td>
			<td><?php echo $modelsProduct['created']; ?></td>
			<td><?php echo $modelsProduct['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'models_products', 'action' => 'view', $modelsProduct['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'models_products', 'action' => 'edit', $modelsProduct['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'models_products', 'action' => 'delete', $modelsProduct['id']), array('confirm' => __('Are you sure you want to delete # %s?', $modelsProduct['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Models Product'), array('controller' => 'models_products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
