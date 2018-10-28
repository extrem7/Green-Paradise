<?php

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<li <? wc_product_class("product-card"); ?> id="product-<? the_ID() ?>">
    <div class="product-info">
        <h1 class="product-title"><? the_title() ?></h1>
        <p class="latin"><? the_excerpt() ?></p>
        <div class="description"><?= apply_filters('the_content', wpautop(get_post_field('post_content', $id), true)); ?></div>
        <div class="gallery">
            <? wc_get_template('single-product/product-image.php') ?>
            <? wc_get_template('single-product/product-thumbnails.php') ?>
        </div>
    </div>
    <form class="cart-side" method="post">
        <div class="cart-side-top">
            <div class="choose">Выберите размер и количество</div>
            <?
            $variations = [];
            if ($product->is_type('variable')) {
                $variations = $product->get_available_variations();
            }
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Размер</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
                </thead>
                <?
                if (!empty($variations)):
                    foreach ($variations as $variation): ?>
                        <tr>
                            <td><?= get_term_by('slug', $variation['attributes']['attribute_pa_size'], 'pa_size')->name ?></td>
                            <td><?= wc_price($variation['display_price']) ?></td>
                            <td>
                                <div class="quantity">
                                    <button class="minus" type="button"><i class="fa fa-minus"></i></button>
                                    <input type="number" value="0" min="0"
                                           name="products[<?= $variation['variation_id'] ?>]"
                                           data-price="<?= $variation['display_price'] ?>">
                                    <button class="plus" type="button"><i class="fa fa-plus"></i></button>
                                </div>
                            </td>
                        </tr>
                    <? endforeach;
                else:
                    ?>
                    <tr>
                        <td>Все</td>
                        <td><?= wc_price($product->get_price()) ?></td>
                        <td>
                            <div class="quantity">
                                <button class="minus" type="button"><i class="fa fa-minus"></i></button>
                                <input type="number" value="0" min="0"
                                       name="products[0]"
                                       data-price="<?= $product->get_price() ?>">
                                <button class="plus" type="button"><i class="fa fa-plus"></i></button>
                            </div>
                        </td>
                    </tr>
                <? endif; ?>
            </table>
        </div>
        <div class="cart-side-bottom">
            <div class="sub-totals">ИТОГО: <span>0 р.</span></div>
            <button class="add-to-cart btn-green" name="addToCart" value="<? the_ID() ?>" disabled>В корзину</button>
        </div>
    </form>
</li>
