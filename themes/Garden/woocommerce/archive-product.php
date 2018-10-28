<?
defined('ABSPATH') || exit;

get_header() ?>
    <main class="main" role="main">
        <div class="container">
            <div class="row">
                <? get_sidebar() ?>
                <ul class="products col-lg-9 col-md-8">
                    <? while (have_posts()) {
                        the_post();
                        wc_get_template('content-product.php');
                    } ?>
                </ul>
            </div>
        </div>
    </main>
<? get_footer() ?>