

<?php //pr($ledgers);die; ?>

<section class="tables">
    <div class="container-fluid section-top">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- 					<div class="card-close">
                                            <div class="dropdown">
                                                <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                                <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                            </div>
                                        </div> -->
                    <div class="card-header d-flex align-items-center custom-bg-color text-white">
                        <h3 class="h4"><i class="fas fa-balance-scale"></i> Cash Book List</h3>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 col-sm-4">
                                        <form class="form-inline">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="start" class="sr-only">Start</label>
                                                    <input id="start" name="start" type="month" value="Jane Doe"
                                                           class="mr-3 form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="end" class="sr-only">End</label>
                                                    <input id="end" type="month" name="end" placeholder="Username"
                                                           class="mr-3 form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-outline-primary"><i
                                                            class="fas fa-check-circle"></i> Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-hover table-striped">
                            <?php
                              //$last_date = date('-');
                            $date = @$ledgers[0]['Cashbook']['created'];
                            $last_month = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( $date ) ) . "-1 month" ) );
                            $last_info = AppHelper::last_cashbook($last_month);
                            //pr($last_info);die;
                            ?>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><?php echo $this->Paginator->sort('Date'); ?></th>
                                        <th><?php echo $this->Paginator->sort('Opening Balance'); ?></th>
                                        <th><?php echo $this->Paginator->sort('Closing Balance'); ?></th>
                                        <th><?php echo $this->Paginator->sort('Cash'); ?></th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    foreach ($ledgers as $key=> $math):
                                        ?>
                                        <tr class="custom-bg-color text-white">
                                            <td><?php echo $math['Cashbook']['period'] ?></td>
                                            <td>
                                                <?php
                                                if($key==0) {
                                                    $openning = $last_info;
                                                } else {
                                                    $openning = $ledgers[$key-1]['Cashbook']['amount'];
                                                }
                                                echo $openning;
                                                ?>
                                            </td>
                                            <td><?php echo $math['Cashbook']['amount'] ?></td>
                                            <td><?php echo $math['Cashbook']['amount']- $openning?></td>
                                        </tr>

                                    <?php endforeach; ?>
                                    <!--<tr class="custom-bg-color text-white">
                                        <td colspan="1">Ending <?php /*echo $ledger['Period']['period'] */?></td>
                                        <td><?php /*echo $total_expence */?></td>
                                        <td><?php /*echo $total_credit */?></td>
                                        <td><?php /*echo empty($ledger['Period']['amount'])?$last_info['amount']:$ledger['Period']['amount']*/?></td>
                                    </tr>-->
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    document.getElementById('start').valueAsDate = new Date();
    document.getElementById('end').valueAsDate = new Date();
</script>