<?php


/**
 * Single Product
 */

if ( ! function_exists( 'woocommerce_show_product_images' ) ) {

    /**
     * Output the product image before the single product summary.
     */
    function woocommerce_show_product_images() {
        wc_get_template( 'single-product/product-image.php' );
    }
}
if ( ! function_exists( 'woocommerce_show_product_thumbnails' ) ) {

    /**
     * Output the product thumbnails.
     */
    function woocommerce_show_product_thumbnails() {
        wc_get_template( 'single-product/product-thumbnails.php' );
    }
}

if( ! function_exists('cs_get_gallery_image_html')) {

    /**
     * Get HTML for a gallery image.
     *
     * Hooks: woocommerce_gallery_thumbnail_size, woocommerce_gallery_image_size and woocommerce_gallery_full_size accept name based image sizes, or an array of width/height values.
     *
     * @since 3.3.2
     * @param int  $attachment_id Attachment ID.
     * @param bool $main_image Is this the main image or a thumbnail?.
     * @return string
     */
    function cs_get_gallery_image_html( $attachment_id, $main_image = false ) {
        $flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
        $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
        $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
        $image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
        $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
        $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
        $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
        $alt_text          = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
        $image             = wp_get_attachment_image(
            $attachment_id,
            'full',
            false,
            apply_filters(
                'woocommerce_gallery_image_html_attachment_image_params',
                array(
                    'title'                   => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
                    'data-caption'            => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
                    'data-src'                => esc_url( $full_src[0] ),
                    'data-large_image'        => esc_url( $full_src[0] ),
                    'data-large_image_width'  => esc_attr( $full_src[1] ),
                    'data-large_image_height' => esc_attr( $full_src[2] ),
                    'class'                   => esc_attr( $main_image ? 'wp-post-image w-full' : 'w-full' ),
                ),
                $attachment_id,
                '',
                $main_image
            )
        );

        return '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" data-thumb-alt="' . esc_attr( $alt_text ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_src[0] ) . '">' . $image . '</a></div>';
    }
}

if ( ! function_exists( 'woocommerce_output_product_data_tabs' ) ) {

    /**
     * Output the product tabs.
     */
    function woocommerce_output_product_data_tabs() {
        wc_get_template( 'single-product/tabs/tabs.php' );
    }
}

if ( ! function_exists( 'cs_product_gallery_functions' ) ) {

    /**
     * Output the product tabs.
     */
    function cs_product_gallery_functions() {
        wc_get_template( 'single-product/product-gallery.php' );
    }
}

if ( ! function_exists( 'cs_product_share' ) ) {

    /**
     * Output the product tabs.
     */
    function cs_product_share() {
        wc_get_template( 'single-product/product-share.php' );
    }
}
if ( ! function_exists( 'woocommerce_template_single_title' ) ) {
    /**
     * Output the product title.
     */
    function woocommerce_template_single_title() {
        wc_get_template( 'single-product/title.php' );
    }
}
if ( ! function_exists( 'woocommerce_template_single_rating' ) ) {

    /**
     * Output the product rating.
     */
    function woocommerce_template_single_rating() {
        if ( post_type_supports( 'product', 'comments' ) ) {
            wc_get_template( 'single-product/rating.php' );
        }
    }
}
if ( ! function_exists( 'woocommerce_template_single_price' ) ) {

    /**
     * Output the product price.
     */
    function woocommerce_template_single_price() {
        wc_get_template( 'single-product/price.php' );
    }
}
if ( ! function_exists( 'woocommerce_template_single_excerpt' ) ) {

    /**
     * Output the product short description (excerpt).
     */
    function woocommerce_template_single_excerpt() {
        //wc_get_template( 'single-product/short-description.php' );
    }
}
if ( ! function_exists( 'woocommerce_template_single_meta' ) ) {

    /**
     * Output the product meta.
     */
    function woocommerce_template_single_meta($_product = null) {
        wc_get_template( 'single-product/meta.php',  [
            '_product' => $_product
        ]);
    }
}

add_action('single_product_meta', 'woocommerce_template_single_meta', 10, 1);

if ( ! function_exists( 'cs_product_attribute' ) ) {

    /**
     * Output the product meta.
     */
    function cs_product_attribute() {
        wc_get_template( 'single-product/product-attributes.php' );
    }
}
if ( ! function_exists( 'woocommerce_template_single_sharing' ) ) {

    /**
     * Output the product sharing.
     */
    function woocommerce_template_single_sharing() {
        wc_get_template( 'single-product/share.php' );
    }
}
if ( ! function_exists( 'woocommerce_show_product_sale_flash' ) ) {

    /**
     * Output the product sale flash.
     */
    function woocommerce_show_product_sale_flash() {
        wc_get_template( 'single-product/sale-flash.php' );
    }
}

