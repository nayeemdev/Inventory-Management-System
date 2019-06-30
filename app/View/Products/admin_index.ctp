<div class="container-fluid section-top">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center custom-bg-color text-white">
                    <h3 class="h4"><i class="fas fa-box"></i> Products</h3>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <?php echo $this->Form->create('Product', array('type' => 'get', 'url' => array('page' => '1'))); ?>
                            <div class="row m-2">
                                <div class="col-md-3"></div>

                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <a class="btn btn-outline-info"
                                               href="<?php echo $this->Html->url('/admin/products/index') ?>"><i
                                                    class="fas fa-refresh"></i></a>
                                        </div>

                                        <select class="custom-select" id="exampleFormControlSelect1" name="category">
                                            <option value="">Select Category</option>
                                            <?php
                                            foreach ($categories as $key => $category_item) {
                                                ?>
                                                <option
                                                    value="<?= $key ?>" <?= $key == $category ? 'selected' : '' ?>><?= $category_item ?></option>
                                            <?php
                                            }
                                            ?>
                                            <input type="text" class="form-control"
                                                   placeholder="Search by a name or color.."
                                                   aria-label="Search by keyword.." aria-describedby="basic-addon2"
                                                   name="keyword" value="<?= @$keyword ?>">

                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="submit"><i
                                                        class="fas fa-search"></i></button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover" cellpadding="0" cellspacing="0">
                            <thead>
                            <tr class="border-bottom">
                                <th><?php echo $this->Paginator->sort('category'); ?></th>
                                <th><?php echo $this->Paginator->sort('code'); ?></th>
                                <th><?php echo $this->Paginator->sort('partsNo', 'Product No'); ?></th>
                                <th><?php echo $this->Paginator->sort('name'); ?></th>
                                <th><?php echo $this->Paginator->sort('colour'); ?></th>
                                <th><?php echo $this->Paginator->sort('image'); ?></th>
                                <th><?php //echo $this->Paginator->sort('type'); ?></th>
                                <!--							<th>-->
                                <?php //echo $this->Paginator->sort('created'); ?><!--</th>-->
                                <th><?php //echo $this->Paginator->sort('modified'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            //pr($products); die();
                            foreach ($products as $product):
                                ?>
                                <tr class="border-bottom">
                                    <td><?php echo h($product['Category']['title']); ?>&nbsp;</td>
                                    <td><?php echo !empty($product['Product']['code']) ? $product['Product']['code'] : 'N/A'; ?>
                                        &nbsp;</td>
                                    <td><?php echo !empty($product['Product']['partsNo']) ? $product['Product']['partsNo'] : 'N/A'; ?>
                                        &nbsp;</td>
                                    <td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
                                    <td><?php echo h($product['Product']['colour']); ?>&nbsp;</td>
                                    <td><?php echo $this->Html->image('/files/products_images/thumb/' . $product['Product']['image'], ['width' => '50']); ?>
                                        &nbsp;</td>
                                    <td><?php //echo h($product['Product']['type']); ?>&nbsp;</td>
                                    <!--						<td>-->
                                    <?php //echo h(date_format(date_create($product['Product']['created']),'jS M y')); ?><!--&nbsp;</td>-->
                                    <td><?php //echo h($product['Product']['modified']); ?>&nbsp;</td>
                                    <td class="actions float-right">
                                        <?php echo $this->Html->link(__('<i class="fas fa-eye btn-sm btn-primary"></i>'), array('action' => 'view', $product['Product']['id']), ['escape' => false, 'title' => 'View']); ?>

                                        <?php echo $this->Html->link(__('<i class="fas fa-edit btn-sm btn-secondary"></i>'), array('action' => 'edit', $product['Product']['id']), ['escape' => false, 'title' => 'Edit']); ?>

                                        <?php echo $this->Form->postLink(__('<i class="fas fa-trash-alt btn-sm btn-danger"></i>'), array('action' => 'delete', $product['Product']['id']), ['escape' => false, 'title' => 'Delete'], array('confirm' => __('Are you sure you want to delete # %s?', $product['Product']['id']))); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <p class="float-right">
                            <?php
                            echo $this->Paginator->counter(array(
                                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                            ));
                            ?>
                        </p>

                        <div class="clearfix"></div>
                        <ul class="pagination float-right custom-bg-color">
                            <?php
                            echo $this->Paginator->prev('Prev', array('tag' => 'li', 'escape' => false, 'class' => 'page-link'), '<a href="#">Prev</a>', array('class' => 'prev disabled page-link', 'tag' => 'li', 'escape' => false));
                            echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a', 'class' => 'page-link'));
                            echo $this->Paginator->next('Next', array('tag' => 'li', 'escape' => false, 'class' => 'page-link'), '<a href="#">Next</a>', array('class' => 'prev disabled page-link', 'tag' => 'li', 'escape' => false));
                            ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Sells'), array('controller' => 'sells', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sell'), array('controller' => 'sells', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->