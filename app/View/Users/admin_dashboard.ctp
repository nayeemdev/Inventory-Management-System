<?php
/**
 * Created by PhpStorm.
 * User: Mukul Hosen
 * Date: 11/26/18
 * Time: 10:56 AM
 */
?>

<!-- Page Header-->
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Dashboard</h2>
    </div>
</header>
<!-- Dashboard Counts Section-->
<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid section-top">
        <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-xl-6 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="fas fa-donate"></i></div>
                    <div class="title"><span>Today Cash</span>

                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                        </div>
                    </div>
                    <div class="number float-right ml-auto pr-4">
                        <strong><?php echo(number_format($today_cash['0']['0']['amount'])); ?></strong></div>
                </div>
            </div>
            <!-- Item -->
            <div class="col-xl-6 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="fas fa-dollar-sign"></i></div>
                    <div class="title"><span>Total Income</span>

                        <div class="progress">
                            <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                        </div>
                    </div>
                    <div class="number  float-right ml-auto pr-4">
                        <strong><?php echo(number_format($credit['0']['0']['amount'])); ?></strong></div>
                </div>
            </div>
            <!-- Item -->
            <div class="col-xl-6 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="fab fa-amazon-pay"></i></i></div>
                    <div class="title"><span>Total Salary</span>

                        <div class="progress">
                            <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="50"
                                 aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                        </div>
                    </div>
                    <div class="number  float-right ml-auto pr-4"><strong><?php echo number_format($salary) ?></strong>
                    </div>
                </div>
            </div>
            <!-- Item -->
            <div class="col-xl-6 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="far fa-money-bill-alt"></i></i></div>
                    <div class="title"><span>Total Expense</span>

                        <div class="progress">
                            <div role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                        </div>
                    </div>
                    <div class="number  float-right ml-auto pr-4">
                        <strong><?php echo(number_format($expence)); ?></strong></div>
                </div>
            </div>

        </div>
        <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-xl-6 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="fas fa-donate"></i></div>
                    <div class="title"><span>Total Customer</span>

                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                        </div>
                    </div>
                    <div class="number float-right ml-auto pr-4">
                        <strong><?php echo(number_format($customers)); ?></strong></div>
                </div>
            </div>
            <!-- Item -->
            <div class="col-xl-6 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="fas fa-dollar-sign"></i></div>
                    <div class="title"><span>Total Purchased</span>

                        <div class="progress">
                            <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                        </div>
                    </div>
                    <div class="number  float-right ml-auto pr-4">
                        <strong><?php echo(number_format(@$purchase['0']['0']['amount'])); ?></strong></div>
                </div>
            </div>

            <div class="col-xl-6 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="fab fa-amazon-pay"></i></i></div>
                    <div class="title"><span>Total Sell Due</span>

                        <div class="progress">
                            <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="50"
                                 aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                        </div>
                    </div>
                    <div class="number  float-right ml-auto pr-4"><strong><?php echo number_format(@$sell['0']['0']['due_amount']) ?></strong>
                    </div>
                </div>
            </div>
            <!-- Item -->
            <div class="col-xl-6 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="far fa-money-bill-alt"></i></i></div>
                    <div class="title"><span>Total Sell</span>

                        <div class="progress">
                            <div role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                        </div>
                    </div>
                    <div class="number  float-right ml-auto pr-4">
                        <strong><?php echo(number_format(@$sell['0']['0']['amount'])); ?></strong></div>
                </div>
            </div>
            <!-- Item -->
        </div>
    </div>
</section>

