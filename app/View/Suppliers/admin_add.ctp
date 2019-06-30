<section class="forms">
	<div class="container-fluid section-top">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4"><i class="fas fa-user-plus"></i> Admin Add Supplier</h3>
					</div>
					<div class="card-body">
						<?php echo $this->Form->create('Supplier',array('enctype' => 'multipart/form-data')); ?>
						<div class="form-group">
							<?php echo $this->Form->input('supplier_name',['label'=> 'Supplier Name','class' => 'form-control','type'=>'text']); ?>
						</div>
						<div class="form-group">
							<?php echo $this->Form->input('email',['label'=> 'Email','class' => 'form-control','type'=>'email']); ?>
						</div>
						<div class="form-group">
						</div>
						<div class="form-group">
							<?php echo $this->Form->input('phone',['label'=> 'Phone Number','class' => 'form-control','type'=>'text']); ?>
						</div>
						<div class="form-group">
							<?php echo $this->Form->input('address',['label'=> 'Address','class' => 'form-control','type'=>'text']); ?>
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
</div>
</section>
















<!-- <div class="suppliers form">
<?php echo $this->Form->create('Supplier'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Supplier'); ?></legend>
	<?php
		echo $this->Form->input('supplier_name');
		echo $this->Form->input('image');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('address');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Suppliers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Purchases'), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase'), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->