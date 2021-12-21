<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><?php echo e(__('msg.checkout_payment')); ?></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?php echo e(__('msg.checkout_payment')); ?>

                    </li>
                </ol>
                <div class="divider-15 d-none d-xl-block"></div>
            </div>
        </div>
    </div>
</section>
<!-- eof breadcumb -->
<div class="main-content payment__Sec">
    <section class="checkout-section ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-12 mb-4">
                    <div class="px-2 py-4 px-md-4 py-md-3 rounded bg-white px-2 py-4 px-md-4 py-md-3 rounded shadow rounded account-sidebar account-tab mb-sm-30">
                        <div class="dark-bg tab-title-bg">
                            <div class="heading-part">
                                <div class="sub-title text-center"><span></span><em class="far fa-user"></em><?php echo e(__('msg.my_account')); ?></div>
                            </div>
                        </div>
                        <div class="account-tab-inner">
                            <ul class="account-tab-stap">
                                <li>
                                    <a href="<?php echo e(route('cart')); ?>"><em class="fas fa-wallet"></em><?php echo e(__('msg.cart')); ?><em class="fa fa-angle-right"></em> </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('checkout-address')); ?>"><em class="far fa-heart"></em><?php echo e(__('msg.address')); ?><i class="fa fa-angle-right"></i> </a>
                                </li>
                                <li>
                                    <a href="#"><em class="fas fa-wallet"></em><?php echo e(__('msg.checkout_summary')); ?><i class="fa fa-angle-right"></i> </a>
                                </li>

                                <li class="active">
                                    <a href="#"><em class="fas fa-digital-tachograph"></em><?php echo e(__('msg.payment')); ?><i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-12">
                    <div id="data-step1" class="" data-temp="tabdata">

                        <div class="row">
                            <?php if(isset(Cache::get('timeslot')->slots) && count(Cache::get('timeslot')->slots)): ?>
                            <div class="col-xl-6 col-lg-12 back-bg">
                                <form class=" full">
                                    <div class="mb-10">

                                        <div class="row bg-white px-2 py-4 px-md-4 py-md-3 rounded shadow">
                                            <div class="section_title d-flex mb-3 align-items-baseline border-bottom pl-0">
                                                <h3>
                                                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block"><?php echo e(__('msg.select_delivery_day')); ?></span>
                                                </h3>
                                            </div>

                                            <table class="table table-borderless table-shopping-cart" aria-describedby="myDec" aria-hidden="true">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="alert alert-danger" id="dateError"><?php echo e(__('msg.select_suitable_delivery_date')); ?></div>
                                                            </div>
                                                            <div class="col-md-12 col-xl-12 col-12">
                                                                <div class="form-group calender w-100">
                                                                    <div id="calendar">
                                                                        <div id="datepicker" data-start='<?php echo e(Cache::get('delivery_starts_from', 0)); ?>' data-end='<?php echo e(Cache::get('allowed_days', 0)); ?>'></div>
                                                                        <em class="calender-icon fa fa-calendar-o"></em>
                                                                        <span id='deliveryDatePrint'></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row bg-white px-2 py-4 px-md-4 py-md-3 rounded shadow">
                                        <div class="section_title d-flex mb-3 align-items-baseline border-bottom pl-0">
                                            <h3>
                                                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block"><?php echo e(__('msg.select_delivery_time')); ?></span>
                                            </h3>
                                        </div>

                                        <table class="table table-borderless table-shopping-cart"
                                               aria-describedby="myDec3" aria-hidden="true">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="alert alert-danger" id="timeError"><?php echo e(__('select_payment_suitable_delivery_time')); ?></div>
                                                        </div>
                                                        <div class="form-group" id="time">
                                                            <?php $__currentLoopData = Cache::get('timeslot')->slots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($slot->status == 1): ?>
                                                            <div class="col-md-12">
                                                                <div class="custom-control custom-radio mb-3">
                                                                    <input name="deliverTime" type="radio"
                                                                           class="custom-control-input"
                                                                           value="<?php echo e($slot->title); ?>"
                                                                           data-from="<?php echo e($slot->from_time); ?>"
                                                                           data-to="<?php echo e($slot->to_time); ?>"
                                                                           data-last="<?php echo e($slot->last_order_time); ?>">
                                                                    <label class="custom-control-label"><?php echo e($slot->title); ?></label>
                                                                </div>
                                                            </div>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </form>
                            </div>
                            <?php endif; ?>

                            <div class=" col-xl-5 col-lg-12 back-bg1 col-xl-offset-1 col-12">

                                <div class="bg-white px-2 py-4 px-md-4 py-md-3 rounded shadow my-2 mt-md-0" id="balance">

                                    <div class="custom-control title-sec custom-checkbox mb-1">
                                        <input type="checkbox" class="custom-control-input" id="wallet" data-amount='<?php echo e($data['user']['data'][0]->balance ?? '0'); ?>' />
                                        <label class="custom-control-label" for="wallet"><?php echo e(__('msg.wallet_balance')); ?></label>
                                    </div>
                                    <small class="text-muted custom-control"><?php echo e(__('msg.total_balance')); ?>: <?php echo e(get_price($data['user']['data'][0]->balance ?? '0', false)); ?></small>

                                </div>

                                <div class="order-area-content1 bg-white px-2 py-4 px-md-4 py-md-3 rounded shadow">

                                    <h3><?php echo e(__('msg.your_order')); ?></h3>
                                    <div class="order-wrap-content">
                                        <div class="order-product-info">
                                            <div class="order-middle-content">
                                                <ul>
                                                    <li>
                                                        <span class="order-middle-left"><?php echo e(__('msg.subtotal')); ?></span>
                                                        <span class="order-price"><?php echo e(get_price(sprintf("%0.2f",$data['subtotal']))?? '-'); ?></span>
                                                    </li>
                                                    <?php if(isset($data['shipping']) && floatval($data['shipping'])): ?>
                                                    <li>
                                                        <span class="order-middle-left"><?php echo e(__('msg.delivery_charge')); ?></span>
                                                        <span class="order-price">+ <?php echo e(get_price(sprintf("%0.2f",$data['shipping']))); ?></span>
                                                    </li>
                                                    <?php endif; ?>
                                                    <?php if(isset($data['coupon']['discount']) &&
                                                    floatval($data['coupon']['discount'])): ?>
                                                    <li><span class="order-middle-left"><?php echo e(__('msg.discount')); ?> </span>
                                                        <span class="order-price">- <?php echo e(get_price(sprintf("%0.2f",$data['coupon']['discount']))); ?> </span>
                                                    </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <div class="order-bottom-content">
                                                <ul>
                                                    <li class="order-shipping"><?php echo e(__('msg.total')); ?></li>
                                                    <li class="order-shipping"><?php echo e(get_price(sprintf("%0.2f",$data['total']))?? '-'); ?></li>
                                                </ul>
                                            </div>
                                            <h4 class="my-3"><?php echo e(__('msg.payment_method')); ?></h4>
                                            <div class="d-block my-3">
                                                <div class="row">
                                                    <?php if(isset(Cache::get('payment_methods')->cod_payment_method) &&
                                                    Cache::get('payment_methods')->cod_payment_method == 1): ?>
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio mb-3">
                                                            <input name="payment_method" type="radio" class="custom-control-input" value="cod" checked>
                                                            <img src="<?php echo e(URL::asset('images/cod.svg')); ?>" alt="cod" class="payment__icon">
                                                            <label class="custom-control-label"><?php echo e(__('msg.cash_on_delivery')); ?></label>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(isset(Cache::get('payment_methods')->paypal_payment_method) &&
                                                    Cache::get('payment_methods')->paypal_payment_method == 1): ?>
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio mb-3">
                                                            <input name="payment_method" type="radio" class="custom-control-input" value="paypal">
                                                            <img src="<?php echo e(URL::asset('images/paypal.svg')); ?>" alt="paypal" class="payment__icon">
                                                            <label class="custom-control-label"><?php echo e(__('msg.paypal')); ?></label>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(isset(Cache::get('payment_methods')->payumoney_payment_method)
                                                    && Cache::get('payment_methods')->payumoney_payment_method == 1): ?>
                                                    <div class="col-md-12">

                                                        <div class="custom-control custom-radio mb-3">
                                                            <input name="payment_method" type="radio" class="custom-control-input" value="payumoney-bolt">
                                                            <img src="<?php echo e(URL::asset('images/payu.svg')); ?>" alt="payumoney-bolt" class="payment__icon">
                                                            <label class="custom-control-label"><?php echo e(__('msg.PayUMoney')); ?></label>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(isset(Cache::get('payment_methods')->razorpay_payment_method) &&
                                                    Cache::get('payment_methods')->razorpay_payment_method == 1): ?>
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio mb-3">
                                                            <input name="payment_method" type="radio" class="custom-control-input" value="razorpay">
                                                            <img src="<?php echo e(URL::asset('images/rozerpay.svg')); ?>" alt="rozerpay" class="payment__icon">
                                                            <label class="custom-control-label"><?php echo e(__('msg.Razorpay')); ?></label>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(isset(Cache::get('payment_methods')->stripe_payment_method) &&
                                                    Cache::get('payment_methods')->stripe_payment_method == 1): ?>
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio mb-3">
                                                            <input name="payment_method" type="radio" class="custom-control-input" value="stripe">
                                                            <img src="<?php echo e(URL::asset('images/stripe.svg')); ?>" alt="cod" class="payment__icon">
                                                            <label class="custom-control-label"><?php echo e(__('msg.Stripe')); ?></label>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>

                                                    <?php if(isset(Cache::get('payment_methods')->flutterwave_payment_method)
                                                    && Cache::get('payment_methods')->flutterwave_payment_method == 1): ?>
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio mb-3">
                                                            <input name="payment_method" type="radio" class="custom-control-input" value="flutterwave">
                                                            <img src="<?php echo e(URL::asset('images/flutterwave.svg')); ?>" alt="flutterwave" class="payment__icon">
                                                            <label class="custom-control-label"><?php echo e(__('msg.flutterwave')); ?></label>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(isset(Cache::get('payment_methods')->paystack_payment_method) &&
                                                    Cache::get('payment_methods')->paystack_payment_method == 1): ?>
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio mb-3">
                                                            <input name="payment_method" type="radio" class="custom-control-input" value="paystack">
                                                            <img src="<?php echo e(URL::asset('images/paystack.svg')); ?>" alt="paystack" class="payment__icon">
                                                            <label class="custom-control-label"><?php echo e(__('msg.paystack')); ?></label>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(isset(Cache::get('payment_methods')->paytm_payment_method) &&
                                                    Cache::get('payment_methods')->paytm_payment_method == 1): ?>
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio mb-3">
                                                            <input name="payment_method" type="radio" class="custom-control-input" value="paytm">
                                                            <img src="<?php echo e(URL::asset('images/paytm.svg')); ?>" alt="paytm" class="payment__icon">
                                                            <label class="custom-control-label"><?php echo e(__('msg.paytm')); ?></label>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(isset(Cache::get('payment_methods')->ssl_commerce_payment_method) && Cache::get('payment_methods')->ssl_commerce_payment_method == 1): ?>
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio mb-3">
                                                            <input name="payment_method" type="radio"
                                                                   class="custom-control-input"
                                                                   value="sslecommerz">
                                                            <img src="<?php echo e(URL::asset('images/sslecommerz.svg')); ?>" alt="sslecommerz" class="payment__icon">
                                                            <label
                                                                class="custom-control-label"><?php echo e(__('msg.SSLECOMMERZ')); ?></label>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a role="button" data-bs-confirm="Confirm Order Amount">
                                        <button id='proceed' class="btn btn-primary text-uppercase add-to-cart d-block m-auto">
                                            <?php echo e(__('msg.procced')); ?> <em class="fas fa-truck pl-2"></em>
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="alert alert-warning col-lg-11 mt-10 bank_transfer_warning">
                                <p><strong><?php echo e(__('msg.Instruction')); ?> <br></strong> <?php echo e(__('msg.bank_detail_instruction1')); ?><br/><?php echo e(__('msg.bank_detail_instruction2')); ?></p>
                            </div>
                            <!-- The Modal -->
                            <div id="orderConfirm" class="modal">
                                <div class="modal-dialog">
                                    <div class="modal-content px-3">
                                        <div class="modal-header">
                                            <p class="font-weight-bold mb-0"><?php echo e(__('msg.confirm_order_amount')); ?></p>
                                            <button type="button" class="close rtl_close_inner" data-bs-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <tr>
                                                <td>
                                                    <p class="product-name pb-1"><?php echo e(__('msg.subtotal')); ?> :
                                                        <span><?php echo e($data['subtotal'] ?? '-'); ?></span></p>

                                                    <?php if(isset($data['shipping']) && floatval($data['shipping'])): ?>
                                                    <p class="product-name pb-1"><?php echo e(__('msg.delivery_charge')); ?> : <span>+
                                                            <?php echo e(get_price($data['shipping'])); ?></span></p>
                                                    <?php endif; ?>
                                                    <?php if(isset($data['coupon']['discount']) && floatval($data['coupon']['discount'])): ?>
                                                    <p class="product-name pb-1"><?php echo e(__('msg.discount')); ?> : <span>-
                                                            <?php echo e(get_price($data['coupon']['discount'])); ?></span></p>
                                                    <?php endif; ?>
                                                    <p class="product-name pb-1"><?php echo e(__('msg.total')); ?> : <span> <?php echo e($data['total']); ?></span>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr class="text-left">
                                                <td>
                                                    <strong>
                                                        <p class="checkout-total walletNotUsed pb-1"><?php echo e(__('msg.final_total')); ?> :
                                                            <span><?php echo e($data['total']); ?></span></p>

                                                        <?php if(intval($data['user']['data'][0]->balance ?? 0)): ?>
                                                        <?php if(floatval($data['user']['data'][0]->balance) > floatval($data['total'])): ?>
                                                        <p class="product-name walletUsed pb-1"><?php echo e(__('msg.wallet_from')); ?> :
                                                            <span><?php echo e(floatval($data['total'])); ?></span></p>
                                                        <p class="checkout-total walletUsed"><?php echo e(__('msg.total_payable')); ?> :
                                                            <span>0</span><input type="hidden" value="0" name="total_payable"></p>

                                                        <?php else: ?>
                                                        <p class="product-name walletUsed pb-1"><?php echo e(__('msg.wallet_from')); ?> :
                                                            <span>-<?php echo e($data['user']['data'][0]->balance ?? '0'); ?></span></p>
                                                        <p class="checkout-total walletUsed pb-1"><?php echo e(__('msg.total_payable')); ?> :
                                                            <span><?php echo e(floatval($data['total']) - floatval($data['user']['data'][0]->balance)); ?></span>
                                                            <input type="hidden" value="<?php echo e(floatval($data['total']) - floatval($data['user']['data'][0]->balance)); ?>" name="total_payable">
                                                        </p>
                                                        <?php endif; ?>
                                                        <?php endif; ?>
                                                    </strong>
                                                </td>
                                            </tr>

                                            <div class="cancel_confirm d-flex align-items-center">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo e(__('msg.cancel')); ?></button>
                                                <form action="<?php echo e(route('checkout-proceed')); ?>" method="POST" class="paybtn">
                                                    <input type="hidden" name="deliverDay" id="date" class="deliveryDate">
                                                    <input type="hidden" name="deliveryTime" class="deliveryTime">
                                                    <input type="hidden" name="paymentMethod">
                                                    <input type="hidden" name="wallet_used" value="false">
                                                    <?php if(intval($data['user']['data'][0]->balance ?? 0)): ?>
                                                    <?php if(floatval($data['user']['data'][0]->balance) > floatval($data['total'])): ?>
                                                    <input type="hidden" name="wallet_balance" value="<?php echo e(floatval($data['total'])); ?>">
                                                    <?php else: ?>
                                                    <input type="hidden" name="wallet_balance" value="<?php echo e(floatval($data['user']['data'][0]->balance)); ?>">
                                                    <?php endif; ?>
                                                    <?php else: ?>
                                                    <input type="hidden" name="wallet_balance" value="0">
                                                    <?php endif; ?>
                                                    <button type="submit" name="submit" value="submit" class="btn btn-primary ml-2"><?php echo e(__('msg.confirm')); ?></button>
                                                </form>
                                                <form action="<?php echo e(route('checkout-sslecommerz-init')); ?>" method="POST" class="sslbuttons">
                                                    <div class="Place-order">
                                                        <button class="btn" id="sslczPayBtn"
                                                                token="if you have any token validation"
                                                                postdata="your javascript arrays or objects which requires in backend"
                                                                order="test time"> Pay Now</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
            script.src = "<?php echo e(asset('js/payment-gateway-sslcommerz.js')); ?>?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };
        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
<script src="<?php echo e(asset('js/checkout-payment.js')); ?>"></script>
<?php /**PATH C:\xampp\htdocs\webbooksbear\resources\views/themes/eCart/checkout_payment.blade.php ENDPATH**/ ?>