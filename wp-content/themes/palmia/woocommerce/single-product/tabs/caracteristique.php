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

if(have_rows('product_caracteristique', $post)) : ?>
    <table class="border-separate table w-full table-auto">
    <?php
    while (have_rows('product_caracteristique', $post)) :
        the_row();
        ?>
        <tr>
            <td class="bg-white py-4 px-3 border-b"><?php the_sub_field('libelle_product_caracteristique'); ?></td>
            <td class="bg-white py-4 px-3 border-b"><?php the_sub_field('value_product_caracteristique'); ?></td>
        </tr>
        <?php
    endwhile;
    ?>
    </table>
    <?php
endif;
?>

