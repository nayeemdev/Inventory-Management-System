<div class="container-fluid section-top">
	<div class="row">
		<div class="col-md-12">
			<div class="card">

			<div class="bykeModels index">
				<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4"><i class="fas fa-motorcycle"></i> Admin Bike Model List</h3>
				</div>
                <?php echo $this->Form->create('BykeModel', array('type' => 'get', 'url' => array('page' => '1'))); ?>
                <div class="row m-2">
                    <div class="col-md-3"></div>

                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <a class="btn btn-outline-info" href="<?php echo $this->Html->url('/admin/byke_models/index')?>"><i class="fas fa-refresh"></i></a>
                            </div>

                            <select class="custom-select" id="exampleFormControlSelect1" name="brand">
                                <option value="">Select Brand</option>
                                <?php
                                //pr($brands);
                                foreach($brands as $key=>$brand_item) {
                                    ?>
                                    <option value="<?=$key?>" <?=$key==$brand ?'selected' : ''?>><?=$brand_item?></option>
                                <?php
                                }
                                ?>
                            <input type="text" class="form-control" placeholder="Search by a model.."
                                   aria-label="Search by keyword.." aria-describedby="basic-addon2" name="keyword" value="<?=@$keyword?>">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>

				<div class="table-responsive">
					<table class="table table-hover" cellspacing="0">
					<thead>
					<tr class="border-bottom">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('brand_id'); ?></th>
							<th><?php echo $this->Paginator->sort('name'); ?></th>
							<th><?php echo $this->Paginator->sort('image'); ?></th>
							<th><?php echo $this->Paginator->sort('created'); ?></th>
							<th><?php echo $this->Paginator->sort('modified'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($bykeModels as $bykeModel): ?>
					<tr class="border-bottom">
						<td><?php echo h($bykeModel['BykeModel']['id']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($bykeModel['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $bykeModel['Brand']['id'])); ?>
						</td>
						<td><?php echo h($bykeModel['BykeModel']['name']); ?>&nbsp;</td>
						<td><?php echo $this->Html->image('/files/products_images/byke/thumb/'.$bykeModel['BykeModel']['image'], ['width' => '50']); ?>&nbsp;</td>
						<td><?php echo h($bykeModel['BykeModel']['created']); ?>&nbsp;</td>
						<td><?php echo h($bykeModel['BykeModel']['modified']); ?>&nbsp;</td>
						<td class="actions float-right">
							<?php echo $this->Html->link(__('<i class="fas fa-eye btn-sm btn-primary"></i>'), array('action' => 'view', $bykeModel['BykeModel']['id']),['escape' => false, 'title'=>'Edit']); ?>
							<?php echo $this->Html->link(__('<i class="fas fa-edit btn-sm btn-secondary"></i>'), array('action' => 'edit', $bykeModel['BykeModel']['id']),['escape' => false, 'title'=>'Edit']); ?>
							<?php echo $this->Form->postLink(__('<i class="fas fa-trash-alt btn-sm btn-danger"></i>'), array('action' => 'delete', $bykeModel['BykeModel']['id']),['escape' => false, 'title'=>'Edit'], array('confirm' => __('Are you sure you want to delete # %s?', $bykeModel['BykeModel']['id']))); ?>
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
						echo "  ";
						echo $this->Paginator->numbers(array('separator' => ''));
						echo $this->Paginator->next(__('next'), array(), null, array('class' => 'page-link d-inline'));
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Byke Model'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Models Products'), array('controller' => 'models_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Models Product'), array('controller' => 'models_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->