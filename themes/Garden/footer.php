<footer class="footer">
    <div class="container">
        <h3 class="footer-title">Другие растения в питомнике</h3>
        <div class="another-plants row justify-content-center">
            <? $category = get_queried_object();
            if (!is_tax()) {
                $category = get_term(16);
            }
            $categories = get_terms('product_cat', ['exclude' => $category->term_id]);
            foreach ($categories as $category):
                ?>
                <div class="col-lg-6 col-md-9">
                    <a href="<?= $category->term_id==16?get_home_url():get_term_link($category) ?>" class="plant-category"
                       style="background-image: url('<? the_field('фон', $category) ?>')">
                        <div class="backdrop"></div>
                        <p class="cat-title"><? the_field('заголовок', $category) ?></p>
                        <div class="list">
                            <? the_field('список', $category) ?>
                        </div>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
        <div class="mobile-banners mt-3 d-flex flex-wrap d-md-none">
            <?
            ob_start();
            dynamic_sidebar('right-sidebar');
            $sidebar = ob_get_contents();
            ob_end_clean();
            echo preg_replace("/<div class=\"textwidget custom-html-widget\">/", "$1", $sidebar);
            ?>
        </div>
    </div>
</footer>
<div class="modal fade show" id="cart" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-border">
                <div class="modal-header">
                    <h5 class="modal-title">Корзина</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <? echo do_shortcode('[woocommerce_cart]') ?>
                </div>
                <div class="modal-footer">
                    <p class="form-title">Пожалуйста заполните форму:</p>
                    <form action="" class="form">
                        <div class="inputs">
                            <input type="text" id="name" placeholder="Ваше имя">
                            <input type="tel" id="tel" placeholder="Ваш номер телефона (обязятельно)" required="">
                            <select name="billing" id="billing">
                                <? while (have_rows('способы_доставки', 'option')):
                                    the_row();
                                    $name = get_sub_field('название');
                                    ?>
                                    <option value="<?= $name ?>"><?= $name ?></option>
                                <? endwhile; ?>
                            </select>
                            <select name="payment" id="payment">
                                <? while (have_rows('способы_оплаты', 'option')):
                                    the_row();
                                    $name = get_sub_field('название');
                                    ?>
                                    <option value="<?= $name ?>"><?= $name ?></option>
                                <? endwhile; ?>
                            </select>
                        </div>
                        <button class="btn-green">отправить</button>
                    </form>
                    <p class="form-additional">Отправляя заявку вы соглашаетесь на обработку персональных
                        данных.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="success" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-border">
                <div class="modal-header">
                    <img <? the_image('лого', 'option') ?> class="img-fluid">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="thanks">СПАСИБО</p>
                </div>
                <div class="modal-footer">
                    <p class="form-title">спасибо что доверяете нам!<br>
                        Скоро я с вами свяжусь и обговорим все детали вашего заказа</p>
                    <p class="form-additional">- Ваш менеджер -</p>
                </div>
            </div>
        </div>
    </div>
</div>
<? wp_footer();
?>
</body>
</html>
