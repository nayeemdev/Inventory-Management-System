<section class="forms">
	<div class="container-fluid section-top">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4"><i class="fas fa-edit"></i> Edit</h3>
					</div>
					<div class="card-body">
						<?php echo $this->Form->create('Brand',array('enctype' => 'multipart/form-data')); ?>
						<?php echo $this->Form->input('id');?>
						<div class="form-group">
							<?php echo $this->Form->input('name',['label'=> 'Name','class' => 'form-control','type'=>'text']); ?>
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




<!-- <div class="brands form">
<?php echo $this->Form->create('Brand'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Brand'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Brands'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Byke Models'), array('controller' => 'byke_models', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Byke Model'), array('controller' => 'byke_models', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->
