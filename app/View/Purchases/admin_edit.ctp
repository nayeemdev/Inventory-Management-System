<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
<section class="forms">
    <div class="container-fluid section-top">

        <div class="card">

            <div class="card-header d-flex align-items-center custom-bg-color text-white">
                <h3 class="h4"><i class="fas fa-edit"></i> Edit</h3>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Purchase'); ?>
                <?php echo $this->Form->input('id');?>
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
                            <?php echo $this->Form->input('product_id', ['label' => 'Products', 'class' => 'form-control']); ?>
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
                            <button class="btn btn-outline-primary btn-block" type="submit"><i class="fas fa-save"></i> Update</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $(function () {
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
        $('.js-category').on('change', function () {
            if ($(this).val() == '2') { // if category be Parts
                $('.js-type').show();
            } else $('.js-type').hide();
            $.post(ROOT + 'admin/products/get_product', {'cat_id': $(this).val()}, function (res) {
                $('.js-products').html(res);
                selectBuyingPrice();
            });
        });

        $('#PurchaseProductId').on('change', function () {
            selectBuyingPrice();
        });
        var total = 0;
        var due = 0;
        $('.js-amount, .js-rate').on('keyup', function () {
            var amount = $('.js-amount').val();
            var rate = $('.js-rate').val();
            total = amount * rate;
            $('.js-total').val(total);
        });

        $('.js-paid').on('keyup', function () {
            due = total - $('.js-paid').val();
            $('.js-due').val(due);
            //console.log(due)
            if (due == 0) $('.js-pay-status').val('Paid');
            else $('.js-pay-status').val('Due');
        });

        $('.js-type-radio').on('change', function () {
            if ($(this).val() == 'Imported') $('.js-supplier').attr('disabled', true);
            else $('.js-supplier').attr('disabled', false);
        });

        function selectBuyingPrice() {
            var product_id = $('#PurchaseProductId').val();
            $.get(ROOT + 'admin/purchases/get_last_buying_price/' + product_id, function (res2) {
                $('.js-rate').val(res2);
            });
        }
    });
</script>

<!-- <div class="purchases form">
<?php echo $this->Form->create('Purchase'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Purchase'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('branch_id');
		echo $this->Form->input('supplier_id');
		echo $this->Form->input('numberReceived');
		echo $this->Form->input('purchaseDate');
		echo $this->Form->input('category_id');
		echo $this->Form->input('type');
		echo $this->Form->input('purchase_price');
		echo $this->Form->input('total_price');
		echo $this->Form->input('paid_amount');
		echo $this->Form->input('payment_status');
		echo $this->Form->input('due_amount');
		echo $this->Form->input('payment_method');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Purchase.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Purchase.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Purchases'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->