<div class="container-fluid section-top">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex align-items-center custom-bg-color text-white">
                    <h3 class="h4">Parts Stock</h3>
                </div>

                <?php echo $this->Form->create('User', array('type' => 'get', 'url' => array('page' => '1'))); ?>
                <div class="row m-2">
                     <div class="col-md-1"></div>
                       <div class="col-md-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <a class="btn btn-outline-info" href="<?php echo $this->Html->url('/admin/users/dashboard')?>"><i class="fas fa-refresh"></i></a>
                            </div>

                                <select class="custom-select js-products" id="" name="product_id">
                                    <option value="">Select Parts</option>
                                    <?php
                                    foreach($products_parts as $key2=>$category_item) {
                                                      ?>
                                        <option value="<?=$key2?>" <?=$key2==$product ? 'selected' : ''?>><?=$category_item?></option>
                                    <?php
                                     }
                                    ?>
                                </select>
                                <input type="hidden" name="cat_id" value="2">
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
                            <!--                        <th>--><?php //echo $this->Paginator->sort('branch_id'); ?><!--</th>-->
                            <!--                            <th>--><?php //echo $this->Paginator->sort('category_id'); ?><!--</th>-->
                            <th><?php echo $this->Paginator->sort('product_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('int_qty', 'Stock Amount'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        #pr($stocks_parts);die;
                        foreach ($stocks_parts as $stock):
                            $stk_p_limited_cls = $stock['Stock']['int_qty']<=10?'table-danger':'table-success';
                            ?>
                            <tr class="border-bottom <?=$stk_p_limited_cls?>">
                                <td><?php echo h($stock['Stock']['id']); ?>&nbsp;</td>
                                <!--<td>
                            <?php /*echo $this->Html->link($stock['Branch']['title'], array('controller' => 'branches', 'action' => 'view', $stock['Branch']['id'])); */?>
                        </td>-->
                                <!--<td>
                                    <?php /*echo $this->Html->link($stock['Category']['title'], array('controller' => 'categories', 'action' => 'view', $stock['Category']['id'])); */?>
                                </td>-->
                                <td>
                                    <?php echo $this->Html->link($stock['Product']['name'], array('controller' => 'products', 'action' => 'view', $stock['Product']['id'])); ?>
                                </td>
                                <td><?php echo !empty($stock['Stock']['int_qty']) ? $stock['Stock']['int_qty'] : 0; ?>&nbsp;</td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!--<p class="pl-2">
                        <?php
                    /*                        echo $this->Paginator->counter(array(
                                                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                                            ));
                                            */?>	</p>
                    <div class="paging float-right p-4">
                        <?php
                    /*                        echo $this->Paginator->prev(__('previous'), array(), null, array('class' => 'page-link d-inline'));
                                            echo $this->Paginator->numbers(array('separator' => ''));
                                            echo $this->Paginator->next(__('next'), array(), null, array('class' => 'page-link d-inline'));
                                            */?>
                    </div>-->
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex align-items-center custom-bg-color text-white">
                    <h3 class="h4">Bike Stock</h3>
                </div>

                <?php /*echo $this->Form->create('User', array('type' => 'get', 'url' => array('page' => '1'))); */?><!--
                <div class="row m-2">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <a class="btn btn-outline-info" href="<?php /*echo $this->Html->url('/admin/stocks/index')*/?>"><i class="fas fa-refresh"></i></a>
                            </div>
                            <div class="js-products">
                                <select class="custom-select" id="" name="product_id">
                                    <option value="">Select Bike</option>
                                    <?php
/*                                    foreach($products_bike as $key2=>$category_item) {
                                        */?>
                                        <option value="<?/*=$key2*/?>" <?/*=$key2==$product ? 'selected' : ''*/?>><?/*=$category_item*/?></option>
                                    <?php
/*                                    }
                                    */?>
                                </select>
                                <input type="hidden" value="1" name="cat_id">
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>-->

                <div class="table-responsive">
                    <table class="table table-hover" cellpadding="0" cellspacing="0">
                        <thead>
                        <tr class="border-bottom">
                            <th><?php echo $this->Paginator->sort('id', '#'); ?></th>
                            <!--                        <th>--><?php //echo $this->Paginator->sort('branch_id'); ?><!--</th>-->
<!--                            <th>--><?php //echo $this->Paginator->sort('category_id'); ?><!--</th>-->
                            <th><?php echo $this->Paginator->sort('product_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('int_qty', 'Stock Amount'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        #pr($stocks);die;
                        foreach ($stocks_bike as $stock):
                            $stk_b_limited_cls = $stock['Stock']['int_qty']<=10?'table-danger':'table-success';
                            ?>
                            <tr class="border-bottom <?=$stk_b_limited_cls?>">
                                <td><?php echo h($stock['Stock']['id']); ?>&nbsp;</td>
                                <!--<td>
                            <?php /*echo $this->Html->link($stock['Branch']['title'], array('controller' => 'branches', 'action' => 'view', $stock['Branch']['id'])); */?>
                        </td>-->
                                <!--<td>
                                    <?php /*echo $this->Html->link($stock['Category']['title'], array('controller' => 'categories', 'action' => 'view', $stock['Category']['id'])); */?>
                                </td>-->
                                <td>
                                    <?php echo $this->Html->link($stock['Product']['name'], array('controller' => 'products', 'action' => 'view', $stock['Product']['id'])); ?>
                                </td>
                                <td><?php echo !empty($stock['Stock']['int_qty']) ? $stock['Stock']['int_qty'] : 0; ?>&nbsp;</td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!--<p class="pl-2">
                        <?php
/*                        echo $this->Paginator->counter(array(
                            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                        ));
                        */?>	</p>
                    <div class="paging float-right p-4">
                        <?php
/*                        echo $this->Paginator->prev(__('previous'), array(), null, array('class' => 'page-link d-inline'));
                        echo $this->Paginator->numbers(array('separator' => ''));
                        echo $this->Paginator->next(__('next'), array(), null, array('class' => 'page-link d-inline'));
                        */?>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid section-top">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center custom-bg-color text-white">
                    <h3 class="h4">Lubricant Stock</h3>
                </div>

                <?php /*echo $this->Form->create('User', array('type' => 'get', 'url' => array('page' => '1'))); */?><!--
                <div class="row m-2">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <a class="btn btn-outline-info" href="<?php /*echo $this->Html->url('/admin/stocks/index')*/?>"><i class="fas fa-refresh"></i></a>
                            </div>

                            <div class="js-products">
                                <select class="custom-select" id="" name="product_id">
                                    <option value="">Select Lubricant</option>
                                    <?php
                /*                                    foreach($products_lubricant as $key2=>$prd_item) {
                                                        */?>
                                        <option value="<?/*=$key2*/?>" <?/*=$key2==$product ? 'selected' : ''*/?>><?/*=$prd_item*/?></option>
                                    <?php
                /*                                    }
                                                    */?>
                                </select>
                                <input type="hidden" name="cat_id" value="3">
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>-->

                <div class="table-responsive">
                    <table class="table table-hover" cellpadding="0" cellspacing="0">
                        <thead>
                        <tr class="border-bottom">
                            <th><?php echo $this->Paginator->sort('id', '#'); ?></th>
                            <!--                        <th>--><?php //echo $this->Paginator->sort('branch_id'); ?><!--</th>-->
                            <!--                            <th>--><?php //echo $this->Paginator->sort('category_id'); ?><!--</th>-->
                            <th><?php echo $this->Paginator->sort('product_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('int_qty', 'Stock Amount'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        #pr($stocks);die;
                        foreach ($stocks_lub as $stock):
                            $stk_lub_limited_cls = $stock['Stock']['int_qty']<=10?'table-danger':'table-success';
                            ?>
                            <tr class="border-bottom <?=$stk_lub_limited_cls?>">
                                <td><?php echo h($stock['Stock']['id']); ?>&nbsp;</td>
                                <!--<td>
                            <?php /*echo $this->Html->link($stock['Branch']['title'], array('controller' => 'branches', 'action' => 'view', $stock['Branch']['id'])); */?>
                        </td>-->
                                <!--<td>
                                    <?php /*echo $this->Html->link($stock['Category']['title'], array('controller' => 'categories', 'action' => 'view', $stock['Category']['id'])); */?>
                                </td>-->
                                <td>
                                    <?php echo $this->Html->link($stock['Product']['name'], array('controller' => 'products', 'action' => 'view', $stock['Product']['id'])); ?>
                                </td>
                                <td><?php echo !empty($stock['Stock']['int_qty']) ? $stock['Stock']['int_qty'] : 0; ?>&nbsp;</td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!--<p class="pl-2">
                        <?php
                    /*                        //pr($this->Paginator);die;
                                            echo $this->Paginator->counter(array(
                                                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                                            ));
                                            */?>	</p>
                    <div class="paging float-right p-4">
                        <?php
                    /*                        echo $this->Paginator->prev(__('previous'), array(), null, array('class' => 'page-link d-inline'));
                                            echo $this->Paginator->numbers(array('separator' => ''));
                                            echo $this->Paginator->next(__('next'), array(), null, array('class' => 'page-link d-inline'));
                                            */?>
                    </div>-->
                </div>
            </div>

        </div>
    </div>
</div>

