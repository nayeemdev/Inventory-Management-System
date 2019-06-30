<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css"
      xmlns="http://www.w3.org/1999/html"/>
<div class="container-fluid section-top">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center custom-bg-color text-white">
                    <h3 class="h4"><i class="fas fa-list-ul"></i> Sales Lists</h3>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">

                            <?php echo $this->Form->create('Sell', array('type' => 'get', 'url' => array('page' => '1'))); ?>
                            <div class="row m-2">
                                <!--                                <div class="col-md-12">-->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <a class="btn btn-outline-info"
                                           href="<?php echo $this->Html->url('/admin/sells/index') ?>"><i
                                                class="fas fa-refresh"></i></a>
                                    </div>

                                    <select class="custom-select" id="exampleFormControlSelect1" name="branch">
                                        <option value="">Select Branch</option>
                                        <?php
                                        foreach ($branches as $key => $branch_item) {
                                            ?>

                                            <option
                                                value="<?= $key ?>" <?= $key == $branch ? 'selected' : '' ?>><?= $branch_item ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <select class="custom-select" id="exampleFormControlSelect1" name="customer">
                                        <option value="">Select Customer</option>
                                        <?php
                                        foreach ($customers as $key => $customer_name) {
                                            ?>

                                            <option
                                                value="<?= $key ?>" <?= $key == $customer ? 'selected' : '' ?>><?= $customer_name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <select class="custom-select" id="exampleFormControlSelect1" name="product">
                                        <option value="">Select Products</option>
                                        <?php
                                        foreach ($products as $key => $product_name) {
                                            ?>

                                            <option
                                                value="<?= $key ?>" <?= $key == $product ? 'selected' : '' ?>><?= $product_name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                    <div>
                                        <input type="text" name="startDate" class="form-control border" id="datepicker"
                                               placeholder=" Start Date" value="<?= $startDate ?>">
                                    </div>
                                    <div>
                                        <input type="text" name="endDate" class="form-control border" id="datepicker2"
                                               placeholder=" End Date" value="<?= $endDate ?>">
                                    </div>


                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit"><i
                                                class="fas fa-search"></i>
                                        </button>
                                    </div>
                                    <!--                                    </div>-->
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover" cellpadding="0" cellspacing="0">
                            <thead>
                            <tr class="border-bottom">
                                <th><?php echo $this->Paginator->sort('id'); ?></th>
                                <th><?php echo $this->Paginator->sort('branch_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('customer_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('product_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('sale_date'); ?></th>
                                <th><?php echo $this->Paginator->sort('quantity'); ?></th>
                                <th><?php echo $this->Paginator->sort('rate'); ?></th>
                                <th><?php echo $this->Paginator->sort('total_price'); ?></th>
                                <th><?php echo $this->Paginator->sort('created'); ?></th>
                                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($sells as $sell): ?>
                                <tr class="border-bottom">
                                    <td><?php echo h($sell['Sell']['id']); ?>&nbsp;</td>
                                    <td>
                                        <?php echo $this->Html->link($sell['Branch']['title'], array('controller' => 'branches', 'action' => 'view', $sell['Branch']['id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($sell['Customer']['fullname'], array('controller' => 'customers', 'action' => 'view', $sell['Customer']['id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($sell['Product']['name'], array('controller' => 'products', 'action' => 'view', $sell['Product']['id'])); ?>
                                    </td>
                                    <td><?php echo h($sell['Sell']['sale_date']); ?>&nbsp;</td>
                                    <td><?php echo h($sell['Sell']['quantity']); ?>&nbsp;</td>
                                    <td><?php echo h($sell['Sell']['rate']); ?>&nbsp;</td>
                                    <td><?php echo h($sell['Sell']['total_price']); ?>&nbsp;</td>
                                    <td><?php echo h($sell['Sell']['created']); ?>&nbsp;</td>
                                    <td><?php echo h($sell['Sell']['modified']); ?>&nbsp;</td>
                                    <td class="actions float-right">
                                        <?php echo $this->Html->link(__('<i class="fas fa-eye btn-sm btn-primary"></i>'), array('action' => 'view', $sell['Sell']['id']), ['escape' => false, 'title' => 'Delete']); ?>
                                        <?php echo $this->Html->link(__('<i class="fas fa-edit btn-sm btn-secondary"></i>'), array('action' => 'edit', $sell['Sell']['id']), ['escape' => false, 'title' => 'Delete']); ?>
                                        <?php echo $this->Form->postLink(__('<i class="fas fa-trash-alt btn-sm btn-danger"></i>'), array('action' => 'delete', $sell['Sell']['id']), ['escape' => false, 'title' => 'Delete'], array('confirm' => __('Are you sure you want to delete # %s?', $sell['Sell']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Sell'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->


<script>
    $(function () {
        $("#datepicker").datepicker({ format: 'yyyy-mm-dd'});
        $("#datepicker2").datepicker({ format: 'yyyy-mm-dd'});
    });
</script>