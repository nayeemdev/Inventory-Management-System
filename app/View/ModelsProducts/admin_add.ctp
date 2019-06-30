<section class="forms">
	<div class="container-fluid section-top">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4"><i class="fas fa-plus"></i> Admin Add Models & Product</h3>
					</div>
					<div class="card-body">
						<?php echo $this->Form->create('ModelsProduct',array('enctype' => 'multipart/form-data')); ?>
						
						
						<div class="form-group">
							<?php 
							echo $this->Form->input('product_id',['class' => 'form-control', 'options']); ?>
						</div>
						<div class="form-group">
							<?php 
							echo $this->Form->input('byke_model_id',['class' => 'form-control', 'options']); ?>
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

















<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Models Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Byke Models'), array('controller' => 'byke_models', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Byke Model'), array('controller' => 'byke_models', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->