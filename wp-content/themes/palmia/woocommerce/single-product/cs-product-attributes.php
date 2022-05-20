<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$product_variation = $product->get_available_variations();

?>
<div class="flex gap-8">
<?php
if(!empty($product_variation) && is_array($product_variation)) :
    foreach ($product_variation as $variation) :
?>

    <div class="h-32 w-32 border rounded">
        <img src="<?php echo $variation['image']['thumb_src']; ?>" alt="">
    </div>

<?php
endforeach;
?>

<?php
endif; ?>
</div>