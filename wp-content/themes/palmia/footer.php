
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>
    <div class="container mx-auto">

        <?php
        if(have_rows('block_reassurance', 'option')):
        ?>
        <div class="reassurance">

            <?php
            while(have_rows('block_reassurance', 'option')): the_row();
            ?>
            <div class="item">
                <img src="<?php the_sub_field('picto_block_reassurance'); ?>" class="icon" height="80" width="80" />
                <div>
                    <?php the_sub_field('texte_block_reassurance'); ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <hr>

        <?php  endif; ?>

        <?php
        if(get_field('illustration_paiement', 'option')):
            $img_paiement = get_field('illustration_paiement', 'option') ?
                get_field('illustration_paiement', 'option') :
                get_template_directory_uri() . '/images/payment.png';

        ?>
        <div class="payment flex justify-center py-12">
            <img class="" src="<?php echo $img_paiement; ?>" alt="">
        </div>
        <hr>
        <?php endif; ?>
        <div class="flex links-group">
            <?php if(!empty(get_field('adresse_infors', 'option'))): ?>
            <div>
                <?php the_field('adresse_infors', 'option'); ?>
            </div>
            <?php endif; ?>


            <?php $information_links = wp_get_nav_menu_items(31);
                if(!empty($information_links)):
                ?>
                <div>
                    <h4>Information</h4>
                    <ul class="menu-col">
                        <?php
                        foreach ($information_links as $menu):
                        ?>
                        <li><a href="<?= $menu->url; ?>"><?= $menu->post_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>


            <?php $about_links = wp_get_nav_menu_items(32);
                if(!empty($about_links)):
            ?>
            <div>
                <h4>A propos</h4>
                <ul class="menu-col">
                    <?php
                    foreach ($about_links as $menu):
                        ?>
                        <li><a href="<?= $menu->url; ?>"><?= $menu->post_title; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php endif; ?>

            <?php
            if(have_rows('socials_follow', 'option')):
                while (have_rows('socials_follow', 'option')): the_row();

                $texte = get_sub_field('libelle_socials_follow')?
                    get_sub_field('libelle_socials_follow') :
                    'Suivez nous sur les réseaux sociaux';
            ?>
            <div class="socials">
                <h4><?php echo $texte; ?></h4>

                <div class="actions">
                    <a href="<?php the_sub_field('facebook_url'); ?>" target="_blank" class="item flex-center">
                        <svg class="icon">
                            <use xlink:href="#facebook"></use>
                        </svg>
                    </a>
                    <a href="<?php the_sub_field('instagram_url'); ?>" target="_blank" class="item flex-center">
                        <svg class="icon">
                            <use xlink:href="#instagram"></use>
                        </svg>
                    </a>
                    <a href="<?php the_sub_field('pinterest_url'); ?>" target="_blank" class="item flex-center">
                        <svg class="icon">
                            <use xlink:href="#pinterest"></use>
                        </svg>
                    </a>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <hr>
        <p class="copyright">
            © 2022, palmia.shop. Powered by <a href="">MaxaCrea</a>
        </p>
    </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
