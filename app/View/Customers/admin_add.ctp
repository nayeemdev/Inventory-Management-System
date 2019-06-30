<section class="forms">
	<div class="container-fluid section-top">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4"><i class="fas fa-user-plus"></i> Admin Add Customers</h3>
					</div>
					<div class="card-body">
						<?php echo $this->Form->create('Customer',array('enctype' => 'multipart/form-data')); ?>

						<div class="form-group">
							<?php echo $this->Form->input('fullname',['label'=> 'Full Name','class' => 'form-control','type'=>'text']); ?>
						</div>
						<div class="form-group">
							<?php echo $this->Form->input('phone',['label'=> 'Phone Number','class' => 'form-control','type'=>'text']); ?>
						</div>
						<div class="form-group">
							<?php echo $this->Form->input('email',['label'=> 'Email','class' => 'form-control','type'=>'email']); ?>
						</div>
						<div class="form-group">
							<?php echo $this->Form->input('address',['label'=> 'Address','class' => 'form-control','type'=>'text']); ?>
						</div>
						<div class="form-group">
							<?php echo $this->Form->input('image',['type'=> 'file','class' => 'form-control', 'required' => false]); ?>
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