if ( ! function_exists( 'woocommerce_template_single_add_to_cart' ) ) {

    /**
     * Trigger the single product add to cart action.
     */
    function woocommerce_template_single_add_to_cart() {
        global $product;
        do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' );
    }
}
if ( ! function_exists( 'woocommerce_simple_add_to_cart' ) ) {

    /**
     * Output the simple product add to cart area.
     */
    function woocommerce_simple_add_to_cart() {
        wc_get_template( 'single-product/add-to-cart/simple.php' );
    }
}
if ( ! function_exists( 'woocommerce_grouped_add_to_cart' ) ) {

    /**
     * Output the grouped product add to cart area.
     */
    function woocommerce_grouped_add_to_cart() {
        global $product;

        $products = array_filter( array_map( 'wc_get_product', $product->get_children() ), 'wc_products_array_filter_visible_grouped' );

        if ( $products ) {
            wc_get_template(
                'single-product/add-to-cart/grouped.php',
                array(
                    'grouped_product'    => $product,
                    'grouped_products'   => $products,
                    'quantites_required' => false,
                )
            );
        }
    }
}
if ( ! function_exists( 'woocommerce_variable_add_to_cart' ) ) {

    /**
     * Output the variable product add to cart area.
     */
    function woocommerce_variable_add_to_cart() {
        global $product;

        // Enqueue variation scripts.
        wp_enqueue_script( 'wc-add-to-cart-variation' );

        // Get Available variations?
        $get_variations = count( $product->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product );

        // Load the template.
        wc_get_template(
            'single-product/add-to-cart/variable.php',
            array(
                'available_variations' => $get_variations ? $product->get_available_variations() : false,
                'attributes'           => $product->get_variation_attributes(),
                'selected_attributes'  => $product->get_default_attributes(),
            )
        );
    }
}
if ( ! function_exists( 'woocommerce_external_add_to_cart' ) ) {

    /**
     * Output the external product add to cart area.
     */
    function woocommerce_external_add_to_cart() {
        global $product;

        if ( ! $product->add_to_cart_url() ) {
            return;
        }

        wc_get_template(
            'single-product/add-to-cart/external.php',
            array(
                'product_url' => $product->add_to_cart_url(),
                'button_text' => $product->single_add_to_cart_text(),
            )
        );
    }
}

if ( ! function_exists( 'woocommerce_quantity_input' ) ) {

    /**
     * Output the quantity input for add to cart forms.
     *
     * @param  array           $args Args for the input.
     * @param  WC_Product|null $product Product.
     * @param  boolean         $echo Whether to return or echo|string.
     *
     * @return string
     */
    function woocommerce_quantity_input( $args = array(), $product = null, $echo = true ) {
        if ( is_null( $product ) ) {
            $product = $GLOBALS['product'];
        }

        $defaults = array(
            'input_id'     => uniqid( 'quantity_' ),
            'input_name'   => 'quantity',
            'input_value'  => '1',
            'classes'      => apply_filters( 'woocommerce_quantity_input_classes', array( 'input-text', 'qty', 'text' ), $product ),
            'max_value'    => apply_filters( 'woocommerce_quantity_input_max', -1, $product ),
            'min_value'    => apply_filters( 'woocommerce_quantity_input_min', 0, $product ),
            'step'         => apply_filters( 'woocommerce_quantity_input_step', 1, $product ),
            'pattern'      => apply_filters( 'woocommerce_quantity_input_pattern', has_filter( 'woocommerce_stock_amount', 'intval' ) ? '[0-9]*' : '' ),
            'inputmode'    => apply_filters( 'woocommerce_quantity_input_inputmode', has_filter( 'woocommerce_stock_amount', 'intval' ) ? 'numeric' : '' ),
            'product_name' => $product ? $product->get_title() : '',
            'placeholder'  => apply_filters( 'woocommerce_quantity_input_placeholder', '', $product ),
            // When autocomplete is enabled in firefox, it will overwrite actual value with what user entered last. So we default to off.
            // See @link https://github.com/woocommerce/woocommerce/issues/30733.
            'autocomplete' => apply_filters( 'woocommerce_quantity_input_autocomplete', 'off', $product ),
        );

        $args = apply_filters( 'woocommerce_quantity_input_args', wp_parse_args( $args, $defaults ), $product );

        // Apply sanity to min/max args - min cannot be lower than 0.
        $args['min_value'] = max( $args['min_value'], 0 );
        $args['max_value'] = 0 < $args['max_value'] ? $args['max_value'] : '';

        // Max cannot be lower than min if defined.
        if ( '' !== $args['max_value'] && $args['max_value'] < $args['min_value'] ) {
            $args['max_value'] = $args['min_value'];
        }

        ob_start();

        wc_get_template( 'global/quantity-input.php', $args );

        if ( $echo ) {
            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo ob_get_clean();
        } else {
            return ob_get_clean();
        }
    }
}

