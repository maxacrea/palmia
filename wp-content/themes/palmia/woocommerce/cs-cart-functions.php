<?php

if ( ! function_exists( 'woocommerce_cross_sell_display' ) ) {

	/**
	 * Output the cart cross-sells.
	 *
	 * @param  int    $limit (default: 2).
	 * @param  int    $columns (default: 2).
	 * @param  string $orderby (default: 'rand').
	 * @param  string $order (default: 'desc').
	 */
	function woocommerce_cross_sell_display( $limit = 2, $columns = 2, $orderby = 'rand', $order = 'desc' ) {
		if ( is_checkout() ) {
			return;
		}
		// Get visible cross sells then sort them at random.
		$cross_sells = array_filter( array_map( 'wc_get_product', WC()->cart->get_cross_sells() ), 'wc_products_array_filter_visible' );

		wc_set_loop_prop( 'name', 'cross-sells' );
		wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_cross_sells_columns', $columns ) );

		// Handle orderby and limit results.
		$orderby     = apply_filters( 'woocommerce_cross_sells_orderby', $orderby );
		$order       = apply_filters( 'woocommerce_cross_sells_order', $order );
		$cross_sells = wc_products_array_orderby( $cross_sells, $orderby, $order );
		$limit       = apply_filters( 'woocommerce_cross_sells_total', $limit );
		$cross_sells = $limit > 0 ? array_slice( $cross_sells, 0, $limit ) : $cross_sells;

		wc_get_template(
			'cart/cross-sells.php',
			array(
				'cross_sells'    => $cross_sells,

				// Not used now, but used in previous version of up-sells.php.
				'posts_per_page' => $limit,
				'orderby'        => $orderby,
				'columns'        => $columns,
			)
		);
	}
}


if ( ! function_exists( 'woocommerce_cart_totals' ) ) {

	/**
	 * Output the cart totals.
	 */
	function woocommerce_cart_totals() {
		if ( is_checkout() ) {
			return;
		}
		wc_get_template( 'cart/cart-totals.php' );
	}
}

if ( ! function_exists( 'woocommerce_button_proceed_to_checkout' ) ) {

	/**
	 * Output the proceed to checkout button.
	 */
	function woocommerce_button_proceed_to_checkout() {
		wc_get_template( 'cart/proceed-to-checkout-button.php' );
	}
}