<section class="forms">
	<div class="container-fluid section-top">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4"><i class="fas fa-edit"></i> Edit</h3>
					</div>
					<div class="card-body">
						<?php echo $this->Form->create('BykeModel',array('enctype' => 'multipart/form-data')); ?>
						<?php echo $this->Form->input('id');?>
						<div class="form-group">
							<?php 
							echo $this->Form->input('brand_id',['class' => 'form-control', 'options' =>$brands]); ?>
						</div>
						<div class="form-group">
							<?php echo $this->Form->input('name',['label'=> 'Name','class' => 'form-control','type'=>'text']); ?>
						</div>
						<div class="form-group">
							<?php echo $this->Form->input('image',['type'=> 'file','class' => 'form-control']); ?>
						</div>
						
						<div class="row">
							<div class="offset-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<button class="btn btn-outline-primary btn-block"><i class="fas fa-save"></i> Save</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>











<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Byke Models'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Models Products'), array('controller' => 'models_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Models Product'), array('controller' => 'models_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->

<!-- 
<div class="bykeModels form">
<?php echo $this->Form->create('BykeModel'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Byke Model'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('brand_id');
		echo $this->Form->input('name');
		echo $this->Form->input('image');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BykeModel.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('BykeModel.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Byke Models'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Models Products'), array('controller' => 'models_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Models Product'), array('controller' => 'models_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->
