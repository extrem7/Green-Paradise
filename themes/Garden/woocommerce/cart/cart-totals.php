<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>
    <div class="totals">ИТОГО: <span><?= wc_price(WC()->cart->get_totals()['subtotal']) ?></span></div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
