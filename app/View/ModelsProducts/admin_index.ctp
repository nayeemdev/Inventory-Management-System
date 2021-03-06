<div class="container-fluid section-top">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="modelsProducts index">
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4"><i class="fas fa-gifts"></i> Admin Models & Products List</h3>
					</div>
					<div class="table-responsive">
						<table class="table table-hover" cellpadding="0" cellspacing="0">
							<thead>
								<tr class="border-bottom">
									<th><?php echo $this->Paginator->sort('id'); ?></th>
									<th><?php echo $this->Paginator->sort('product_id'); ?></th>
									<th><?php echo $this->Paginator->sort('byke_model_id'); ?></th>
									<th><?php echo $this->Paginator->sort('created'); ?></th>
									<th><?php echo $this->Paginator->sort('modified'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($modelsProducts as $modelsProduct): ?>
									<tr class="border-bottom">
										<td><?php echo h($modelsProduct['ModelsProduct']['id']); ?>&nbsp;</td>
										<td>
											<?php echo $this->Html->link($modelsProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $modelsProduct['Product']['id'])); ?>
										</td>
										<td>
											<?php echo $this->Html->link($modelsProduct['BykeModel']['name'], array('controller' => 'byke_models', 'action' => 'view', $modelsProduct['BykeModel']['id'])); ?>
										</td>
										<td><?php echo h($modelsProduct['ModelsProduct']['created']); ?>&nbsp;</td>
										<td><?php echo h($modelsProduct['ModelsProduct']['modified']); ?>&nbsp;</td>
										<td class="actions float-right">
											<?php echo $this->Html->link(__('<i class="fas fa-eye btn-sm btn-primary"></i>'), array('action' => 'view', $modelsProduct['ModelsProduct']['id']),['escape'=>false, 'title'=>'Delete']); ?>
											<?php echo $this->Html->link(__('<i class="fas fa-edit btn-sm btn-secondary"></i>'), array('action' => 'edit', $modelsProduct['ModelsProduct']['id']),['escape'=>false, 'title'=>'Delete']); ?>
											<?php echo $this->Form->postLink(__('<i class="fas fa-trash-alt btn-sm btn-danger"></i>'), array('action' => 'delete', $modelsProduct['ModelsProduct']['id']),['escape'=>false, 'title'=>'Delete'], array('confirm' => __('Are you sure you want to delete # %s?', $modelsProduct['ModelsProduct']['id']))); ?>
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
							echo $this->Paginator->prev( __('previous'), array(), null, array('class' => 'page-link d-inline'));
							echo $this->Paginator->numbers(array('separator' => ''));
							echo $this->Paginator->next(__('next'), array(), null, array('class' => 'page-link d-inline'));
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
		<li><?php echo $this->Html->link(__('New Models Product'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Byke Models'), array('controller' => 'byke_models', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Byke Model'), array('controller' => 'byke_models', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->