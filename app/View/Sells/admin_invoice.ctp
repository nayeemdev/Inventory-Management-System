<div class="row m-2">
    <div class="col-md-5"></div>
    <div class="col-md-2">
        <button type="button" class="btn btn-outline-primary btn-block" onclick="printDiv('printableArea')"><i class="fas fa-print"></i> Print</button>
    </div>
</div>

<div class="container i-content" id="printableArea" style="width:100%; margin-top:5px; border:1px solid #bbb; height:auto; overflow:hidden; padding-top:35px">
    <div class="i-header-l" style="width:20%; float:left; padding-left:10px; ">
        <?php //echo $this->Html->image('avatar-1.jpg', ['class'=>'i-logo'])?>

        <img style="margin-auto; border-radius:50%; width:150px; margin-bottom:40px;" src="<?php echo $this->Html->url('/img/avatar-1.jpg')?>">
    </div>
    <div class="i-header-r" style="width:60%; float:left; margin-top: 45px;">
        <h1>Jannat Motors</h1>
        <span>Faridpur</span>
    </div>
    <div style="width:20%; float:right; margin-top: 40px;">
        <h4>Invoice #<?php echo $invoice_data['Invoice']['id'] ?></h4>
        <p>Invoice Date: <?php echo date('d/m/Y') ?></p>
    </div>

    <table style="width: 100%; border:1px solid #bbb; margin-bottom: 1rem; margin-top:20px;">
        <tbody">
        <tr>
            <td style="padding:10px 20px; width: 50%; border:1px solid #bbb">
                <b>Invoiced To</b><br>
                <?php echo @$invoice_data['Sell'][0]['Customer']['fullname'] ?><br>
                <?php echo @$invoice_data['Sell'][0]['Customer']['address'] ?><br>
                <?php echo @$invoice_data['Sell'][0]['Customer']['phone'] ?>
            </td>
            <td style="padding:10px 20px; width: 50%; border:1px solid #bbb">
                <b>Pay To</b><br>
                Regards!<br>
                Jannat Motors
            </td>
        </tr>

        </tbody>
    </table>

    <table style="width: 100%; border:1px solid #bbb; margin-bottom: 1rem; margin-top:20px;">
        <thead>
        <tr>
            <th style="padding:10px 20px; width: 40%; border:1px solid #bbb"><b>Item</b></th>
            <th style="padding:10px 20px; width: 20%; border:1px solid #bbb"><b>Quantity</b></th>
            <th style="padding:10px 20px; width: 20%; border:1px solid #bbb"><b>Rate</b></th>
            <th style="padding:10px 20px; width: 20%; border:1px solid #bbb"><b>Total Price</b></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($invoice_data['Sell'] as $item){
            ?>
            <tr style="border:1px solid #bbb">
                <td style="padding:10px 20px; width: 40%; border:1px solid #bbb">
                    <?php
                    $p_name = $item['Product']['name'];
                    $color = !empty($item['Product']['colour']) ? '('.$item['Product']['colour'].')' : '';
                    echo $p_name.$color;
                    ?></td>
                <td style="padding:10px 20px; width: 20%; border:1px solid #bbb"><?php echo $item['quantity'] ?></td>
                <td style="padding:10px 20px; width: 20%; border:1px solid #bbb"><?php echo $item['rate'] ?></td>
                <td style="padding:10px 20px; width: 20%; border:1px solid #bbb"><?php echo $item['total_price'] ?></td>
            </tr>
        <?php
        }
        ?>

<!--        <tr style="border:1px solid #bbb">-->
<!--            <td style="padding:10px 20px; width: 80%; border:1px solid #bbb">Mid Budg Domain Registration - xorbd.com - 1 Year/s (01/03/2016 - 28/02/2017)</td>-->
<!--            <td style="padding:10px 20px; width: 20%; border:1px solid #bbb">$12.00 USD</td>-->
<!--        </tr>-->
        <tr style="border:1px solid #bbb">
            <td style="padding:10px 20px; width: 20%; border:1px solid #bbb;text-align: right;" colspan="3"><b>Sub Total </b></td>
            <td style="padding:10px 20px; width: 20%; border:1px solid #bbb"><b><?php echo $invoice_data['Invoice']['subTotal'] ?></b></td>
        </tr>
        <tr style="border:1px solid #bbb">
            <td style="padding:10px 20px; width: 20%; border:1px solid #bbb;text-align: right;" colspan="3"><b>Paid </b></td>
            <td style="padding:10px 20px; width: 20%; border:1px solid #bbb"><b><?php echo $invoice_data['Invoice']['paidAmount'] ?></b></td>
        </tr>
        <tr style="border:1px solid #bbb;">
            <td style="padding:10px 20px; width: 20%; border:1px solid #bbb;text-align: right;" colspan="3"><b>Due </b></td>
            <td style="padding:10px 20px; width: 20%; border:1px solid #bbb"><b><?php echo $invoice_data['Invoice']['dueAmount']?></b></td>
        </tr>
        </tbody>
    </table>

        <p style="width: 100%; padding-top:170px; text-align: right;">Signature</p>

        <div style=" float: right;font-size: 9px; position: fixed; bottom: 0; padding-bottom: 10px;">Developed by XOR Software Solution</div>
<!--        <p style="text-align: right; padding-top:0px; padding-bottom:20px">Developer by XOR Software Solution</p>-->

</div>
<div class="row m-2">
    <div class="col-md-5"></div>
    <div class="col-md-2">
        <button type="button" class="btn btn-outline-primary btn-block" onclick="printDiv('printableArea')"><i class="fas fa-print"></i> Print</button>
    </div>
</div>

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>