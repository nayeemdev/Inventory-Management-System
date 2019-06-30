<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
<?php
$customer_id = @$this->params['pass'][0];
?>

<section class="forms">
	<div class="container-fluid section-top">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4">Sale Products</h3>
					</div>
					<div class="card-body">
						<?php echo $this->Form->create('Sell',array('enctype' => 'multipart/form-data')); ?>

                        <div class="card">
                            <div class="card-body">
                                <div class="row m-1">
                                    <div class="form-group col-md-4">
                                        <?php echo $this->Form->input('customer_id',['label'=> 'Customer', 'style'=>'width:100%', 'class' => 'js-example-basic-single js-states form-control ','option' =>$customers, 'value' => @$customer_id]); ?>
                                        <small class="text-muted">New Customer? <a href="<?=$this->Html->url('/admin/customers/add')?>" target="_blank"> Create New </a></small>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <?php echo $this->Form->input('branch_id',['label'=> 'Branch','class' => 'form-control','option']); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="datepicker">Sell Date</label>
                                        <input id="datepicker" class="form-control" name="data[Sell][sale_date]">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body js-order-box">
                                <div class="row shadow p-1 m-1 js-order">
                                    <div class="form-group col-md-3">
                                        <?php
                                        echo $this->Form->input('category_id',['label'=>'Product Type','class' => 'form-control js-category-sell']);
                                        ?>
                                    </div>
                                    <div class="form-group col-md-3 js-products">
                                        <?php echo $this->Form->input('product_id.',['label'=> 'Product','class' => 'form-control js-sell-product', 'options' => @$products]); ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <?php echo $this->Form->input('quantity.',['label'=> 'Quantity','rel'=>'amount','class' => 'form-control js-sell-amount','type'=>'number']); ?>
<!--                                        <span class="text-danger font-italic js-stock-limited" style="display: none;"><sub>Stock Limited!</sub></span>-->
                                    </div>
                                    <div class="form-group col-md-2">
                                        <?php echo $this->Form->input('rate.',['label'=> 'Rate','rel'=>'rate','class' => 'form-control js-sell-rate','type'=>'number', 'value'=>@$last_selling_rate]); ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <?php echo $this->Form->input('total_price.',['label'=> 'Total Price','class' => 'form-control js-sell-total','type'=>'number']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

						<div class="row">
							<div class="offset-md-4"></div>
							<div class="form-group col-md-2">
								<button class="btn btn-outline-secondary btn-block js-add-btn" type="button"><i class="fas fa-plus-circle" aria-hidden="true"></i> Add</button>
							</div>
							<div class="form-group col-md-2">
								<button class="btn btn-outline-danger btn-block js-remove-btn" type="button"><i class="far fa-minus-square"></i> Delete</button>
							</div>
						</div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row m-1">
                                    <div class="form-group col-md-3">
                                        <?php echo $this->Form->input('Invoice.subTotal',['label'=> 'Sub Total','class' => 'form-control js-sub-total','type'=>'number']); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <?php echo $this->Form->input('Invoice.paidAmount',['class' => 'form-control js-sell-paid','type'=>'number']); ?>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <?php echo $this->Form->input('Invoice.dueAmount',['class' => 'form-control js-sell-due','type'=>'number', 'readonly' => 'readonly']); ?>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <?php
                                        $pay_gway = [
                                            'Cash' => 'Cash',
                                            'Cheque' => 'Cheque',
                                        ];
                                        echo $this->Form->input('Invoice.paymentMethod',['class' => 'form-control','options'=>$pay_gway]); ?>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <?php
                                        echo $this->Form->input('Invoice.note',['class' => 'form-control','type'=>'text']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row">
							<div class="offset-md-4"></div>
							<div class="col-md-4">
								<div class="form-group">
									<button class="btn btn-outline-primary btn-block js-confirm-btn"><i class="fas fa-check-circle"></i> Confirm</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
