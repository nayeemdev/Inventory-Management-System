
<section class="tables">
    <div class="container-fluid section-top">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                   <!-- <div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                    </div>-->
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Salary Sheet</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('employee_id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('employee'); ?></th>
                                    <th><?php echo $this->Paginator->sort('paidBy'); ?></th>
                                    <th><?php echo $this->Paginator->sort('bonus'); ?></th>
                                    <th><?php echo $this->Paginator->sort('salary'); ?></th>
                                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($salaries as $salary): ?>
                                    <tr>
                                        <td><?php echo h($salary['Salary']['id']); ?>&nbsp;</td>
                                        <td>
                                            <?php echo $this->Html->link($salary['Employee']['name'], array('controller' => 'employees', 'action' => 'view', $salary['Employee']['id'])); ?>
                                        </td>
                                        <td><?php echo h($salary['Salary']['employee']); ?>&nbsp;</td>
                                        <td><?php echo h($salary['Salary']['paidBy']); ?>&nbsp;</td>
                                        <td><?php echo h($salary['Salary']['bonus']); ?>&nbsp;</td>
                                        <td><?php echo h($salary['Salary']['salary']); ?>&nbsp;</td>
                                        <td><?php echo h($salary['Salary']['created']); ?>&nbsp;</td>
                                        <td><?php echo h($salary['Salary']['modified']); ?>&nbsp;</td>
                                        <td class="actions">
                                            <?php
                                            $today_date = date('F,Y');
                                            $formatted_date = date_format(date_create($salary['Salary']['created']),'F,Y');
                                            if($today_date==$formatted_date){
                                            ?>
                                            <?php //echo $this->Html->link(__('View'), array('action' => 'view', $salary['Salary']['id'])); ?>
                                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $salary['Salary']['id'])); ?>
                                            <?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $salary['Salary']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $salary['Salary']['id']))); ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>

                        </div>
                        <p class="pull-right">
                            <?php
                            echo $this->Paginator->counter(array(
                                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                            ));
                            ?>
                        </p>
                        <div class="clearfix"></div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center pull-right">
                                <?php
                                echo '<li class="page-item">'.$this->Paginator->prev('< ' . __('Previous'), array(), null, array('class' => 'page-item disabled')).'</li>';
                                echo '<li class="page-item">'.$this->Paginator->numbers(array('separator' => '')).'</li>';
                                echo '<li class="page-item">'.$this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled')).'</li>';
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>