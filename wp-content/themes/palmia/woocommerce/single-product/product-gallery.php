<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
    return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();

?>
<div class="cs-gallery my-20">
    <div class="container mx-auto">
        <div class="flex gap-32">
            <?php
            foreach( $attachment_ids as $attachment_id ) :
                // Display the image URL
                $Original_image_url = wp_get_attachment_url( $attachment_id );

                // Display Image instead of URL
                ?>
                <div class="h-80 w-3/12" style="background: url('<?php echo $Original_image_url; ?>') no-repeat top center/cover"></div>
            <?php
            endforeach;?>
        </div>
    </div>
</div>