if ( ! function_exists( 'woocommerce_product_description_tab' ) ) {

    /**
     * Output the description tab content.
     */
    function woocommerce_product_description_tab() {
        wc_get_template( 'single-product/tabs/description.php' );
    }
}
if ( ! function_exists( 'woocommerce_product_additional_information_tab' ) ) {

    /**
     * Output the attributes tab content.
     */
    function woocommerce_product_additional_information_tab() {
        wc_get_template( 'single-product/tabs/additional-information.php' );
    }
}
if ( ! function_exists( 'woocommerce_default_product_tabs' ) ) {

    /**
     * Add default product tabs to product pages.
     *
     * @param array $tabs Array of tabs.
     * @return array
     */
    function woocommerce_default_product_tabs( $tabs = array() ) {
        global $product, $post;

        // Description tab - shows product content.
        if ( $post->post_content ) {
            $tabs['description'] = array(
                'title'    => __( 'Description', 'woocommerce' ),
                'priority' => 10,
                'callback' => 'woocommerce_product_description_tab',
            );
        }

        // Additional information tab - shows attributes.
        /*if ( $product && ( $product->has_attributes() || apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() ) ) ) {
            $tabs['additional_information'] = array(
                'title'    => __( 'Additional information', 'woocommerce' ),
                'priority' => 20,
                'callback' => 'woocommerce_product_additional_information_tab',
            );
        }*/

        // Reviews tab - shows comments.
        if ( have_rows('product_caracteristique', $post) ) {
            $tabs['caracteristique'] = array(
                /* translators: %s: reviews count */
                'title'    => sprintf( __( 'Caracteristique', 'woocommerce' ), $product->get_review_count() ),
                'priority' => 30,
                'callback' => 'caracteristique_template',
            );
        }

        if ( have_rows('product_entretiens', $post) ) {
            $tabs['entretien'] = array(
                /* translators: %s: reviews count */
                'title'    => sprintf( __( 'Entretiens', 'woocommerce' ), $product->get_review_count() ),
                'priority' => 30,
                'callback' => 'entretien_template',
            );
        }

        return $tabs;
    }
}

if( ! function_exists('caracteristique_template')) {
    function caracteristique_template() {
        wc_get_template( 'single-product/tabs/caracteristique.php' );
    }
}
if( ! function_exists('entretien_template')) {
    function entretien_template() {
        wc_get_template( 'single-product/tabs/entretien.php' );
    }
}
if ( ! function_exists( 'woocommerce_sort_product_tabs' ) ) {

    /**
     * Sort tabs by priority.
     *
     * @param array $tabs Array of tabs.
     * @return array
     */
    function woocommerce_sort_product_tabs( $tabs = array() ) {

        // Make sure the $tabs parameter is an array.
        if ( ! is_array( $tabs ) ) {
            // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error
            trigger_error( 'Function woocommerce_sort_product_tabs() expects an array as the first parameter. Defaulting to empty array.' );
            $tabs = array();
        }

        // Re-order tabs by priority.
        if ( ! function_exists( '_sort_priority_callback' ) ) {
            /**
             * Sort Priority Callback Function
             *
             * @param array $a Comparison A.
             * @param array $b Comparison B.
             * @return bool
             */
            function _sort_priority_callback( $a, $b ) {
                if ( ! isset( $a['priority'], $b['priority'] ) || $a['priority'] === $b['priority'] ) {
                    return 0;
                }
                return ( $a['priority'] < $b['priority'] ) ? -1 : 1;
            }
        }

        uasort( $tabs, '_sort_priority_callback' );

        return $tabs;
    }
}

