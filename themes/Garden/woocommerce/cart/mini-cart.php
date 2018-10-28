<?php

if (!defined('ABSPATH')) {
    exit;
}

global $mobileCart;

do_action('woocommerce_before_mini_cart'); ?>

<a href="#" data-toggle="modal" data-target="#cart" class="mini-cart <?= !$mobileCart?'d-none d-md-block':'' ?> <?= WC()->cart->is_empty()?'disabled':'' ?>">
    <i class="<?= !WC()->cart->is_empty() ? 'fas' : 'fal' ?> fa-shopping-cart"></i>
    <? if (!WC()->cart->is_empty()): ?>
        <span class="cart-count"><?= WC()->cart->get_cart_contents_count(); ?></span>
    <? endif; ?>
</a>

<?php do_action('woocommerce_after_mini_cart'); ?>
