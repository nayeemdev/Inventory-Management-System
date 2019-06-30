<div class="container-fluid section-top">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="branches index">
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4"><i class="fas fa-code-branch"></i> Admin Branches List</h3>
					</div>
					<div class="table-responsive">
					<table class="table table-hover"cellpadding="0" cellspacing="0">
					<thead>
					<tr class="border-bottom">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('title'); ?></th>
							<th><?php echo $this->Paginator->sort('address'); ?></th>
							<th><?php echo $this->Paginator->sort('created'); ?></th>
							<th><?php echo $this->Paginator->sort('modified'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($branches as $branch): ?>
					<tr class="border-bottom">
						<td><?php echo h($branch['Branch']['id']); ?>&nbsp;</td>
						<td><?php echo h($branch['Branch']['title']); ?>&nbsp;</td>
						<td><?php echo h($branch['Branch']['address']); ?>&nbsp;</td>
						<td><?php echo h($branch['Branch']['created']); ?>&nbsp;</td>
						<td><?php echo h($branch['Branch']['modified']); ?>&nbsp;</td>
						<td class="actions float-right">
							<?php echo $this->Html->link(__('<i class="fas fa-eye btn-sm btn-primary"></i>'), array('action' => 'view', $branch['Branch']['id']), ['escape'=>false]); ?>
							<?php echo $this->Html->link(__('<i class="fas fa-edit btn-sm btn-secondary"></i>'), array('action' => 'edit', $branch['Branch']['id']), ['escape'=>false]); ?>
							<?php echo $this->Form->postLink(__('<i class="fas fa-trash-alt btn-sm btn-danger"></i>'), array('action' => 'delete', $branch['Branch']['id']),['escape'=>false], array('confirm' => __('Are you sure you want to delete # %s?', $branch['Branch']['id']))); ?>
						</td>
					</tr>
				<?php endforeach; ?>
					</tbody>
					</table>
				</div>
					<p class="pl-2">
					<?php
					echo $this->Paginator->counter(array(
						'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
					?>	</p>
					<div class="paging float-right p-4">
					<?php
						echo $this->Paginator->prev(__('previous'), array(), null, array('class' => 'page-link d-inline'));
						echo $this->Paginator->numbers(array('separator' => ''));
						echo "  ";
						echo $this->Paginator->next(__('next') , array(), null, array('class' => 'page-link d-inline'));
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Branch'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Purchases'), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase'), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sells'), array('controller' => 'sells', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sell'), array('controller' => 'sells', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->