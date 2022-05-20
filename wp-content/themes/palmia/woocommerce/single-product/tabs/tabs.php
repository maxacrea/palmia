<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>
<div
        x-data="{
        datas: [
          {name: 'description',open: true},
          {name: 'caracteristique', open: false},
          {name: 'entretien', open: false}
        ]
        ,
        clickhandler(dt) {
          for (let item in this.datas) {
            let data = this.datas[item];
            data.name === dt.name
            ? dt.open = !dt.open
            : data.open = false;
          }
        }
      }"
    >
    <div class="single-product-tabs">
        <?php $i = 0;
        foreach ( $product_tabs as $key => $product_tab ) : ?>
            <div>
                <button @click="clickhandler(datas[<?= $i ?>])" class="cs-tab-btn">
                    <svg class="icon" height="15" width="15">
                        <use xlink:href="#arrow-down"></use>
                    </svg>
                    <?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
                </button>
                <div x-show="datas[<?= $i ?>].open">
                    <?php
                    if ( isset( $product_tab['callback'] ) ) {
                        call_user_func( $product_tab['callback'], $key, $product_tab );
                    }
                    ?>
                </div>
            </div>
        <?php $i++; endforeach; ?>

    </div>
    </div>

<?php endif; ?>
