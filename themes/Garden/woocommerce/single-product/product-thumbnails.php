<?php


defined('ABSPATH') || exit;

global $product;

$attachment_ids = $product->get_gallery_image_ids();
$miniatures = array_chunk($attachment_ids, 2)[0];
array_unshift($attachment_ids,$product->get_image_id());
?>

<div class="miniatures">
    <? foreach ($miniatures as $attachment_id):
        $image = wp_get_attachment_url($attachment_id);
        ?>
    <a href="<?= $image ?>" class="miniature fancybox" rel="gallery"
       style="background-image: url('<?= $image ?>')"></a>
    <?endforeach;?>
</div>
<div class="owl-carousel d-md-none">
    <? foreach ($attachment_ids as $attachment_id):
    $image = wp_get_attachment_url($attachment_id);
    ?>
    <img src="<?= $image ?>" class="img-fluid" alt="">
    <?endforeach;?>
</div>