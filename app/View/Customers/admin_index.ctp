<?php
//pr($customer);
?>
<div class="container-fluid section-top" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="customers index">
                    <div class="card-header d-flex align-items-center custom-bg-color text-white">
                        <h3 class="h4"><i class="fas fa-users"></i> Admin Customers List</h3>
                    </div>
                    <?php echo $this->Form->create('Customer', array('type' => 'get', 'url' => array('page' => '1'))); ?>
                    <div class="row m-2">
                        <div class="col-md-3"></div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <a class="btn btn-outline-info" href="<?php echo $this->Html->url('/admin/customers/index')?>"><i class="fas fa-refresh"></i></a>
                                </div>
                                <input type="text" class="form-control" placeholder="Search by keyword.."
                                       aria-label="Search by keyword.." aria-describedby="basic-addon2" name="keyword" value="<?=$keyword?>">
                                <select class="custom-select" id="exampleFormControlSelect1" name="payment_status">
                                    <option value="">Select One</option>
                                    <option value="Paid" <?=$payment_status=='Paid' ? 'selected' : ''?>>Only Paid User</option>
                                    <option value="Due" <?=$payment_status=='Due' ? 'selected' : ''?>>Only Due User</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover" cellpadding="0" cellspacing="0">
                            <thead>
                            <tr class="border-bottom">
                                <th><?php echo $this->Paginator->sort('id', '#'); ?></th>
                                <th><?php echo $this->Paginator->sort('image'); ?></th>
                                <th><?php echo $this->Paginator->sort('fullname'); ?></th>
                                <th><?php echo $this->Paginator->sort('phone'); ?></th>
                                <!--							<th>-->
                                <?php //echo $this->Paginator->sort('email'); ?><!--</th>-->
                                <th><?php echo $this->Paginator->sort('address'); ?></th>
                                <th><?php echo $this->Paginator->sort('Payment Status'); ?></th>
                                <!--							<th>-->
                                <?php //echo $this->Paginator->sort('created'); ?><!--</th>-->
                                <!--							<th>-->
                                <?php //echo $this->Paginator->sort('modified'); ?><!--</th>-->
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($customers as $customer):
                                $due = $customer[0]['due_amount'];
                                if($due>0){
                                    $tbl_class = 'table-danger';
                                    $text = 'Due '. $due;
                                } elseif ($due==''){
                                    $tbl_class = '';
                                    $text = 'Not Purchased yet !';
                                } else {
                                    $tbl_class = 'table-success';
                                    $text = 'Paid';
                                }
                                ?>
                                <tr class="border-bottom <?php echo $tbl_class ?>">
                                    <td><?php echo h($customer['Customer']['id']); ?>&nbsp;</td>
                                    <td><?php echo $this->Html->image('/files/customer_images/thumb/' . $customer['Customer']['image'], ['width' => '50', 'height' => 50, 'class' => 'rounded-circle']); ?>
                                        &nbsp;</td>
                                    <td><?php echo h($customer['Customer']['fullname']); ?>&nbsp;</td>
                                    <td><?php echo h($customer['Customer']['phone']); ?>&nbsp;</td>
                                    <!--						<td>-->
                                    <?php //echo h($customer['Customer']['email']); ?><!--&nbsp;</td>-->
                                    <td><?php echo h($customer['Customer']['address']); ?>&nbsp;</td>
                                    <td><?php echo $text ?>&nbsp;</td>

                                    <!--						<td>-->
                                    <?php //echo h($customer['Customer']['created']); ?><!--&nbsp;</td>-->
                                    <!--						<td>-->
                                    <?php //echo h($customer['Customer']['modified']); ?><!--&nbsp;</td>-->
                                    <td class="actions float-right">
                                        <?php echo $this->Html->link(__('<i class="fas fa-eye btn-sm btn-primary"></i>'), array('action' => 'view', $customer['Customer']['id']), ['escape' => false, 'title' => 'Delete']); ?>
                                        <?php echo $this->Html->link(__('<i class="fas fa-edit btn-sm btn-secondary"></i>'), array('action' => 'edit', $customer['Customer']['id']), ['escape' => false, 'title' => 'Delete']); ?>
                                        <?php echo $this->Form->postLink(__('<i class="fas fa-trash-alt btn-sm btn-danger"></i>'), array('action' => 'delete', $customer['Customer']['id']), ['escape' => false, 'title' => 'Delete'], array('confirm' => __('Are you sure you want to delete # %s?', $customer['Customer']['id']))); ?>
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
                        ?>    </p>

                    <div class="paging float-right p-4">
                        <?php
                        echo $this->Paginator->prev(__('previous'), array(), null, array('class' => 'page-link d-inline'));
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
		<li><?php echo $this->Html->link(__('New Customer'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Sells'), array('controller' => 'sells', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sell'), array('controller' => 'sells', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->