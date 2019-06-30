<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
<section class="forms">
    <div class="container-fluid section-top">
        <div class="card">
            <div class="card-header d-flex align-items-center custom-bg-color text-white">
                <h3 class="h4"><i class="fas fa-cart-plus"></i> Add Purchase Products</h3>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Purchase'); ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo $this->Form->input('branch_id', ['label' => 'Branch', 'class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('numberReceived', ['label' => 'Received Amount', 'class' => 'form-control js-amount', 'type' => 'number']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('paid_amount', ['label' => 'Paid Amount', 'class' => 'form-control js-paid', 'type' => 'number']); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo $this->Form->input('category_id', ['label' => 'Category', 'class' => 'form-control js-category']); ?>
                        </div>
                        <div class="js-type" style="display:none;">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input js-type-radio"
                                    name="data[Purchase][type]" value="Supplier">From
                                    Supplier
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input js-type-radio"
                                    name="data[Purchase][type]" value="Imported">Imported
                                </label>
                            </div>
                            <?php //echo $this->Form->input('type',['label'=> 'Type','class' => 'form-control', 'type' => 'text']); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $this->Form->input('purchase_price', ['label' => 'Buying Rate', 'class' => 'form-control js-rate', 'type' => 'number', 'value' => @$last_buying_rate]); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('due_amount', ['label' => 'Due Amount', 'class' => 'form-control js-due', 'type' => 'number', 'readonly' => 'readonly']); ?>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group js-products">
                            <?php echo $this->Form->input('product_id', ['label' => 'Products', 'class' => 'form-control js-product-id']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('total_price', ['label' => 'Total Price', 'class' => 'form-control js-total', 'type' => 'number']); ?>
                        </div>

                        <div class="form-group" style="display: none;">
                            <?php echo $this->Form->input('payment_status', ['label' => 'Payment Status', 'class' => 'form-control js-pay-status', 'type' => 'text', 'readonly' => 'readonly']); ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $pay_gway = [
                                'Cash' => 'Cash',
                                'Cheque' => 'Cheque',
                            ];
                            echo $this->Form->input('payment_method', ['label' => 'Payment Method', 'class' => 'form-control', 'options' => $pay_gway]); ?>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="datepicker">Purchase Date</label>
                            <input id="datepicker" class="form-control" name="data[Purchase][purchaseDate]">
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('cur_price', ['label' => 'Selling Price', 'class' => 'form-control', 'type' => 'number', 'value' => @$last_selling_rate]); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('supplier_id', ['label' => 'Supplier Id', 'class' => 'form-control js-supplier']); ?>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo $this->Form->input('note', ['label' => false, 'class' => 'form-control', 'type' => 'text', 'placeholder' => 'Write a note here']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-md-4"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button class="btn btn-outline-primary btn-block" type="submit"><i class="fas fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>