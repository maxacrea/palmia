<?php

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'jumbostron',
            'title'             => __('Jumbotron section'),
            'description'       => __('Section CTA en tête sur la home.'),
            'render_template'   => 'template-parts/blocks/jumbotron.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'jumbotron', 'quote' ),
        ));
    }

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'product-list',
            'title'             => __('Liste de produit'),
            'description'       => __('Liste des produits.'),
            'render_template'   => 'template-parts/blocks/product-list.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'list', 'products' ),
        ));
    }


    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'citation',
            'title'             => __('Citations'),
            'description'       => __('Call to action & citation'),
            'render_template'   => 'template-parts/blocks/citation.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'quote', 'citation' ),
        ));
    }

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'category left',
            'title'             => __('Categorie left'),
            'description'       => __('Section categorie type left'),
            'render_template'   => 'template-parts/blocks/cat-left.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'cat', 'categorie' ),
        ));
    }

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'category right',
            'title'             => __('Categorie image droite'),
            'description'       => __('Section categorie type right'),
            'render_template'   => 'template-parts/blocks/cat-right.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'cat', 'categorie' ),
        ));
    }


    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'category colone',
            'title'             => __('Categorie image a colone'),
            'description'       => __('Section categorie type colone'),
            'render_template'   => 'template-parts/blocks/cat-col.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'cat', 'categorie' ),
        ));
    }

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'top-mag',
            'title'             => __('Top Mag'),
            'description'       => __('Section pour les magasine a la une'),
            'render_template'   => 'template-parts/blocks/mag-top.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'mag', 'actu' ),
        ));
    }
}