<div class="container-fluid section-top">
<div class="row">

    <div class="col-md-12">
        <div class="card">

            <div class="card-header d-flex align-items-center custom-bg-color text-white">
                <h3 class="h4"><i class="fas fa-user-plus"></i> Customer Purchase History
                </h3>
            </div>
            <div class="card-body">
                <div class="card">
                    <img class="card-img-top" src="https://thumbs.dreamstime.com/z/flower-rose-closeup-white-background-d-render-imag-image-65244784.jpg" alt="Card image cap" height="200px">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Purchase History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Customer Accounts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">pay Due Payment</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Branch</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">Total Price</th>
<!--                                        <th scope="col">Paid</th>-->
<!--                                        <th scope="col">Due</th>-->
<!--                                        <th scope="col">Invoice</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    #pr($customer);die;
                                    $total = 0;
                                    foreach($customer['Sell'] as $key=>$sell){
                                        $total = $total + $sell['total_price'];
                                        #pr($sell);die;
                                    ?>
                                        <tr>
                                            <td><?php echo ++$key; ?></td>
                                            <td><?php echo $sell['sale_date']; ?></td>
                                            <td><?php echo $sell['Branch']['title']; ?></td>
                                            <td><?php echo $sell['Product']['name']; ?></td>
                                            <td><?php echo $sell['quantity']; ?></td>
                                            <td><?php echo $sell['rate']; ?></td>
                                            <td><?php echo $sell['total_price']; ?></td>
<!--                                            <td>--><?php //echo $sell['paidAmount']; ?><!--</td>-->
<!--                                            <td>--><?php //echo $sell['dueAmount']; ?><!--</td>-->
<!--                                            <td>--><?php //echo $sell['invoiceId']; ?><!--</td>-->
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr class="custom-bg-color text-white text-bold">
                                    <td colspan="6"><span class="float-right"> Sub Total</span></td>
                                    <td><?php echo $total; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
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
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script>
    $(document).ready(function(){
        $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        });
    });
</script>