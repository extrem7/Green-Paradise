<aside class="sidebar col-lg-3 col-md-4">
    <div class="categories">
        <div class="current-category active">
            <? $category = get_queried_object();
            if(!is_tax()){
                $category = get_term(16);
            }
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            $image = wp_prepare_attachment_for_js($thumbnail_id);
            ?>
            <div class="icon"><img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>"></div>
            <p class="name"><?= $category->name ?></p>
        </div>
        <ul>
            <? while (have_posts()):
                the_post(); ?>
                <li><a href="#product-<? the_ID() ?>"><i
                                class="fa fa-arrow-right"></i><span><? the_title() ?></span></a>
                </li>
            <? endwhile; ?>
        </ul>
        <?
        $categories = get_terms('product_cat',['exclude'=>$category->term_id]);
        foreach ($categories as $category):
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            $image = wp_prepare_attachment_for_js($thumbnail_id);
            ?>
            <a href="<?= $category->term_id==16?get_home_url():get_term_link($category) ?>" class="current-category">
                <div class="icon"><img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>"></div>
                <p class="name"><?= $category->name ?></p> <i class="fal fa-plus"></i>
            </a>
        <? endforeach; ?>
    </div>
    <? dynamic_sidebar('right-sidebar') ?>
</aside>