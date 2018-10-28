<?php
get_header(); ?>
<? single_cat_title() ?>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
      //  get_template_part('template-parts/blog-item');
    endwhile;
endif; ?>

<? get_footer() ?>