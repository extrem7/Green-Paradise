<?php

defined('ABSPATH') || exit;

global $product;

$post_thumbnail_id = $product->get_image_id();
$image = wp_get_attachment_url($post_thumbnail_id);
?>
<a href="<?= $image ?>" class="main-photo fancybox" rel="gallery"
   style="background-image: url('<?= $image ?>')"></a>
