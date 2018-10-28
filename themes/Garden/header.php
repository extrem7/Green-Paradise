<?
global $Garden;
$Garden->addToCart();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= wp_get_document_title() ?></title>
    <? wp_head() ?>
</head>
<body <? body_class() ?>>
<header class="header">
    <? $phone = get_field('хедер_телефон', 'option') ?>
    <div class="header-top">
        <div class="container d-flex justify-content-between align-items-center">
            <p class="text"><? the_field('хедер_текст', 'option') ?></p>
            <a href="<?= phoneLink($phone) ?>" class="call-back d-none d-md-flex align-items-center"><span class="phone"><?= $phone ?></span></a>
        </div>
    </div>
    <div class="header-main">
        <div class="container d-flex flex-wrap align-items-center justify-content-lg-between justify-content-around">
            <a href="<? bloginfo('url') ?>" class="logo"><img <? the_image('лого', 'option') ?> class="img-fluid"></a>
            <nav class="menu">
                <?php wp_nav_menu(array(
                    'location' => 'header_menu',
                    'container' => null,
                    'items_wrap' => '<ul>%3$s</ul>',
                )); ?>
            </nav>
            <? woocommerce_mini_cart() ?>
        </div>
        <div class="mobile-row d-md-none">
            <div class="container d-flex d-md-none justify-content-between align-items-center">
                <a href="<?= phoneLink($phone) ?>" class="call-back"><span class="phone"><?= $phone ?></span></a>
                <?
                global $mobileCart;
                $mobileCart = true;
                woocommerce_mini_cart() ?>
            </div>
        </div>
    </div>
</header>
