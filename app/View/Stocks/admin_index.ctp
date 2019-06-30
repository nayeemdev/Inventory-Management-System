<div class="container-fluid section-top">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center custom-bg-color text-white">
                    <h3 class="h4">Stock List</h3>
                </div>

                <?php echo $this->Form->create('Stock', array('type' => 'get', 'url' => array('page' => '1'))); ?>
                <div class="row m-2">
<!--                    <div class="col-md-3"></div>-->
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <a class="btn btn-outline-info"
                                   href="<?php echo $this->Html->url('/admin/stocks/index') ?>"><i
                                        class="fas fa-refresh"></i></a>
                            </div>
                            <select class="custom-select js-stk-category" id="exampleFormControlSelect1"
                                    name="category_id">
                                <option value="">Select Category</option>
                                <?php
                                foreach ($categories as $key => $category_item) {
                                    ?>
                                    <option
                                        value="<?= $key ?>" <?= $key == $category ? 'selected' : '' ?>><?= $category_item ?></option>
                                <?php
                                }
                                ?>
                            </select>

                            <div class="js-products">
                                <select class="custom-select" id="" name="product_id">
                                    <option value="">Select Product</option>
                                    <?php
                                    foreach ($products as $key2 => $category_item) {
                                        ?>
                                        <option
                                            value="<?= $key2 ?>" <?= $key2 == $product ? 'selected' : '' ?>><?= $category_item ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>

                <div class="col-md-12 table-responsive">
                    <table class="table table-hover" cellpadding="0" cellspacing="0">
                        <thead>
                        <tr class="border-bottom">
                            <th><?php echo $this->Paginator->sort('id', '#'); ?></th>
                            <!--                        <th>-->
                            <?php //echo $this->Paginator->sort('branch_id'); ?><!--</th>-->
                            <th><?php echo $this->Paginator->sort('category_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('product_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('int_qty', 'Stock Amount'); ?></th>
                            <th><?php echo $this->Paginator->sort('int_price', 'Buying Price'); ?></th>
                            <th><?php echo $this->Paginator->sort('cur_price', "Selling Price"); ?></th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        #pr($stocks);die;
                        foreach ($stocks as $stock): ?>
                            <tr class="border-bottom">
                                <td><?php echo h($stock['Stock']['id']); ?>&nbsp;</td>
                                <!--<td>
                            <?php /*echo $this->Html->link($stock['Branch']['title'], array('controller' => 'branches', 'action' => 'view', $stock['Branch']['id'])); */ ?>
                        </td>-->
                                <td>
                                    <?php echo $this->Html->link($stock['Category']['title'], array('controller' => 'categories', 'action' => 'view', $stock['Category']['id'])); ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link($stock['Product']['name'], array('controller' => 'products', 'action' => 'view', $stock['Product']['id'])); ?>
                                </td>
                                <td><?php echo h($stock['Stock']['int_qty']); ?>&nbsp;</td>
                                <td><?php echo h($stock['Stock']['int_price']); ?>&nbsp;</td>
                                <td><?php echo h($stock['Stock']['cur_price']); ?>&nbsp;</td>
                                <td><?php echo $this->Html->link(__('<i class="fas fa-edit btn-sm btn-primary"></i>'), array('action' => 'edit', $stock['Product']['id']),['escape' => false, 'title'=>'Edit']); ?> &nbsp;</td>
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
                        echo $this->Paginator->prev('Prev', array('tag' => 'li', 'escape' => false,'class' => 'page-link'), '<a href="#">Prev</a>', array('class' => 'prev disabled page-link', 'tag' => 'li', 'escape' => false));
                        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a','class' => 'page-link'));
                        echo $this->Paginator->next('Next', array('tag' => 'li', 'escape' => false,'class' => 'page-link'), '<a href="#">Next</a>', array('class' => 'prev disabled page-link', 'tag' => 'li', 'escape' => false));
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Stock'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
	</ul>
</div> -->
 