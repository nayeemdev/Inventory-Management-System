
<section class="tables">
    <div class="container-fluid section-top">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!--<div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                    </div>-->
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Employees</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('name'); ?></th>
                                    <th><?php echo $this->Paginator->sort('salary'); ?></th>
                                    <th><?php echo $this->Paginator->sort('description'); ?></th>
                                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($employees as $employee): ?>
                                    <tr>
                                        <td><?php echo h($employee['Employee']['id']); ?>&nbsp;</td>
                                        <td><?php echo h($employee['Employee']['name']); ?>&nbsp;</td>
                                        <td><?php echo h($employee['Employee']['salary']); ?>&nbsp;</td>
                                        <td><?php echo h($employee['Employee']['description']); ?>&nbsp;</td>
                                        <td><?php echo h($employee['Employee']['created']); ?>&nbsp;</td>
                                        <td><?php echo h($employee['Employee']['modified']); ?>&nbsp;</td>
                                        <td class="actions">
                                            <?php echo $this->Html->link(__('View'), array('action' => 'view', $employee['Employee']['id'])); ?>
                                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $employee['Employee']['id'])); ?>
                                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $employee['Employee']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $employee['Employee']['id']))); ?>
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