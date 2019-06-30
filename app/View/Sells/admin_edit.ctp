<section class="forms">
	<div class="container-fluid section-top">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4">Admin Edit Sales</h3>
					</div>
					<div class="card-body">
						<?php echo $this->Form->create('Sell',array('enctype' => 'multipart/form-data')); ?>
						<?php echo $this->Form->input('id');?>
						<div class="form-group">
							<?php echo $this->Form->input('branch_id',['label'=> 'Branch Name','class' => 'form-control','option']); ?>
						</div>
						<div class="form-group">
							<?php echo $this->Form->input('customer_id',['label'=> 'Customers Name','class' => 'form-control','option']); ?>
						</div>
						<div class="form-group">
							<?php echo $this->Form->input('product_id',['label'=> 'Product Name','class' => 'form-control','option']); ?>
						</div>
						
						<div class="form-group">
							<?php  echo $this->Form->input('sale_date',['label'=> 'Sale Date']); ?>

						</div>

						<div class="form-group">
							<?php echo $this->Form->input('quantity',['label'=> 'Quantity','class' => 'form-control','type'=>'number']); ?>
						</div>

						<div class="form-group">
							<?php echo $this->Form->input('rate',['label'=> 'Rate','class' => 'form-control','type'=>'number']); ?>
						</div>

						<div class="form-group">
							<?php echo $this->Form->input('total_price',['label'=> 'Total Price','class' => 'form-control','type'=>'number']); ?>
						</div>
						
						<!-- <div class="form-group">
							<?php 
							echo $this->Form->input('category_id',['class' => 'form-control', 'options' =>$categories]); ?>
						</div> -->
						<div class="row">
							<div class="offset-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<button class="btn btn-outline-primary btn-block">Update Sale Product</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</section>















<!-- <div class="sells form">
<?php echo $this->Form->create('Sell'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Sell'); ?></legend>
	<?php
		echo $this->Form->input('branch_id');
		echo $this->Form->input('customer_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('sale_date');
		echo $this->Form->input('quantity');
		echo $this->Form->input('rate');
		echo $this->Form->input('total_price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div> -->
<!--
 <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sells'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->
<!-- 
<div class="sells form">
<?php echo $this->Form->create('Sell'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Sell'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('branch_id');
		echo $this->Form->input('customer_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('sale_date');
		echo $this->Form->input('quantity');
		echo $this->Form->input('rate');
		echo $this->Form->input('total_price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Sell.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Sell.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Sells'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->