<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
<div class="container-fluid section-top">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				
				<div class="purchases index">
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4"><i class="fas fa-shopping-cart"></i> Purchase Lists</h3>
					</div>
					<?php echo $this->Form->create('Purchase', array('type' => 'get', 'url' => array('page' => '1'))); ?>
				<div class="row m-2">
                    
					<div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <a class="btn btn-outline-info" href="<?php echo $this->Html->url('/admin/purchases/index')?>"><i class="fas fa-refresh"></i></a>
                            </div>

                            <select class="custom-select" id="exampleFormControlSelect1" name="branch">
                                <option value="">Select Branch</option>
                                <?php
                                foreach($branches as $key=>$branch_item) {
                                    ?>

                                    <option value="<?=$key?>" <?=$key==$branch?'selected' : ''?>><?=$branch_item?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <select class="custom-select" id="exampleFormControlSelect1" name="supplier">
                                <option value="">Select Supplier</option>
                                <?php
                                foreach($suppliers as $key=>$supplier_name) {
                                    ?>

                                    <option value="<?=$key?>" <?=$key==$supplier?'selected' : ''?>><?=$supplier_name?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <div>
                            	<input type="text" name="startDate" class="form-control border" id="datepicker" placeholder=" Start Date" value="<?=$startDate?>">
                            </div>
                            <div>
                            	<input type="text" name="endDate" class="form-control border" id="datepicker2" placeholder=" End Date" value="<?=$endDate?>">
                            </div>
                            
                           
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
					<div class="table-responsive">
						<table class="table table-hover" cellpadding="0" cellspacing="0">
							<thead>
								<tr class="border-bottom">
									<th><?php echo $this->Paginator->sort('id'); ?></th>
									<th><?php echo $this->Paginator->sort('branch_id'); ?></th>
									<th><?php echo $this->Paginator->sort('supplier_id'); ?></th>
									<th><?php echo $this->Paginator->sort('numberReceived'); ?></th>
									<th><?php echo $this->Paginator->sort('purchaseDate'); ?></th>
									<th><?php echo $this->Paginator->sort('category_id'); ?></th>
									<th><?php echo $this->Paginator->sort('type'); ?></th>
									<th><?php echo $this->Paginator->sort('purchase_price'); ?></th>
									<th><?php echo $this->Paginator->sort('total_price'); ?></th>
									<th><?php echo $this->Paginator->sort('paid_amount'); ?></th>
									<th><?php echo $this->Paginator->sort('payment_status'); ?></th>
									<th><?php echo $this->Paginator->sort('due_amount'); ?></th>
									<th><?php echo $this->Paginator->sort('payment_method'); ?></th>
									<th><?php echo $this->Paginator->sort('note'); ?></th>
									<th><?php echo $this->Paginator->sort('created'); ?></th>
									<th><?php echo $this->Paginator->sort('modified'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($purchases as $purchase): ?>

									<tr class="border-bottom">
										<td><?php echo h($purchase['Purchase']['id']); ?>&nbsp;</td>
										<td>
											<?php echo $this->Html->link($purchase['Branch']['title'], array('controller' => 'branches', 'action' => 'view', $purchase['Branch']['id'])); ?>
										</td>
										<td>
											<?php echo $this->Html->link($purchase['Supplier']['supplier_name'], array('controller' => 'suppliers', 'action' => 'view', $purchase['Supplier']['id'])); ?>
										</td>
										<td><?php echo h($purchase['Purchase']['numberReceived']); ?>&nbsp;</td>
										<td><?php echo h($purchase['Purchase']['purchaseDate']); ?>&nbsp;</td>
										<td>
											<?php echo $this->Html->link($purchase['Category']['title'], array('controller' => 'categories', 'action' => 'view', $purchase['Category']['id'])); ?>
										</td>
										<td><?php echo h($purchase['Purchase']['type']); ?>&nbsp;</td>
										<td><?php echo h($purchase['Purchase']['purchase_price']); ?>&nbsp;</td>
										<td><?php echo h($purchase['Purchase']['total_price']); ?>&nbsp;</td>
										<td><?php echo h($purchase['Purchase']['paid_amount']); ?>&nbsp;</td>
										<td><?php echo h($purchase['Purchase']['payment_status']); ?>&nbsp;</td>
										<td><?php echo h($purchase['Purchase']['due_amount']); ?>&nbsp;</td>
										<td><?php echo h($purchase['Purchase']['payment_method']); ?>&nbsp;</td>
										<td><?php echo h($purchase['Purchase']['note']); ?>&nbsp;</td>
										<td><?php echo h($purchase['Purchase']['created']); ?>&nbsp;</td>
										<td><?php echo h($purchase['Purchase']['modified']); ?>&nbsp;</td>
										<td class="actions float-right">
											<?php echo $this->Html->link(__('<i class="fas fa-eye btn-sm btn-primary"></i>'), array('action' => 'view', $purchase['Purchase']['id']),['escape'=>false, 'title'=>'Delete']); ?>
											<?php echo $this->Html->link(__('<i class="fas fa-edit btn-sm btn-secondary"></i>'), array('action' => 'edit', $purchase['Purchase']['id']),['escape'=>false, 'title'=>'Delete']); ?>
											<?php echo $this->Form->postLink(__('<i class="fas fa-trash-alt btn-sm btn-danger"></i>'), array('action' => 'delete', $purchase['Purchase']['id']),['escape'=>false, 'title'=>'Delete'], array('confirm' => __('Are you sure you want to delete # %s?', $purchase['Purchase']['id']))); ?>
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



<script>
	  $( function() {
	    $( "#datepicker" ).datepicker({ format: 'yyyy-mm-dd'});
	    $( "#datepicker2" ).datepicker({ format: 'yyyy-mm-dd'});
	  } );
  </script>
