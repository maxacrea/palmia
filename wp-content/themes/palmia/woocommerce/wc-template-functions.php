<?php



if ( ! function_exists( 'woocommerce_template_loop_product_link_open' ) ) {
    /**
     * Insert the opening anchor tag for products in the loop.
     */
    function woocommerce_template_loop_product_link_open() {
        global $product;
        $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
        ?>
        <div class="cs-relative">
            <a href="<?= esc_url( $link ) ?>" class="block absolute top-0 left-0 w-full h-full flex flex-col woocommerce-LoopProduct-link woocommerce-loop-product__link"></a>
            <?php do_action('cs_product_thumbnail'); ?>
        </div>

        <?php
    }
}

if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

    /**
     * Get the product thumbnail, or the placeholder if not set.
     *
     * @param string $size (default: 'woocommerce_thumbnail').
     * @param int    $deprecated1 Deprecated since WooCommerce 2.0 (default: 0).
     * @param int    $deprecated2 Deprecated since WooCommerce 2.0 (default: 0).
     * @return string
     */
    function woocommerce_get_product_thumbnail( $size = 'woocommerce_thumbnail', $deprecated1 = 0, $deprecated2 = 0 ) {
        global $product;
        return $product ? $product->get_image( 'full' ) : '';
    }
}
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

    /**
     * Get the product thumbnail for the loop.
     */
    function woocommerce_template_loop_product_thumbnail() {
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        global $product;
        $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
        ?>
        <?= woocommerce_get_product_thumbnail(); ?>
            <div class="cs-product-foot">
                <div class="colors">
                    <button type="button" class="item" style="background-color: #BE8F5C"></button>
                    <button type="button" class="item" style="background-color: #554A47"></button>
                    <button type="button" class="item" style="background-color: #950B20"></button>
                </div>
                <div class="actions">
                    <a href="<?php echo esc_url($link); ?>" type="button" class="item flex-center">
                        <svg class="icon">
                            <use xlink:href="#eye"></use>
                        </svg>
                    </a>
                    <?php do_action('cs_add_to_cart'); ?>
                    <button type="button" class="item flex-center">
                        <svg class="icon">
                            <use xlink:href="#heart"></use>
                        </svg>
                    </button>
                </div>
            </div>
        <?php
    }
}


if ( ! function_exists( 'woocommerce_template_loop_add_to_cart' ) ) {

    /**
     * Get the add to cart template for the loop.
     *
     * @param array $args Arguments.
     */
    function woocommerce_template_loop_add_to_cart( $args = array() ) {
        global $product;

        if ( $product ) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode(
                    ' ',
                    array_filter(
                        array(
                            'button',
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );

            $args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

            if ( isset( $args['attributes']['aria-label'] ) ) {
                $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
            }

            wc_get_template( 'loop/add-to-cart.php', $args );
        }
    }
}


if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {

    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function woocommerce_template_loop_product_title() {
        echo '<h2 class="product-title text-sm font-normal ' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}

if ( ! function_exists( 'woocommerce_template_loop_price' ) ) {

    /**
     * Get the product price for the loop.
     */
    function woocommerce_template_loop_price() {
        wc_get_template( 'loop/price.php' );
    }
}

if ( ! function_exists( 'woocommerce_breadcrumb' ) ) {

    /**
     * Output the WooCommerce Breadcrumb.
     *
     * @param array $args Arguments.
     */
    function woocommerce_breadcrumb( $args = array() ) {
        $args = wp_parse_args(
            $args,
            apply_filters(
                'woocommerce_breadcrumb_defaults',
                array(
                    'delimiter'   => '&nbsp;&#47;&nbsp;',
                    'wrap_before' => '<nav class="woocommerce-breadcrumb">',
                    'wrap_after'  => '</nav>',
                    'before'      => '',
                    'after'       => '',
                    'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
                )
            )
        );

        $breadcrumbs = new WC_Breadcrumb();

        if ( ! empty( $args['home'] ) ) {
            $breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
        }

        $args['breadcrumb'] = $breadcrumbs->generate();

        /**
         * WooCommerce Breadcrumb hook
         *
         * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
         */

        do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

        wc_get_template( 'global/breadcrumb.php', $args );

    }
}



/**
 * Global
 */

if ( ! function_exists( 'woocommerce_output_content_wrapper' ) ) {

    /**
     * Output the start of the page wrapper.
     */
    function woocommerce_output_content_wrapper() {
        wc_get_template( 'global/wrapper-start.php' );
    }
}
if ( ! function_exists( 'woocommerce_output_content_wrapper_end' ) ) {

    /**
     * Output the end of the page wrapper.
     */
    function woocommerce_output_content_wrapper_end() {
        wc_get_template( 'global/wrapper-end.php' );
    }
}

if ( ! function_exists( 'woocommerce_get_sidebar' ) ) {

    /**
     * Get the shop sidebar template.
     */
    function woocommerce_get_sidebar() {
        wc_get_template( 'global/sidebar.php' );
    }
}


require get_template_directory() . '/woocommerce/cs-single-product-func.php';

require get_template_directory() . '/woocommerce/cs-cart-functions.php';

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_product_additional_information', 'wc_display_product_attributes', 10 );
remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt' , 20);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating' , 10);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price',10 );

add_action('cs_product_header_content', 'woocommerce_template_single_title');
add_action('cs_product_header_content', 'woocommerce_template_single_rating');
add_action('cs_product_header_content', 'woocommerce_template_single_price');
add_action('cs_product_header_content', 'cs_product_share');

add_action( 'cs_add_to_cart', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'cs_product_thumbnail', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 20 );
add_action( 'woocommerce_single_product_summary', 'cs_display_product_attributes', 30 );
add_action( 'cs_notice', 'cs_woocommerce_output_all_notices', 10 );

add_action( 'cs_product_gallery', 'cs_product_gallery_functions', 10 );