if ( ! function_exists( 'woocommerce_comments' ) ) {

    /**
     * Output the Review comments template.
     *
     * @param WP_Comment $comment Comment object.
     * @param array      $args Arguments.
     * @param int        $depth Depth.
     */
    function woocommerce_comments( $comment, $args, $depth ) {
        // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
        $GLOBALS['comment'] = $comment;
        wc_get_template(
            'single-product/review.php',
            array(
                'comment' => $comment,
                'args'    => $args,
                'depth'   => $depth,
            )
        );
    }
}

if ( ! function_exists( 'woocommerce_review_display_gravatar' ) ) {
    /**
     * Display the review authors gravatar
     *
     * @param array $comment WP_Comment.
     * @return void
     */
    function woocommerce_review_display_gravatar( $comment ) {
        echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '60' ), '' );
    }
}

if ( ! function_exists( 'woocommerce_review_display_rating' ) ) {
    /**
     * Display the reviewers star rating
     *
     * @return void
     */
    function woocommerce_review_display_rating() {
        if ( post_type_supports( 'product', 'comments' ) ) {
            wc_get_template( 'single-product/review-rating.php' );
        }
    }
}

if ( ! function_exists( 'woocommerce_review_display_meta' ) ) {
    /**
     * Display the review authors meta (name, verified owner, review date)
     *
     * @return void
     */
    function woocommerce_review_display_meta() {
        wc_get_template( 'single-product/review-meta.php' );
    }
}

if ( ! function_exists( 'woocommerce_review_display_comment_text' ) ) {

    /**
     * Display the review content.
     */
    function woocommerce_review_display_comment_text() {
        echo '<div class="description">';
        comment_text();
        echo '</div>';
    }
}

if ( ! function_exists( 'woocommerce_output_related_products' ) ) {

    /**
     * Output the related products.
     */
    function woocommerce_output_related_products() {

        $args = array(
            'posts_per_page' => 4,
            'columns'        => 4,
            'orderby'        => 'rand', // @codingStandardsIgnoreLine.
        );

        woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
    }
}

if ( ! function_exists( 'woocommerce_related_products' ) ) {

    /**
     * Output the related products.
     *
     * @param array $args Provided arguments.
     */
    function woocommerce_related_products( $args = array() ) {
        global $product;

        if ( ! $product ) {
            return;
        }

        $defaults = array(
            'posts_per_page' => 2,
            'columns'        => 2,
            'orderby'        => 'rand', // @codingStandardsIgnoreLine.
            'order'          => 'desc',
        );

        $args = wp_parse_args( $args, $defaults );

        // Get visible related products then sort them at random.
        $args['related_products'] = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $args['posts_per_page'], $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );

        // Handle orderby.
        $args['related_products'] = wc_products_array_orderby( $args['related_products'], $args['orderby'], $args['order'] );

        // Set global loop values.
        wc_set_loop_prop( 'name', 'related' );
        wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_related_products_columns', $args['columns'] ) );

        wc_get_template( 'single-product/related.php', $args );
    }
}

if ( ! function_exists( 'woocommerce_upsell_display' ) ) {

    /**
     * Output product up sells.
     *
     * @param int    $limit (default: -1).
     * @param int    $columns (default: 4).
     * @param string $orderby Supported values - rand, title, ID, date, modified, menu_order, price.
     * @param string $order Sort direction.
     */
    function woocommerce_upsell_display( $limit = '-1', $columns = 4, $orderby = 'rand', $order = 'desc' ) {
        global $product;

        if ( ! $product ) {
            return;
        }

        // Handle the legacy filter which controlled posts per page etc.
        $args = apply_filters(
            'woocommerce_upsell_display_args',
            array(
                'posts_per_page' => $limit,
                'orderby'        => $orderby,
                'order'          => $order,
                'columns'        => $columns,
            )
        );
        wc_set_loop_prop( 'name', 'up-sells' );
        wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_upsells_columns', isset( $args['columns'] ) ? $args['columns'] : $columns ) );

        $orderby = apply_filters( 'woocommerce_upsells_orderby', isset( $args['orderby'] ) ? $args['orderby'] : $orderby );
        $order   = apply_filters( 'woocommerce_upsells_order', isset( $args['order'] ) ? $args['order'] : $order );
        $limit   = apply_filters( 'woocommerce_upsells_total', isset( $args['posts_per_page'] ) ? $args['posts_per_page'] : $limit );

        // Get visible upsells then sort them at random, then limit result set.
        $upsells = wc_products_array_orderby( array_filter( array_map( 'wc_get_product', $product->get_upsell_ids() ), 'wc_products_array_filter_visible' ), $orderby, $order );
        $upsells = $limit > 0 ? array_slice( $upsells, 0, $limit ) : $upsells;

        wc_get_template(
            'single-product/up-sells.php',
            array(
                'upsells'        => $upsells,

                // Not used now, but used in previous version of up-sells.php.
                'posts_per_page' => $limit,
                'orderby'        => $orderby,
                'columns'        => $columns,
            )
        );
    }
}


