<div class="container-fluid section-top">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="suppliers index">
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4"><i class="fas fa-users"></i> Suppliers</h3>
					</div>
					<div class="table-responsive">
						<table class="table table-hover" cellpadding="0" cellspacing="0">
							<thead>
								<tr class="border-bottom">
									<th><?php echo $this->Paginator->sort('id'); ?></th>
									<th><?php echo $this->Paginator->sort('supplier_name'); ?></th>
									<th><?php echo $this->Paginator->sort('image'); ?></th>
									<th><?php echo $this->Paginator->sort('email'); ?></th>
									<th><?php echo $this->Paginator->sort('phone'); ?></th>
									<th><?php echo $this->Paginator->sort('address'); ?></th>
									<th><?php echo $this->Paginator->sort('created'); ?></th>
									<th><?php echo $this->Paginator->sort('modified'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($suppliers as $supplier): ?>
									<tr class="border-bottom">
										<td><?php echo h($supplier['Supplier']['id']); ?>&nbsp;</td>
										<td><?php echo h($supplier['Supplier']['supplier_name']); ?>&nbsp;</td>
										<td><?php echo $this->Html->image('/files/products_images/supplier/thumb/'.$supplier['Supplier']['image'], ['width' => '50']); ?>&nbsp;</td>
										<td><?php echo h($supplier['Supplier']['email']); ?>&nbsp;</td>
										<td><?php echo h($supplier['Supplier']['phone']); ?>&nbsp;</td>
										<td><?php echo h($supplier['Supplier']['address']); ?>&nbsp;</td>
										<td><?php echo h($supplier['Supplier']['created']); ?>&nbsp;</td>
										<td><?php echo h($supplier['Supplier']['modified']); ?>&nbsp;</td>
										<td class="actions float-right">
											<?php echo $this->Html->link(__('<i class="fas fa-eye btn-sm btn-primary"></i>'), array('action' => 'view', $supplier['Supplier']['id']),['escape'=>false, 'title'=>'Delete']); ?>
											<?php echo $this->Html->link(__('<i class="fas fa-edit btn-sm btn-secondary"></i>'), array('action' => 'edit', $supplier['Supplier']['id']),['escape'=>false, 'title'=>'Delete']); ?>
											<?php echo $this->Form->postLink(__('<i class="fas fa-trash-alt btn-sm btn-danger"></i>'), array('action' => 'delete', $supplier['Supplier']['id']),['escape'=>false, 'title'=>'Delete'], array('confirm' => __('Are you sure you want to delete # %s?', $supplier['Supplier']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Supplier'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Purchases'), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase'), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->