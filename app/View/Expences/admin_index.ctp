
<section class="tables">
	<div class="container-fluid section-top">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
				   <!-- <div class="card-close">
						<div class="dropdown">
							<button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
							<div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
						</div>
					</div>-->
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4"><i class="fas fa-usd"></i> Expenses</h3>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr class="border-bottom">
										<th><?php echo $this->Paginator->sort('id'); ?></th>
										<th><?php echo $this->Paginator->sort('paidby'); ?></th>
										<th><?php echo $this->Paginator->sort('description'); ?></th>
										<th><?php echo $this->Paginator->sort('amount'); ?></th>
										<th><?php echo $this->Paginator->sort('created'); ?></th>
										<th><?php echo $this->Paginator->sort('modified'); ?></th>
										<th class="actions"><?php echo __('Actions'); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($expences as $expence): ?>
										<tr class="border-bottom">
											<td><?php echo h($expence['Expence']['id']); ?>&nbsp;</td>
											<td><?php echo h($expence['Expence']['paidby']); ?>&nbsp;</td>
											<td><?php echo h($expence['Expence']['description']); ?>&nbsp;</td>
											<td><?php echo h($expence['Expence']['amount']); ?>&nbsp;</td>
											<td><?php echo h($expence['Expence']['created']); ?>&nbsp;</td>
											<td><?php echo h($expence['Expence']['modified']); ?>&nbsp;</td>
											<td class="actions float-right">
												<?php
												$today_date = date('F,Y');
												$formatted_date = date_format(date_create($expence['Expence']['created']),'F,Y');
												if($today_date==$formatted_date){
													?>
													<?php echo $this->Html->link(__('<i class="fas fa-eye btn-sm btn-primary"></i>'), array('action' => 'view', $expence['Expence']['id']),['escape' => false, 'title'=>'Viwe']); ?>
													<?php echo $this->Html->link(__('<i class="fas fa-edit btn-sm btn-secondary"></i>'), array('action' => 'edit', $expence['Expence']['id']),['escape' => false, 'title'=>'Viwe']); ?>
													<?php echo $this->Form->postLink(__('<i class="fas fa-trash-alt btn-sm btn-danger"></i>'), array('action' => 'delete', $expence['Expence']['id']),['escape' => false, 'title'=>'Viwe'], array('confirm' => __('Are you sure you want to delete # %s?', $expence['Expence']['id']))); ?>
												<?php } ?>
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
							?>
						</p>
						<div class="clearfix"></div>
						<nav aria-label="Page navigation example">
							<ul class="pagination justify-content-center pull-right">
								<?php
								echo '<li class="page-item">'.$this->Paginator->prev( __('Previous'), array(), null, array('class' => 'page-link d-inline')).'</li>';
								echo '<li class="page-item">'.$this->Paginator->numbers(array('separator' => '')).'</li>';
								echo '<li class="page-item">'.$this->Paginator->next(__('Next'), array(), null, array('class' => 'page-link d-inline')).'</li>';
								?>
							</ul>
						</nav>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>