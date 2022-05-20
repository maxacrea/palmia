<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'font-body tracking-wider bg-white text-gray-900 antialiased' ); ?>>


<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col font-body">

	<?php do_action( 'tailpress_header' ); ?>

	<header class="header">

		<div class="mx-auto container">
			<div class="lg:flex lg:items-center justify-between py-12">

				<div class="flex items-center">
					<div>
						<?php if ( get_field('logo_rz', 'option') ) { ?>
                            <img width="150" src="<?= get_field('logo_rz', 'option'); ?>" alt="">
						<?php } else { ?>
							<div class="text-lg uppercase">
								<a href="<?php echo get_bloginfo( 'url' ); ?>" class="logo  font-light text-lg uppercase">
									Palmia
								</a>
							</div>
						<?php } ?>
					</div>
				</div>

                <ul class="nav list-none flex gap-12">
                    <li><a class="link" href="<?php echo get_page_link(5); ?>">Products</a></li>
                    <li><a class="link" href="">Actus</a></li>
                    <li><a class="link" href="<?php echo get_page_link(9); ?>">Contact</a></li>
                </ul>

                <a class="cart-customlocation flex gap-8 items-center" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
                    <svg class="icon stroke-gray-400" height="40" width="40"><use xlink:href="#shop"></use></svg>
                    <span class="flex flex-col">
                        <span><?php echo sprintf ( _n( '%d article', '%d articles', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
                        <b class="text-xl font-bold"><?php echo WC()->cart->get_cart_total(); ?></b>
                    </span>
                </a>

			</div>
		</div>
	</header>

	<div id="content" class="site-content flex-grow">

		<?php do_action( 'tailpress_content_start' ); ?>

		<main>
