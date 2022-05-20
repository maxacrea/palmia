<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post;

if(have_rows('product_entretiens', $post)) : ?>
    <div class="entretien-content">
        <?php
        while (have_rows('product_entretiens', $post)) :
            the_row();
            ?>
            <div class="cs-entretien">
                <h3 class=""><?php the_sub_field('libelle_product_entretiens'); ?></h3>
                <td class=""><?php the_sub_field('description_product_entretiens'); ?></td>
            </div>
        <?php
        endwhile;
        ?>
    </div>
<?php
endif;
?>

