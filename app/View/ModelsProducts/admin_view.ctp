<div class="modelsProducts view">
<h2><?php echo __('Models Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($modelsProduct['ModelsProduct']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($modelsProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $modelsProduct['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Byke Model'); ?></dt>
		<dd>
			<?php echo $this->Html->link($modelsProduct['BykeModel']['name'], array('controller' => 'byke_models', 'action' => 'view', $modelsProduct['BykeModel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($modelsProduct['ModelsProduct']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($modelsProduct['ModelsProduct']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Models Product'), array('action' => 'edit', $modelsProduct['ModelsProduct']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Models Product'), array('action' => 'delete', $modelsProduct['ModelsProduct']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $modelsProduct['ModelsProduct']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Models Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Models Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Byke Models'), array('controller' => 'byke_models', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Byke Model'), array('controller' => 'byke_models', 'action' => 'add')); ?> </li>
	</ul>
</div>
