<section class="forms">
	<div class="container-fluid section-top">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4"><i class="fas fa-edit"></i> Edit</h3>
					</div>
					<div class="card-body">
						<?php echo $this->Form->create('Branch',array('enctype' => 'multipart/form-data')); ?>
						<?php echo $this->Form->input('id');?>
						<div class="form-group">
							<?php echo $this->Form->input('title',['label'=> 'Title','class' => 'form-control','type'=>'text']); ?>
						</div>
						<div class="form-group">
							<?php echo $this->Form->input('address',['label'=> 'Address','class' => 'form-control','type'=>'text']); ?>
						</div>
						
						
						<div class="row">
							<div class="offset-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<button class="btn btn-outline-primary btn-block"><i class="fas fa-save"></i> Update</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--  -->
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Branches'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Purchases'), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase'), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sells'), array('controller' => 'sells', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sell'), array('controller' => 'sells', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->