/**
 * Outputs a list of product attributes for a product.
 *
 * @since  3.0.0
 * @param  WC_Product $product Product Object.
 */
function cs_display_product_attributes() {
    global $product;
    $product_attributes = array();

    // Add product attributes to list.
    $attributes = array_filter( $product->get_attributes(), 'wc_attributes_array_filter_visible' );

    foreach ( $attributes as $attribute ) {
        $values = array();

        if ( $attribute->is_taxonomy() ) {
            $attribute_taxonomy = $attribute->get_taxonomy_object();
            $attribute_values   = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

            foreach ( $attribute_values as $attribute_value ) {
                $value_name = esc_html( $attribute_value->name );

                if ( $attribute_taxonomy->attribute_public ) {
                    $values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a>';
                } else {
                    $values[] = $value_name;
                }
            }
        } else {
            $values = $attribute->get_options();

            foreach ( $values as &$value ) {
                $value = make_clickable( esc_html( $value ) );
            }
        }

        $product_attributes[ 'attribute_' . sanitize_title_with_dashes( $attribute->get_name() ) ] = array(
            'label' => wc_attribute_label( $attribute->get_name() ),
            'value' => apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values ),
        );
    }

    /**
     * Hook: woocommerce_display_product_attributes.
     *
     * @since 3.6.0.
     * @param array $product_attributes Array of atributes to display; label, value.
     * @param WC_Product $product Showing attributes for this product.
     */
    $product_attributes = apply_filters( 'woocommerce_display_product_attributes', $product_attributes, $product );

    wc_get_template(
        'single-product/product-attributes.php',
        array(
            'product_attributes' => $product_attributes,
            // Legacy params.
            'product'            => $product,
            'attributes'         => $attributes
        )
    );
}

if ( ! function_exists( 'wc_dropdown_variation_attribute_options' ) ) {

    /**
     * Output a list of variation attributes for use in the cart forms.
     *
     * @param array $args Arguments.
     * @since 2.4.0
     */
    function wc_dropdown_variation_attribute_options( $args = array() ) {
        $args = wp_parse_args(
            apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ),
            array(
                'options'          => false,
                'attribute'        => false,
                'product'          => false,
                'selected'         => false,
                'name'             => '',
                'id'               => '',
                'class'            => '',
                'show_option_none' => __( 'Choose an option', 'woocommerce' ),
            )
        );

        // Get selected value.
        if ( false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product ) {
            $selected_key = 'attribute_' . sanitize_title( $args['attribute'] );
            // phpcs:disable WordPress.Security.NonceVerification.Recommended
            $args['selected'] = isset( $_REQUEST[ $selected_key ] ) ? wc_clean( wp_unslash( $_REQUEST[ $selected_key ] ) ) : $args['product']->get_variation_default_attribute( $args['attribute'] );
            // phpcs:enable WordPress.Security.NonceVerification.Recommended
        }

        $options               = $args['options'];
        $product               = $args['product'];
        $attribute             = $args['attribute'];
        $name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
        $id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
        $class                 = $args['class'];
        $show_option_none      = (bool) $args['show_option_none'];
        $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

        if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
            $attributes = $product->get_variation_attributes();
            $options    = $attributes[ $attribute ];
        }

        if ( ! empty( $options ) ) {
            if ( $product && taxonomy_exists( $attribute ) ) {
                // Get terms if this is a taxonomy - ordered. We need the names too.
                $terms = wc_get_product_terms(
                    $product->get_id(),
                    $attribute,
                    array(
                        'fields' => 'all',
                    )
                );

                wc_get_template(
                    'single-product/cs-product-attributes.php',
                    array(
                        'options' => $options,
                        'product' => $product,
                        'terms' => $terms
                    )
                );
            }
        }


        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo apply_filters( 'woocommerce_dropdown_variation_attribute_options_html', $html, $args );
    }
}


/**
 * Outputs all queued notices on WC pages.
 *
 * @since 3.5.0
 */
function cs_woocommerce_output_all_notices() { ?>
    <div class="woocommerce-notices-wrapper">
	    <div class="container mx-auto">
            <div class="cs-notice">
                <?php wc_print_notices(); ?>
            </div>
        </div>
    </div>
<?php } ?>