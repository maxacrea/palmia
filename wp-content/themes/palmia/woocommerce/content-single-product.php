<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'cs-single-content', $product ); ?>>

    <?php

    /**
     * @hooked woocommerce_output_all_notices - 10
     */
    do_action( 'cs_notice' );
    ?>

    <div class="container mx-auto relative z-10">
        <div class="flex gap-32">
            <div class="w-6/12 relative z-10">
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action( 'woocommerce_before_single_product_summary' );
                ?>
            </div>
            <div class="w-6/12">
                <div class="product-details">
                    <div class="cs-content-header">
                        <div class="relative z-10">
                            <?php
                            /**
                             * Hook: cs_product_header_content.
                             *
                             * @hooked woocommerce_template_single_title - 5
                             * @hooked woocommerce_template_single_rating - 10
                             * @hooked woocommerce_template_single_price - 10
                             * @hooked woocommerce_template_single_excerpt - 20
                             */
                            do_action('cs_product_header_content'); ?>
                        </div>
                    </div>
                    <?php
                    /**
                     * Hook: woocommerce_single_product_summary.
                     *
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     * @hooked WC_Structured_Data::generate_product_data() - 60
                     */
                    do_action( 'woocommerce_single_product_summary' );
                    ?>
                </div>
            </div>

        </div>

        <div>
            <?php  do_action('cs_product_gallery'); ?>
        </div>
        <div class="content single-more-content">
            <div class="container mx-auto">
                <?php  the_field('plus_de_description'); ?>
            </div>
        </div>

        <div class="row">
            <?php
            /**
             * Hook: woocommerce_after_single_product_summary.
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */
            do_action( 'woocommerce_after_single_product_summary' );
            ?>
        </div>
    </div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
