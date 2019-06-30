/**
 * Created by Abir on 4/2/19.
 */

$(function () {
    //$('.js-ick-input').iCheck();
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });

    /*Purchase Product*/
    $('.js-category').on('change', function () {
        if ($(this).val() == '2') { // if category be Parts
            $('.js-type').show();
        } else $('.js-type').hide();
        $.post(ROOT + 'admin/products/get_product', {'cat_id': $(this).val(), 'model_name': 'Purchase'}, function (res) {
            $('.js-products').html(res);
            selectBuyingPrice();
        });
    });

    $('.card-body').on('change','.js-product-id', function () {
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
        var product_id = $('.js-product-id').val();
        $.get(ROOT + 'admin/purchases/get_last_buying_price/' + product_id, function (res2) {
            $('.js-rate').val(res2.last_buying_rate);
        },'json');
    }

    function selectSellingPrice(product_id) {
        var _this = $(this);
        $.get(ROOT + 'admin/purchases/get_last_buying_price/' + product_id, function (res) {
            _this.closest('.js-sell-rate').val(res.last_selling_rate);
        },'json');
    }

    /*End Purchase Product*/

    /*Sell Product*/
    $('.js-add-btn').on('click', function () {
        $('.js-order:first-child').clone().appendTo('.js-order-box');
    });
    $('.js-remove-btn').on('click', function () {
        $('.js-order-box').find('.js-order:last-child').not(':first-child').remove();
    });
    var product_id = $('.js-sell-product').val();
    $('.js-order-box').on('change', '.js-category-sell', function () {
        var _this = $(this);
        $.post(ROOT + 'admin/products/get_product', {'cat_id': $(this).val(), 'model_name':'Sell'}, function (res) {
            _this.parent().parent().next('.js-products').html(res);
            product_id = _this.parent().parent().next('.js-products').find('.js-sell-product').val();
            $.get(ROOT + 'admin/purchases/get_last_buying_price/' + product_id, function (res) {
                _this.parent().parent().next().next().next().find('.js-sell-rate').val(res.last_selling_rate);

                _this.parent().parent().next().next().find('.js-sell-amount').val(0);
                _this.parent().parent().next().next().next().next().find('.js-sell-total').val(0);
            },'json');
        });
    });

    $('.js-order-box').on('change','.js-sell-product', function () {
        product_id = $(this).val();
        var _this = $(this);
        $.get(ROOT + 'admin/purchases/get_last_buying_price/' + product_id, function (res) {
            _this.parent().parent().next().next().find('.js-sell-rate').val(res.last_selling_rate);

            _this.parent().parent().next().find('.js-sell-amount').val(0);
            _this.parent().parent().next().next().next().find('.js-sell-total').val(0);
        },'json');
    });

    var sell_total = 0;
    var sell_due = 0;

    $('.js-order-box').on('keyup','.js-sell-amount, .js-sell-rate', function () {
        if($(this).attr('rel')=='amount') {
            var selector = $(this);
            var amount = $(this).val();
            var rate = $(this).parent().parent().next().find('.js-sell-rate').val();
            sell_total = amount * rate;
            $(this).parent().parent().next().next().find('.js-sell-total').val(sell_total);
        } else {
            var selector = $(this).parent().parent().prev().find('.js-sell-amount');
            var rate = $(this).val();
            var amount = $(this).parent().parent().prev().find('.js-sell-amount').val();
            sell_total = amount * rate;
            $(this).parent().parent().next().find('.js-sell-total').val(sell_total);
        }
        calculateSubTotal();
        isAvailableProduct(product_id, amount, selector);
    });

    $('.js-sell-paid').on('keyup', function () {
        var sell_due = parseFloat($('.js-sub-total').val()) - parseFloat($('.js-sell-paid').val());
        $('.js-sell-due').val(sell_due);
    });

    function calculateSubTotal(){
        var sub_total = 0;
        $(".js-sell-total").each(function(){
            /*console.log(sub_total)
            console.log($(this).val())*/
            sub_total = parseFloat(sub_total) + parseFloat($(this).val());
        });
        $('.js-sub-total').val(sub_total);
    }
    //var is_aval = [];
    function isAvailableProduct(product_id, amount, selector){
        $.post(ROOT+'admin/stocks/is_available', {'product_id':product_id, 'amount': amount}, function(res){
            if(!res.success) {
                selector.addClass('bg-danger');
                //is_aval.push(0)
            } else selector.removeClass('bg-danger');
        },'json');
    }
    /*End Sell Product*/

    /*Stock*/
    $('.js-stk-category').on('change', function(){
        $.post(ROOT + 'admin/products/get_product', {'cat_id': $(this).val(), 'model_name':'Stock'}, function (res) {
            $('.js-products').html(res);
        });
    });
    /*End Stock*/

    $('.select-box').select2({
        theme: "classic"
    });
});
