<section class="forms">
	<div class="container-fluid section-top">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4"><i class="fas fa-plus"></i> Admin Add Bike Model</h3>
					</div>
					<div class="card-body">
						<?php echo $this->Form->create('BykeModel',array('enctype' => 'multipart/form-data')); ?>
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
