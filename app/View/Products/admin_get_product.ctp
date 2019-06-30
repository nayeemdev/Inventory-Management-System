<?php
/**
 * Created by PhpStorm.
 * User: Abir
 * Date: 4/2/19
 * Time: 2:58 PM
 */
?>
<?php
if($model=='Sell')
echo $this->Form->input('Sell.product_id.', ['label' => 'Products', 'class' => 'form-control js-sell-product','options' => $products]);
elseif($model=='Purchase') echo $this->Form->input("$model.product_id", ['label' => 'Products', 'class' => 'form-control js-product-id']);
elseif($model=='Stock') {
    ?>
    <select class="custom-select" id="" name="product_id">
        <option value="">Select Product</option>
        <?php
        foreach($products as $key2=>$product) {
            ?>
            <option value="<?=$key2?>"><?=$product?></option>
        <?php
        }
        ?>
    </select>
<?php
}
?>
